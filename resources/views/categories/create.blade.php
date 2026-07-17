@extends('adminlte::page')
@section('title', 'Create Category')
@section('content')
<div class="card card-primary">
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group"><label>Name</label><input type="text" name="name" class="form-control" required></div>
            <div class="form-group"><label>Description</label><textarea name="description" class="form-control"></textarea></div>
            <div class="form-group"><label>Parent</label><select name="parent_id" class="form-control"><option value="">None</option>@foreach($parents as $p)<option value="{{ $p->category_id }}">{{ $p->name }}</option>@endforeach</select></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-primary">Save</button></div>
    </form>
</div>
@stop