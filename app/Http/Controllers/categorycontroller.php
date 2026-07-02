<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // 1. عرض القائمة (Read)
    public function index() {
        $categories = DB::table('categories')->get();
        return view('categories.index', compact('categories'));
    }

    // 2. عرض نموذج الإضافة
    public function create() {
        return view('categories.create');
    }

    // 3. تخزين البيانات مع الـ Validation
    public function store(Request $request) {
        // تطبيق شروط التحقق كما في الفيديو (Required, Unique, Max) 
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'nullable|max:500',
        ], [
            'name.required' => 'يرجى إدخال اسم الفئة',
            'name.unique' => 'هذا الاسم موجود مسبقاً'
        ]);

        DB::table('categories')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => now(),
        ]);

        return redirect()->route('categories.index')->with('success', 'تمت الإضافة بنجاح');
    }

    // 4. عرض نموذج التعديل (Edit)
    public function edit($id) {
        $category = DB::table('categories')->where('category_id', $id)->first();
        return view('categories.edit', compact('category'));
    }

    // 5. تحديث البيانات (Update) 
    public function update(Request $request, $id) {
        $request->validate(['name' => 'required|max:255']);

        DB::table('categories')->where('category_id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => now(),
        ]);

        return redirect()->route('categories.index')->with('success', 'تم التحديث بنجاح');
    }

    // 6. الحذف (Delete)
    public function destroy($id) {
        DB::table('categories')->where('category_id', $id)->delete();
        return redirect()->route('categories.index')->with('success', 'تم الحذف بنجاح');
    }
}