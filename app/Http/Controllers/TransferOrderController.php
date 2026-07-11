<?php
namespace App\Http\Controllers;
use App\Models\TransferOrder;
use Illuminate\Http\Request;

class TransferOrderController extends Controller {
    public function index() {
        $transferOrders = TransferOrder::paginate(10);
        return view('transfer_orders.index', compact('transferOrders'));
    }
}