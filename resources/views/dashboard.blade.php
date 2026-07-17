@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Gaza Municipality - Inventory Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <!-- مربع إجمالي المواد -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalItems }}</h3>
                    <p>Total Items</p>
                </div>
                <div class="icon"><i class="fas fa-box"></i></div>
                <a href="{{ route('items.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- مربع المستودعات النشطة -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $activeWarehouses }}</h3>
                    <p>Active Warehouses</p>
                </div>
                <div class="icon"><i class="fas fa-warehouse"></i></div>
                <a href="{{ route('warehouses.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- مربع الطلبات المعلقة -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $pendingOrders }}</h3>
                    <p>Pending Orders</p>
                </div>
                <div class="icon"><i class="fas fa-file-invoice-dollar"></i></div>
                <a href="{{ route('purchase-orders.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- مربع تنبيهات نقص المخزون -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $lowStockAlerts }}</h3>
                    <p>Low Stock Alerts</p>
                </div>
                <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                <a href="{{ route('stocks.index') }}" class="small-box-footer">Check Levels <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop