@extends('adminlte::page')
@section('content')
<div class="invoice p-3 mb-3">
    <div class="row"><h4>Item Details: {{ $item->name }}</h4></div>
    <div class="row">
        <div class="col-sm-6"><b>Code:</b> {{ $item->code }}<br><b>Unit:</b> {{ $item->unit }}<br><b>Category:</b> {{ $item->category->name ?? 'None' }}</div>
        <div class="col-sm-6"><b>Min Stock:</b> {{ $item->min_stock }}<br><b>Max Stock:</b> {{ $item->max_stock }}<br><b>Status:</b> {{ $item->status }}</div>
    </div>
</div>
@stop