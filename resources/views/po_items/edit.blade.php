@extends('adminlte::page')
@section('content')
<div class="card card-warning">
    <form action="{{ route('poitems.update', $poitem->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group"><label>Received Quantity</label><input type="number" step="0.01" name="received_qty" value="{{ $poitem->received_qty }}" class="form-control"></div>
            <div class="form-group"><label>Notes</label><textarea name="notes" class="form-control">{{ $poitem->notes }}</textarea></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-warning">Update Item Qty</button></div>
    </form>
</div>
@stop