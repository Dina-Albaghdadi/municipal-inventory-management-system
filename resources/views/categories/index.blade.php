{{-- 1. الوراثة من القالب الرئيسي الذي أنشأتِه في مجلد layouts --}}
@extends('layouts.admin') 

{{-- 2. تحديد عنوان الصفحة الديناميكي --}}
@section('title', 'قائمة فئات المستودع')

{{-- 3. وضع المحتوى داخل القسم المخصص له في القالب --}}
@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">مديرية المستودعات - قائمة الفئات</h1>
        
        {{-- زر إضافة فئة جديدة للتحول لمشروع متكامل --}}
        <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
            + إضافة فئة جديدة
        </a>
    </div>

    {{-- 4. استدعاء مكون رسائل النجاح (Flash Messages) لمنع التكرار --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
        <table class="min-w-full bg-white text-right border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 border-b">ID</th>
                    <th class="py-3 px-6 border-b">اسم الفئة</th>
                    <th class="py-3 px-6 border-b">الوصف</th>
                    <th class="py-3 px-6 border-b text-center">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($categories as $category)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $category->category_id }}</td>
                    <td class="py-3 px-6 font-medium">{{ $category->name }}</td>
                    <td class="py-3 px-6">{{ $category->description }}</td>
                    <td class="py-3 px-6 text-center flex justify-center gap-2">
                        {{-- زر العرض --}}
                        <a href="{{ route('categories.show', $category->category_id) }}" class="text-blue-500 hover:underline">عرض</a>
                        
                        {{-- زر التعديل (جزء من مشروع متكامل) --}}
                        <a href="{{ route('categories.edit', $category->category_id) }}" class="text-yellow-600 hover:underline">تعديل</a>
                        
                        {{-- نموذج الحذف مع حماية CSRF  --}}
                        <form action="{{ route('categories.destroy', $category->category_id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection