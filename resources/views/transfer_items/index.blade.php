@extends('adminlte::page')
@section('content')
<div class="card">
    <div class="card-header"><h3>Transfer Items Log</h3></div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead><tr><th>Transfer#</th><th>Item</th><th>Requested</th><th>Transferred</th></tr></thead>
            <tbody>
                @foreach($transfer_items as $ti)
                <tr><td>{{ $ti->transferOrder->transfer_no }}</td><td>{{ $ti->item->name }}</td><td>{{ $ti->requested_qty }}</td><td>{{ $ti->transferred_qty }}</td></tr>
                @endforeach
            </tbody>
        </table>
        {{ $transfer_items->links() }}
    </div>
</div>
@stop