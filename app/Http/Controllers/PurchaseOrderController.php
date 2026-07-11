<?php
namespace App\Http\Controllers;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller {
    public function index() {
        $purchaseOrders = PurchaseOrder::paginate(10);
        return view('purchase_orders.index', compact('purchaseOrders'));
    }
}