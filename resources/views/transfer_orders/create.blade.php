@extends('adminlte::page')
@section('content')
<div class="card card-primary">
    <div class="card-header"><h3 class="card-title">New Stock Transfer</h3></div>
    <form action="{{ route('transfer-orders.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group"><label>Transfer Number</label><input type="text" name="transfer_no" class="form-control" placeholder="T-001" required></div>
            <div class="row">
                <div class="col-md-6 form-group"><label>From Warehouse</label><select name="from_warehouse_id" class="form-control" required>@foreach($warehouses as $w)<option value="{{ $w->warehouse_id }}">{{ $w->name }}</option>@endforeach</select></div>
                <div class="col-md-6 form-group"><label>To Warehouse</label><select name="to_warehouse_id" class="form-control" required>@foreach($warehouses as $w)<option value="{{ $w->warehouse_id }}">{{ $w->name }}</option>@endforeach</select></div>
            </div>
            <div class="form-group"><label>Transfer Date</label><input type="datetime-local" name="transfer_date" class="form-control" required></div>
            <div class="form-group"><label>Notes</label><textarea name="notes" class="form-control"></textarea></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-primary">Create Order</button></div>
    </form>
</div>
@stop