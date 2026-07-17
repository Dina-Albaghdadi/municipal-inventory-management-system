@extends('adminlte::page')
@section('content')
<div class="card card-info">
    <form action="{{ route('transfer-orders.update', $transfer->transfer_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group"><label>Status</label>
                <select name="status" class="form-control">
                    <option value="Draft" {{ $transfer->status == 'Draft' ? 'selected' : '' }}>Draft</option>
                    <option value="Shipped" {{ $transfer->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="Received" {{ $transfer->status == 'Received' ? 'selected' : '' }}>Received</option>
                    <option value="Cancelled" {{ $transfer->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="form-group"><label>Notes</label><textarea name="notes" class="form-control">{{ $transfer->notes }}</textarea></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-info">Update Status</button></div>
    </form>
</div>
@stop