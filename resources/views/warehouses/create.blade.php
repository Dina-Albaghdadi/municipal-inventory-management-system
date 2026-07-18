@extends('adminlte::page')
@section('title', 'Create Warehouse')
@section('content')
<div class="card card-primary">
    <div class="card-header"><h3 class="card-title">New Warehouse Details</h3></div>
    <form action="{{ route('warehouses.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group"><label>Warehouse Name</label><input type="text" name="name" class="form-control" required></div>
                <div class="col-md-6 form-group"><label>Location</label><input type="text" name="location" class="form-control"></div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Type</label>
                    <select name="type" class="form-control" required>
                        <option value="Main">Main</option><option value="Sub">Sub</option><option value="Cold">Cold</option><option value="Temporary">Temporary</option>
                    </select>
                </div>
                <div class="col-md-4 form-group"><label>Manager Name</label><input type="text" name="manager_name" class="form-control"></div>
                <div class="col-md-4 form-group"><label>Phone</label><input type="text" name="phone" class="form-control"></div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group"><label>Capacity (Decimal)</label><input type="number" step="00.10" name="capacity" class="form-control"></div>
                <div class="col-md-6 form-group"><label>Status</label><select name="status" class="form-control"><option value="Active">Active</option><option value="Inactive">Inactive</option></select></div>
            </div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-primary">Save Warehouse</button></div>
    </form>
</div>
@stop