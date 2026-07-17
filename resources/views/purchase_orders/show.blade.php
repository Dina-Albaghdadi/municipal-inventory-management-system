@extends('adminlte::page')
@section('content')
<div class="invoice p-3 mb-3">
    <div class="row"><h4>Order Info: #{{ $order->po_number }}</h4></div>
    <div class="row mt-3">
        <div class="col-sm-4"><b>Supplier:</b> {{ $order->supplier->name }}<br><b>Order Date:</b> {{ $order->order_date }}</div>
        <div class="col-sm-4"><b>Total Amount:</b> ${{ $order->total_amount }}<br><b>Status:</b> {{ $order->status }}</div>
        <div class="col-sm-4"><b>Created By:</b> {{ $order->creator->name ?? 'System' }}</div>
    </div>
    <hr>
    <div class="row">
        <h5>Ordered Items</h5>
        <table class="table table-sm table-bordered">
            <thead><tr><th>Item</th><th>Quantity</th><th>Unit Price</th><th>Received</th></tr></thead>
            <tbody>
                @foreach($order->items as $item)
                <tr><td>{{ $item->name }}</td><td>{{ $item->pivot->quantity }}</td><td>${{ $item->pivot->unit_price }}</td><td>{{ $item->pivot->received_qty }}</td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop