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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'transfer_no' => 'required|unique:transfer_orders',
            'from_warehouse_id' => 'required',
            'to_warehouse_id' => 'required|different:from_warehouse_id',
            'transfer_date' => 'required|date',
        ]);

        $transfer = new TransferOrder();
        $transfer->transfer_no = $request->transfer_no;
        $transfer->from_warehouse_id = $request->from_warehouse_id;
        $transfer->to_warehouse_id = $request->to_warehouse_id;
        $transfer->transfer_date = $request->transfer_date;
        $transfer->status = 'Draft'; 
        $transfer->notes = $request->notes;
        $transfer->save();

        return redirect()->route('transfer-orders.index')->with('success', 'Transfer created successfully!');
    }

    public function show(int $id)
    {
        $transfer = TransferOrder::with(['fromWarehouse', 'toWarehouse', 'approver', 'items'])->findOrFail($id);
        return view('transfer_orders.show', compact('transfer'));
    }
}