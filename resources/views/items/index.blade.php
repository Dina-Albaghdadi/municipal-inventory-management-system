@extends('adminlte::page')
@section('title', 'Items')
@section('content')
<div class="card">
    <div class="card-header"><a href="{{ route('items.create') }}" class="btn btn-primary">Add Item</a></div>
    <div class="card-body">
        <table class="table table-striped">
            <thead><tr><th>Code</th><th>Name</th><th>Category</th><th>Unit</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->code }}</td><td>{{ $item->name }}</td><td>{{ $item->category->name ?? 'N/A' }}</td><td>{{ $item->unit }}</td>
                    <td><span class="badge {{ $item->status == 'Active' ? 'badge-success' : 'badge-danger' }}">{{ $item->status }}</span></td>
                    <td><a href="{{ route('items.show', $item->item_id) }}" class="btn btn-xs btn-default">View</a> <a href="{{ route('items.edit', $item->item_id) }}" class="btn btn-xs btn-info">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $items->links() }}
    </div>
</div>
@stop