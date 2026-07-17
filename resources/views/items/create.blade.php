@extends('adminlte::page')
@section('content')
<div class="card card-primary">
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group"><label>Code</label><input type="text" name="code" class="form-control" required></div>
            <div class="form-group"><label>Name</label><input type="text" name="name" class="form-control" required></div>
            <div class="form-group"><label>Category</label><select name="category_id" class="form-control">@foreach($categories as $cat)<option value="{{ $cat->category_id }}">{{ $cat->name }}</option>@endforeach</select></div>
            <div class="row">
                <div class="col-md-6"><label>Min Stock</label><input type="number" step="0.01" name="min_stock" class="form-control"></div>
                <div class="col-md-6"><label>Max Stock</label><input type="number" step="0.01" name="max_stock" class="form-control"></div>
            </div>
            <div class="form-group"><label>Status</label><select name="status" class="form-control"><option value="Active">Active</option><option value="Inactive">Inactive</option></select></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-primary">Save Item</button></div>
    </form>
</div>
@stop