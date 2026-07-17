<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('purchase_orders.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'po_number' => 'required|unique:purchase_orders,po_number',
            'supplier_id' => 'required|exists:suppliers,supplier_id'
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();
        PurchaseOrder::create($data);

        return redirect()->route('purchase-orders.index');
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->load('poItems.item');
        return view('purchase_orders.show', compact('purchaseOrder'));
    }
}