@extends('adminlte::page')
@section('content')
<div class="invoice p-3 mb-3">
    <div class="row"><h4>Transfer Details: #{{ $transfer->transfer_no }}</h4></div>
    <div class="row">
        <div class="col-sm-4"><b>From:</b> {{ $transfer->fromWarehouse->name }}<br><b>To:</b> {{ $transfer->toWarehouse->name }}</div>
        <div class="col-sm-4"><b>Date:</b> {{ $transfer->transfer_date }}<br><b>Status:</b> {{ $transfer->status }}</div>
        <div class="col-sm-4"><b>Approved By:</b> {{ $transfer->approver->name ?? 'Pending' }}</div>
    </div>
    <hr>
    <div class="row">
        <h5>Items in Transfer</h5>
        <table class="table table-sm">
            <thead><tr><th>Item Code</th><th>Item Name</th><th>Requested Qty</th><th>Transferred Qty</th></tr></thead>
            <tbody>
                @foreach($transfer->items as $item)
                <tr><td>{{ $item->code }}</td><td>{{ $item->name }}</td><td>{{ $item->pivot->requested_qty }}</td><td>{{ $item->pivot->transferred_qty }}</td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop