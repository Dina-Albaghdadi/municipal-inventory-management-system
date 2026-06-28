<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // ضروري لاستخدام الـ Query Builder 

class CategoryController extends Controller
{
    public function index()
    {
        // جلب كل الفئات من جدول categories وترتيبها 
        $categories = DB::table('categories')->get();

        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        // جلب فئة واحدة باستخدام المقطع المتغير ID 
        $category = DB::table('categories')
            ->where('category_id', $id)
            ->first();

        if (!$category) {
            abort(404);
        }

        return view('categories.show', compact('category'));
    }
}