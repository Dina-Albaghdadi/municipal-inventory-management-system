@extends('adminlte::page')
@section('title', 'Transactions Log')
@section('content_header')<h1>Inventory Transactions</h1>@stop
@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>No.</th><th>Type</th><th>Warehouse</th><th>Item</th><th>Qty</th><th>Total Cost</th><th>Status</th><th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $trans)
                <tr>
                    <td>{{ $trans->transaction_no }}</td>
                    <td><span class="badge badge-info">{{ $trans->type }}</span></td>
                    <td>{{ $trans->warehouse->name }}</td><td>{{ $trans->item->name }}</td>
                    <td>{{ $trans->quantity }}</td><td>${{ number_format($trans->total_cost, 2) }}</td>
                    <td><span class="badge {{ $trans->status == 'Completed' ? 'badge-success' : 'badge-warning' }}">{{ $trans->status }}</span></td>
                    <td>{{ $trans->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">{{ $transactions->links() }}</div>
    </div>
</div>
@stop