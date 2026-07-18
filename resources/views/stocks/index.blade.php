@extends('adminlte::page')
@section('title', 'Inventory Balance')
@section('content_header')<h1>Current Stock Levels</h1>@stop
@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-hover table-bordered text-center">
            <thead>
                <tr>
                    <th>Warehouse</th><th>Item Name</th><th>Quantity</th><th>Reserved</th><th>Unit Cost</th><th>Last Updated</th><th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stocks as $stock)
                <tr>
                    <td>{{ $stock->warehouse->name }}</td><td>{{ $stock->item->name }}</td>
                    <td><b class="text-primary">{{ $stock->quantity }}</b></td><td>{{ $stock->reserved_qty }}</td>
                    <td>${{ number_format($stock->unit_cost, 2) }}</td><td>{{ $stock->last_updated }}</td>
                    <td><a href="{{ route('stocks.show', $stock->stock_id) }}" class="btn btn-sm btn-default">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">{{ $stocks->links() }}</div>
    </div>
</div>
@stop