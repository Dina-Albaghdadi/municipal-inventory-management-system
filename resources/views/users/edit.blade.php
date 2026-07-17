@extends('adminlte::page')
@section('content')
<div class="card card-info">
    <div class="card-header"><h3 class="card-title">Edit User: {{ $user->username }}</h3></div>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group"><label>Full Name</label><input type="text" name="full_name" value="{{ $user->full_name }}" class="form-control"></div>
            <div class="form-group"><label>Role</label>
                <select name="role" class="form-control">
                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Manager" {{ $user->role == 'Manager' ? 'selected' : '' }}>Manager</option>
                    <option value="Worker" {{ $user->role == 'Worker' ? 'selected' : '' }}>Worker</option>
                </select>
            </div>
            <div class="form-group"><label>Status</label><select name="status" class="form-control"><option value="Active" {{ $user->status == 'Active' ? 'selected' : '' }}>Active</option><option value="Inactive" {{ $user->status == 'Inactive' ? 'selected' : '' }}>Inactive</option></select></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-info">Update User</button></div>
    </form>
</div>
@stop