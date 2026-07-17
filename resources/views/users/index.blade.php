@extends('adminlte::page')
@section('title', 'Users')
@section('content')
<div class="card">
    <div class="card-header"><a href="{{ route('users.create') }}" class="btn btn-primary">Add New Staff</a></div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr><th>Username</th><th>Full Name</th><th>Email</th><th>Role</th><th>Warehouse</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->username }}</td><td>{{ $user->full_name }}</td><td>{{ $user->email }}</td>
                    <td><span class="badge badge-warning">{{ $user->role }}</span></td>
                    <td>{{ $user->warehouse->name ?? 'N/A' }}</td>
                    <td><span class="badge {{ $user->status == 'Active' ? 'badge-success' : 'badge-danger' }}">{{ $user->status }}</span></td>
                    <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-info">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
@stop