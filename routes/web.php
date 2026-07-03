<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes - نظام إدارة مستودعات بلدية غزة
|--------------------------------------------------------------------------
*/

// المسار الافتراضي
Route::get('/', function () {
    return view('welcome');
});

/** 
 * تجميع مسارات النظام تحت بادئة 'admin' لضمان مشروع متكامل ومنظم 
 * هذا ينشئ مسارات مثل: admin/categories
 */
Route::group(['prefix' => 'admin'], function() {
    
    // صفحة لوحة التحكم الرئيسية
    Route::get('/dashboard', function() {
        return view('dashboard'); // تأكدي من إنشاء ملف dashboard.blade.php لاحقاً
    })->name('admin.dashboard');

    // مسارات CRUD لجدول الفئات (Index, Create, Store, Show, Edit, Update, Destroy)
    Route::resource('categories', CategoryController::class);

    /**
     * مسارات إضافية مستقبلية لضمان تكامل المشروع 
     * Route::resource('items', ItemController::class);
     * Route::resource('warehouses', WarehouseController::class);
     */
});