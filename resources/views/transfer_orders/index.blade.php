@extends('adminlte::page')
@section('title', 'Stock Transfers')
@section('content')
<div class="card">
    <div class="card-header"><a href="{{ route('transfer-orders.create') }}" class="btn btn-primary">Create Transfer Request</a></div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead><tr><th>Transfer No</th><th>From Warehouse</th><th>To Warehouse</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($transfers as $t)
                <tr>
                    <td>{{ $t->transfer_no }}</td><td>{{ $t->fromWarehouse->name }}</td><td>{{ $t->toWarehouse->name }}</td>
                    <td>{{ $t->transfer_date }}</td><td><span class="badge badge-secondary">{{ $t->status }}</span></td>
                    <td><a href="{{ route('transfer-orders.show', $t->transfer_id) }}" class="btn btn-xs btn-default">View Details</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $transfers->links() }}
    </div>
</div>
@stop