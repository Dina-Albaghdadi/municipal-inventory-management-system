@extends('adminlte::page')
@section('title', 'Edit Supplier')
@section('content')
<div class="card card-info">
    <div class="card-header"><h3 class="card-title">Update Supplier: {{ $supplier->name }}</h3></div>
    <form action="{{ route('suppliers.update', $supplier->supplier_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group"><label>Supplier Name</label><input type="text" name="name" value="{{ $supplier->name }}" class="form-control" required></div>
            <div class="form-group"><label>Phone</label><input type="text" name="phone" value="{{ $supplier->phone }}" class="form-control"></div>
            <div class="form-group"><label>Status</label>
                <select name="status" class="form-control">
                    <option value="Active" {{ $supplier->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $supplier->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-info">Update</button></div>
    </form>
</div>
@stop