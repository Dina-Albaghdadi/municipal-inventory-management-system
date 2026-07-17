@extends('adminlte::page')
@section('title', 'Edit Item')
@section('content')
<div class="card card-info">
    <div class="card-header"><h3 class="card-title">Edit Item: {{ $item->name }}</h3></div>
    <form action="{{ route('items.update', $item->item_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 form-group"><label>Item Code</label><input type="text" name="code" value="{{ $item->code }}" class="form-control" required></div>
                <div class="col-md-6 form-group"><label>Item Name</label><input type="text" name="name" value="{{ $item->name }}" class="form-control" required></div>
            </div>
            <div class="form-group"><label>Category</label><select name="category_id" class="form-control">@foreach($categories as $cat)<option value="{{ $cat->category_id }}" {{ $item->category_id == $cat->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>@endforeach</select></div>
            <div class="row">
                <div class="col-md-4"><label>Unit</label><input type="text" name="unit" value="{{ $item->unit }}" class="form-control"></div>
                <div class="col-md-4"><label>Min Stock</label><input type="number" step="0.01" name="min_stock" value="{{ $item->min_stock }}" class="form-control"></div>
                <div class="col-md-4"><label>Max Stock</label><input type="number" step="0.01" name="max_stock" value="{{ $item->max_stock }}" class="form-control"></div>
            </div>
            <div class="form-group mt-3"><label>Status</label><select name="status" class="form-control"><option value="Active" {{ $item->status == 'Active' ? 'selected' : '' }}>Active</option><option value="Inactive" {{ $item->status == 'Inactive' ? 'selected' : '' }}>Inactive</option></select></div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-info">Update Item</button></div>
    </form>
</div>
@stop