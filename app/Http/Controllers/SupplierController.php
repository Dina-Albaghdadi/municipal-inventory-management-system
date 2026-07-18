<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|max:200', 'email' => 'nullable|email|unique:suppliers,email']);
        Supplier::create($request->all());
        return redirect()->route('suppliers.index');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->all());
        return redirect()->route('suppliers.index');
    }
    public function destroy(int $id)
{
    // البحث عن المورد المراد حذفه باستخدام المعرف
    $supplier = \App\Models\Supplier::findOrFail($id);
    
    // تنفيذ عملية الحذف من جدول suppliers
    $supplier->delete();

    // العودة لصفحة الموردين مع رسالة تأكيد
    return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully');
}
}