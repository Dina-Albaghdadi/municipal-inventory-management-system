@extends('adminlte::page')
@section('title', 'Edit Warehouse')
@section('content')
<div class="card card-info">
    <div class="card-header"><h3 class="card-title">Update Warehouse: {{ $warehouse->name }}</h3></div>
    <form action="{{ route('warehouses.update', $warehouse->warehouse_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group"><label>Warehouse Name</label><input type="text" name="name" value="{{ $warehouse->name }}" class="form-control" required></div>
            <div class="form-group"><label>Location</label><input type="text" name="location" value="{{ $warehouse->location }}" class="form-control"></div>
            <div class="form-group"><label>Type</label>
                <select name="type" class="form-control" required>
                    <option value="Main" {{ $warehouse->type == 'Main' ? 'selected' : '' }}>Main</option>
                    <option value="Sub" {{ $warehouse->type == 'Sub' ? 'selected' : '' }}>Sub</option>
                    <option value="Cold" {{ $warehouse->type == 'Cold' ? 'selected' : '' }}>Cold</option>
                    <option value="Temporary" {{ $warehouse->type == 'Temporary' ? 'selected' : '' }}>Temporary</option>
                </select>
            </div>
            <div class="form-group"><label>Manager Name</label><input type="text" name="manager_name" value="{{ $warehouse->manager_name }}" class="form-control"></div>
            <div class="form-group"><label>Status</label>
                <select name="status" class="form-control">
                    <option value="Active" {{ $warehouse->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $warehouse->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-info">Update Warehouse</button></div>
    </form>
</div>
@stop