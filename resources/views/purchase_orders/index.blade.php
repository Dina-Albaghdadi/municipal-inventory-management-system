@extends('adminlte::page')
@section('title', 'Purchase Orders')
@section('content_header')<h1>Purchase Orders</h1>@stop
@section('content')
<div class="card">
    <div class="card-header"><a href="{{ route('purchase-orders.create') }}" class="btn btn-primary">New Order</a></div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>PO Number</th><th>Supplier</th><th>Order Date</th><th>Status</th><th>Total Amount</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchase_orders as $order)
                <tr>
                    <td>{{ $order->po_number }}</td>
                    <td>{{ $order->supplier->name }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td><span class="badge badge-info">{{ $order->status }}</span></td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                    <td>
                        <a href="{{ route('purchase-orders.show', $order->po_id) }}" class="btn btn-xs btn-default">View</a>
                        <a href="{{ route('purchase-orders.edit', $order->po_id) }}" class="btn btn-xs btn-info">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">{{ $purchase_orders->links() }}</div>
    </div>
</div>
@stop