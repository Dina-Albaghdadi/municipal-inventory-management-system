<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CategoryController, 
    ItemController, 
    WarehouseController, 
    SupplierController, 
    TransactionController, 
    StockController,
    PurchaseOrderController, 
    TransferOrderController, 
    UserController,
    PoItemController, 
    TransferItemController
};

Route::get('/', function () { 
    return view('welcome'); 
})->name('home');

// مسارات لوحة التحكم المحمية
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    
    // المسار الرئيسي للوحة التحكم - هذا هو المسار الصحيح لدخول /admin
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // مسار بديل للوحة التحكم 
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard.alt');
    
    // مسارات CRUD لجميع جداول النظام (11 جدولاً)
    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemController::class);
    Route::resource('warehouses', WarehouseController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('purchase-orders', PurchaseOrderController::class);
    Route::resource('transfer-orders', TransferOrderController::class);
    Route::resource('users', UserController::class);
    Route::resource('poitems', PoItemController::class);
    Route::resource('transferitems', TransferItemController::class);
});

// تسجيل مسارات المصادقة (Login, Register, إلخ)
require __DIR__.'/auth.php';