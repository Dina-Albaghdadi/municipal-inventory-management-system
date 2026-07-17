@extends('adminlte::page')
@section('content')
<div class="invoice p-3 mb-3">
    <div class="row"><h4>Transaction Details: {{ $transaction->transaction_no }}</h4></div>
    <div class="row mt-4">
        <div class="col-6">
            <b>Type:</b> {{ $transaction->type }}<br>
            <b>Reference:</b> {{ $transaction->reference_no ?? 'N/A' }}<br>
            <b>Supplier:</b> {{ $transaction->supplier->name ?? 'None' }}
        </div>
        <div class="col-6">
            <b>Quantity:</b> {{ $transaction->quantity }}<br>
            <b>Unit Cost:</b> ${{ $transaction->unit_cost }}<br>
            <b>Created By:</b> {{ $transaction->creator->name }}
        </div>
    </div>
    <div class="row mt-3"><div class="col-12"><b>Notes:</b><p>{{ $transaction->notes }}</p></div></div>
</div>
@stop