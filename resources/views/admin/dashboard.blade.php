@extends('adminlte::page')

@section('title', 'Dashboard - Gaza Municipality')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Inventory Management System - Dashboard</h1>
        <span class="badge badge-primary px-3 py-2">
            {{ Auth::user()->role }}: {{ Auth::user()->full_name }}
        </span>
    </div>
@stop

@section('content')
    <!-- Statistics Small Boxes -->
    <div class="row">
        
        <!-- Total Items -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalItems }}</h3>
                    <p>Total Items</p>
                </div>
                <div class="icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <a href="{{ route('items.index') }}" class="small-box-footer">
                    View Details <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Active Warehouses -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $activeWarehouses }}</h3>
                    <p>Active Warehouses</p>
                </div>
                <div class="icon">
                    <i class="fas fa-warehouse"></i>
                </div>
                <a href="{{ route('warehouses.index') }}" class="small-box-footer">
                    View Warehouses <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Pending Purchase Orders -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $pendingOrders }}</h3>
                    <p>Pending Purchase Orders</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('purchase-orders.index') }}" class="small-box-footer">
                    Review Orders <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Low Stock Alerts -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $lowStockAlerts }}</h3>
                    <p>Low Stock Alerts</p>
                </div>
                <div class="icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <a href="{{ route('stocks.index') }}" class="small-box-footer">
                    Check Quantities <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Admin Only Section -->
    @if(Auth::user()->role == 'Admin')
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title text-bold"><i class="fas fa-user-shield mr-2"></i> Super Admin Area</h3>
                </div>
                <div class="card-body">
                    <p>You have full authority to manage system users and modify basic municipal settings.</p>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">
                        Manage Municipal Staff
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
@stop

@section('css')
    <style>
        .small-box .icon {
            font-size: 50px;
        }
    </style>
@stop