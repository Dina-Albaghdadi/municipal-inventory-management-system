<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController; 

Route::get('/', function () {
    return view('welcome');
});

//مسارات index, create, store, show, edit, update, destroy 
Route::resource('categories', CategoryController::class);