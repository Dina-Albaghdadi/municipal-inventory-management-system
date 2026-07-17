<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Item;
use App\Models\Warehouse;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * عرض قائمة الحركات المخزنية مع الترقيم.
     */
    public function index()
    {
        // استخدام Eager Loading لتحسين الأداء والترقيم لـ 10 سجلات 
        $transactions = Transaction::with(['warehouse', 'item', 'creator'])
            ->latest()
            ->paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    /**
     * عرض نموذج إضافة حركة جديدة.
     */
    public function create()
    {
        $items = Item::all();
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();
        
        return view('transactions.create', compact('items', 'warehouses', 'suppliers'));
    }

    /**
     * حفظ حركة مخزنية جديدة مع التحقق من البيانات 
     */
    public function store(Request $request)
    {
        $request->validate([
            'transaction_no' => 'required|unique:transactions,transaction_no|max:50',
            'type' => 'required|in:Inbound,Outbound,Transfer,Adjustment',
            'warehouse_id' => 'required|exists:warehouses,warehouse_id',
            'item_id' => 'required|exists:items,item_id',
            'quantity' => 'required|numeric',
            'status' => 'required|in:Pending,Completed,Cancelled'
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id(); // ربط الحركة بالمستخدم المسجل حالياً 

        Transaction::create($data);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction recorded successfully.');
    }

    public function show(Transaction $transaction)
    {
        // تحميل العلاقات لضمان عرض البيانات في واجهة show.blade.php  
        $transaction->load(['warehouse', 'item', 'creator', 'supplier']);
        
        return view('transactions.show', compact('transaction'));
    }

    /**
     * حذف حركة مخزنية.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }
}