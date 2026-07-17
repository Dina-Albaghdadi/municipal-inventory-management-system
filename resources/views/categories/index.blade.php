@extends('adminlte::page')
@section('title', 'Categories')
@section('content_header')<h1>Categories</h1>@stop
@section('content')
<div class="card">
    <div class="card-header"><a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a></div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead><tr><th>Name</th><th>Description</th><th>Parent</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->parent->name ?? 'None' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->category_id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('categories.destroy', $category->category_id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE') <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>
@stop