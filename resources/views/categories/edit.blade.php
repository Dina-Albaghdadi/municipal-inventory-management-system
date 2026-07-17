@extends('adminlte::page')
@section('title', 'Edit Category')
@section('content')
<div class="card card-info">
    <form action="{{ route('categories.update', $category->category_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group"><label>Name</label><input type="text" name="name" value="{{ $category->name }}" class="form-control" required></div>
            <div class="form-group"><label>Description</label><textarea name="description" class="form-control">{{ $category->description }}</textarea></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-info">Update</button></div>
    </form>
</div>
@stop