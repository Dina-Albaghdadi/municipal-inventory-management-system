<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PoItemController;
use App\Http\Controllers\TransferOrderController;
use App\Http\Controllers\TransferItemController;
use App\Http\Controllers\TransactionController;

// Web Routes

// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// المسارات المحمية بالمصادقة (Laravel Breeze)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // لوحة التحكم (Dashboard) متاحة للجميع 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // مجموعة مسارات الإدارة ببادئة 'admin'
    Route::prefix('admin')->group(function () {
        
        // صلاحيات الـ Admin فقط: إدارة الموظفين 
        Route::middleware([CheckRole::class . ':Admin'])->group(function () {
            Route::resource('users', UserController::class);
        });

        // صلاحيات الـ Admin والـ Manager فقط
        Route::middleware([CheckRole::class . ':Admin,Manager'])->group(function () {
            Route::resource('categories', CategoryController::class);
            Route::resource('warehouses', WarehouseController::class);
            Route::resource('suppliers', SupplierController::class);
        });

        // صلاحيات عامة للعمليات اليومية
        Route::resource('items', ItemController::class);
        Route::resource('stocks', StockController::class);
        Route::resource('purchase-orders', PurchaseOrderController::class);
        Route::resource('po-items', PoItemController::class);
        Route::resource('transfer-orders', TransferOrderController::class);
        Route::resource('transfer-items', TransferItemController::class);
        Route::resource('transactions', TransactionController::class);
    });
});

//   رابط استعادة كلمة المرور
Route::get('/password/reset', function () {
    return redirect()->route('password.request');
});

require __DIR__.'/auth.php';