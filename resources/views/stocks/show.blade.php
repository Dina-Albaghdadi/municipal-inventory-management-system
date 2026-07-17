@extends('adminlte::page')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header"><h4>Stock Record #{{ $stock->stock_id }}</h4></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Item:</strong> {{ $stock->item->name }} ({{ $stock->item->code }})</p>
                <p><strong>Warehouse:</strong> {{ $stock->warehouse->name }}</p>
            </div>
            <div class="col-md-6 text-right">
                <h3>Available: {{ $stock->quantity }}</h3>
                <p>Unit Cost: ${{ $stock->unit_cost }}</p>
            </div>
        </div>
    </div>
</div>
@stop