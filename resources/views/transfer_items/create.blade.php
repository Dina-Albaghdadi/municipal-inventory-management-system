@extends('adminlte::page')
@section('content')
<div class="card card-primary">
    <form action="{{ route('transferitems.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group"><label>Transfer ID</label><input type="number" name="transfer_id" class="form-control" required></div>
            <div class="form-group"><label>Item</label>
                <select name="item_id" class="form-control">@foreach($items as $i)<option value="{{ $i->item_id }}">{{ $i->name }}</option>@endforeach</select>
            </div>
            <div class="form-group"><label>Requested Quantity</label><input type="number" step="0.01" name="requested_qty" class="form-control" required></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-primary">Add Transfer Item</button></div>
    </form>
</div>
@stop