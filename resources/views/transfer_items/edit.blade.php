@extends('adminlte::page')
@section('content')
<div class="card card-info">
    <form action="{{ route('transferitems.update', $transferitem->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group"><label>Transferred Quantity</label><input type="number" step="0.01" name="transferred_qty" value="{{ $transferitem->transferred_qty }}" class="form-control"></div>
            <div class="form-group"><label>Notes</label><textarea name="notes" class="form-control">{{ $transferitem->notes }}</textarea></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-info">Update Transfer Qty</button></div>
    </form>
</div>
@stop