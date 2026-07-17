@extends('adminlte::page')
@section('title', 'Suppliers List')
@section('content_header')<h1>Suppliers</h1>@stop
@section('content')
<div class="card">
    <div class="card-header"><a href="{{ route('suppliers.create') }}" class="btn btn-primary">Add New Supplier</a></div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th><th>Contact</th><th>Phone</th><th>Email</th><th>Status</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->name }}</td><td>{{ $supplier->contact_person }}</td><td>{{ $supplier->phone }}</td><td>{{ $supplier->email }}</td>
                    <td><span class="badge {{ $supplier->status == 'Active' ? 'badge-success' : 'badge-danger' }}">{{ $supplier->status }}</span></td>
                    <td>
                        <a href="{{ route('suppliers.edit', $supplier->supplier_id) }}" class="btn btn-xs btn-info">Edit</a>
                        <form action="{{ route('suppliers.destroy', $supplier->supplier_id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE') <button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">{{ $suppliers->links() }}</div>
    </div>
</div>
@stop