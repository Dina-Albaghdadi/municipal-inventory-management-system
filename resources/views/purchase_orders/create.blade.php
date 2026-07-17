@extends('adminlte::page')
@section('title', 'Create Purchase Order')
@section('content')
<div class="card card-primary">
    <div class="card-header"><h3 class="card-title">Order Details</h3></div>
    <form action="{{ route('purchase-orders.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group"><label>PO Number</label><input type="text" name="po_number" class="form-control" placeholder="e.g. PO-2024-001" required></div>
            <div class="form-group"><label>Supplier</label>
                <select name="supplier_id" class="form-control" required>
                    @foreach($suppliers as $supplier) <option value="{{ $supplier->supplier_id }}">{{ $supplier->name }}</option> @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-md-6"><label>Order Date</label><input type="datetime-local" name="order_date" class="form-control" required></div>
                <div class="col-md-6"><label>Expected Delivery</label><input type="datetime-local" name="expected_date" class="form-control"></div>
            </div>
            <div class="form-group mt-3"><label>Status</label>
                <select name="status" class="form-control">
                    <option value="Draft">Draft</option><option value="Ordered">Ordered</option>
                </select>
            </div>
            <div class="form-group"><label>Notes</label><textarea name="notes" class="form-control"></textarea></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-primary">Save Order</button></div>
    </form>
</div>
@stop