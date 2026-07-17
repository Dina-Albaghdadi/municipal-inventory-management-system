@extends('adminlte::page')
@section('title', 'Warehouses')
@section('content_header')<h1>Warehouse Management</h1>@stop
@section('content')
<div class="card">
    <div class="card-header"><a href="{{ route('warehouses.create') }}" class="btn btn-primary">Add New Warehouse</a></div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th><th>Location</th><th>Type</th><th>Manager</th><th>Capacity</th><th>Status</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($warehouses as $warehouse)
                <tr>
                    <td>{{ $warehouse->name }}</td><td>{{ $warehouse->location }}</td>
                    <td><span class="badge badge-info">{{ $warehouse->type }}</span></td>
                    <td>{{ $warehouse->manager_name }}</td><td>{{ $warehouse->capacity }}</td>
                    <td><span class="badge {{ $warehouse->status == 'Active' ? 'badge-success' : 'badge-danger' }}">{{ $warehouse->status }}</span></td>
                    <td>
                        <a href="{{ route('warehouses.edit', $warehouse->warehouse_id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('warehouses.destroy', $warehouse->warehouse_id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE') <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this warehouse?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">{{ $warehouses->links() }}</div>
    </div>
</div>
@stop