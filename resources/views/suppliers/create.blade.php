@extends('adminlte::page')
@section('title', 'Add Supplier')
@section('content')
<div class="card card-primary">
    <div class="card-header"><h3 class="card-title">New Supplier Info</h3></div>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group"><label>Supplier Name</label><input type="text" name="name" class="form-control" required></div>
            <div class="row">
                <div class="col-md-6 form-group"><label>Contact Person</label><input type="text" name="contact_person" class="form-control"></div>
                <div class="col-md-6 form-group"><label>Phone</label><input type="text" name="phone" class="form-control"></div>
            </div>
            <div class="form-group"><label>Email Address</label><input type="email" name="email" class="form-control"></div>
            <div class="form-group"><label>Office Address</label><textarea name="address" class="form-control"></textarea></div>
            <div class="form-group"><label>Status</label><select name="status" class="form-control"><option value="Active">Active</option><option value="Inactive">Inactive</option></select></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-primary">Save Supplier</button></div>
    </form>
</div>
@stop