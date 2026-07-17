@extends('adminlte::page')
@section('content')
<div class="card card-success">
    <div class="card-header"><h3>Add Item to Order</h3></div>
    <form action="{{ route('poitems.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group"><label>Order ID</label><input type="number" name="po_id" class="form-control" required></div>
            <div class="form-group"><label>Item</label>
                <select name="item_id" class="form-control">@foreach($items as $i)<option value="{{ $i->item_id }}">{{ $i->name }}</option>@endforeach</select>
            </div>
            <div class="row">
                <div class="col-6"><label>Quantity</label><input type="number" step="0.01" name="quantity" class="form-control" required></div>
                <div class="col-6"><label>Unit Price</label><input type="number" step="0.01" name="unit_price" class="form-control" required></div>
            </div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-success">Add Item</button></div>
    </form>
</div>
@stop