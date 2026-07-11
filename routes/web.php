<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CategoryController, ItemController, WarehouseController, 
    SupplierController, TransactionController, StockController,
    PurchaseOrderController, TransferOrderController, UserController,
    PoItemController, TransferItemController
};

Route::get('/', function () { return view('welcome'); });

// تغليف كافة مسارات النظام (الـ 11 جدولاً) بالحماية 
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    // مسارات CRUD لجميع جداول النظام لـ 
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

require __DIR__.'/auth.php';