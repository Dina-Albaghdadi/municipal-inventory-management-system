@extends('adminlte::page')
@section('title', 'Create User')
@section('content')
<div class="card card-primary">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group"><label>Username</label><input type="text" name="username" class="form-control" required></div>
                <div class="col-md-6 form-group"><label>Full Name</label><input type="text" name="full_name" class="form-control" required></div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group"><label>Email</label><input type="email" name="email" class="form-control" required></div>
                <div class="col-md-6 form-group"><label>Password</label><input type="password" name="password" class="form-control" required></div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        <option value="Admin">Admin</option><option value="Manager">Manager</option><option value="Worker">Worker</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label>Assigned Warehouse</label>
                    <select name="warehouse_id" class="form-control"><option value="">None</option>@foreach($warehouses as $w)<option value="{{ $w->warehouse_id }}">{{ $w->name }}</option>@endforeach</select>
                </div>
                <div class="col-md-4 form-group"><label>Phone</label><input type="text" name="phone" class="form-control"></div>
            </div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-primary">Create Account</button></div>
    </form>
</div>
@stop