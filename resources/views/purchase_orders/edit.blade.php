@extends('adminlte::page')
@section('title', 'Edit Order')
@section('content')
<div class="card card-info">
    <form action="{{ route('purchase-orders.update', $order->po_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group"><label>PO Number</label><input type="text" value="{{ $order->po_number }}" class="form-control" readonly></div>
            <div class="form-group"><label>Status</label>
                <select name="status" class="form-control">
                    <option value="Draft" {{ $order->status == 'Draft' ? 'selected' : '' }}>Draft</option>
                    <option value="Ordered" {{ $order->status == 'Ordered' ? 'selected' : '' }}>Ordered</option>
                    <option value="Received" {{ $order->status == 'Received' ? 'selected' : '' }}>Received</option>
                    <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="form-group"><label>Notes</label><textarea name="notes" class="form-control">{{ $order->notes }}</textarea></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-info">Update Order</button></div>
    </form>
</div>
@stop