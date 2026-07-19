<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchase_orders = PurchaseOrder::with(['supplier', 'creator'])->paginate(10);
        return view('purchase_orders.index', compact('purchase_orders'));
    }

    public function create()
{
    $suppliers = Supplier::where('status', 'Active')->get();
    // إضافة هذا السطر لجلب الأصناف من جدول items [3]
    $items = \App\Models\Item::where('status', 'Active')->get(); 
    return view('purchase_orders.create', compact('suppliers', 'items'));
}

public function store(Request $request) {
    // 1. التحقق من البيانات لضمان عدم إرسال طلب بدون أصناف (يمنع حدوث الـ null)
    $request->validate([
        'po_number' => 'required|unique:purchase_orders',
        'supplier_id' => 'required',
        'items' => 'required|array', // التأكد من وصول مصفوفة الأصناف
    ]);

    // استخدام Transaction لضمان سلامة البيانات في جداول البلدية
    return DB::transaction(function () use ($request) {
        // 2. إنشاء رأس الطلب وربطه بالمستخدم الذي قام بالعملية
        $order = PurchaseOrder::create(array_merge($request->all(), [
            'created_by' => Auth::id(),
            'total_amount' => 0 // سيبدأ بصفر ويحدث لاحقاً
        ]));
        
        $total = 0;

        // 3. التحقق الإضافي قبل التكرار (لحل مشكلة الصورة 39)
        if ($request->has('items')) {
            foreach ($request->items as $item) {
                // ربط الأصناف بالطلب في جدول po_items
                $order->items()->attach($item['item_id'], [
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price']
                ]);
                // حساب السعر الإجمالي تراكمياً
                $total += ($item['quantity'] * $item['unit_price']);
            }
        }

        // 4. تحديث السعر الإجمالي لكي لا يظهر صفر في الـ View
        $order->update(['total_amount' => $total]);

        return redirect()->route('purchase-orders.index')->with('success', 'تم حفظ الطلب بنجاح');
    });
}
public function update(Request $request, int $id) {
    $order = PurchaseOrder::with('items')->findOrFail($id);
    $order->update($request->only(['status', 'notes']));

    // إذا تم استلام الطلب، قم بزيادة المخزن لكل صنف في الطلب
    if ($request->status == 'Received') {
        foreach ($order->items as $item) {
            DB::table('stock')->updateOrInsert(
                ['warehouse_id' => 1, 'item_id' => $item->item_id], // مخزن البلدية الرئيسي مثلاً
                ['quantity' => DB::raw("quantity + " . $item->pivot->quantity)]
            );
        }
    }
    return redirect()->route('purchase-orders.index');
}

public function show(int $id) {
    $order = PurchaseOrder::with(['supplier', 'items'])->findOrFail($id);
    return view('purchase_orders.show', compact('order'));
}

public function edit(int $id) {
    $order = PurchaseOrder::findOrFail($id);
    $suppliers = Supplier::all();
    return view('purchase_orders.edit', compact('order', 'suppliers'));
}
}
