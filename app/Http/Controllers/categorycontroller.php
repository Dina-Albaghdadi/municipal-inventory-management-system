<?php

namespace App\Http\Controllers;

use App\Models\Category; // استدعاء الموديل 
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // 1. عرض القائمة مع التقسيم (Pagination) لـ 10 سجلات 
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    // 2. عرض نموذج الإضافة
    public function create()
    {
        return view('categories.create');
    }

    // 3. تخزين البيانات مع الـ Validation والـ Mass Assignment 
    public function store(Request $request)
    {
        // التحقق من البيانات لضمان سلامتها
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
            'description' => 'nullable|string',
        ]);

        // تخزين البيانات بسطر واحد بفضل خاصية $fillable في الموديل 
        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'تمت إضافة الفئة بنجاح');
    }

    // 4. عرض نموذج التعديل
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // 5. تحديث البيانات
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:100|unique:categories,name,' . $category->category_id . ',category_id',
            'description' => 'nullable|string',
        ]);

        $category->update($validated);
        return redirect()->route('categories.index')->with('success', 'تم تحديث البيانات بنجاح');
    }

    // 6. حذف الفئة
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'تم الحذف بنجاح');
    }
}