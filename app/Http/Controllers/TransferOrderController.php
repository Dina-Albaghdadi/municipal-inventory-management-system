<?php

namespace App\Http\Controllers;

use App\Models\TransferOrder;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class TransferOrderController extends Controller
{
    public function index()
    {
        $transfers = TransferOrder::with(['fromWarehouse', 'toWarehouse'])->paginate(10);
        return view('transfer_orders.index', compact('transfers'));
    }

    public function create()
    {
        $warehouses = Warehouse::all();
        return view('transfer_orders.create', compact('warehouses'));
    }

    public function show(TransferOrder $transferOrder)
    {
        $transferOrder->load('transferItems.item');
        return view('transfer_orders.show', compact('transferOrder'));
    }
}