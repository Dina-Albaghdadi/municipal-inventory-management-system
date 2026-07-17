@extends('adminlte::page')
@section('content')
<div class="card">
    <div class="card-header"><h3>Purchase Order Items Log</h3></div>
    <div class="card-body">
        <table class="table table-sm">
            <thead><tr><th>PO#</th><th>Item</th><th>Qty</th><th>Price</th><th>Total</th></tr></thead>
            <tbody>
                @foreach($po_items as $pi)
                <tr><td>{{ $pi->purchaseOrder->po_number }}</td><td>{{ $pi->item->name }}</td><td>{{ $pi->quantity }}</td><td>{{ $pi->unit_price }}</td><td>{{ $pi->quantity * $pi->unit_price }}</td></tr>
                @endforeach
            </tbody>
        </table>
        {{ $po_items->links() }}
    </div>
</div>
@stop