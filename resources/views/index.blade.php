@extends('layouts.admin') {{-- وراثة القالب الرئيسي  --}}

@section('title', 'قائمة الفئات')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">مديرية المستودعات - قائمة الفئات</h1>
    <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
        + إضافة فئة جديدة
    </a>
</div>

{{-- استدعاء مكون التنبيهات --}}
@include('components.alert') 

<div class="bg-white shadow-md rounded my-6 overflow-x-auto">
    <table class="min-w-full bg-white text-right border-collapse">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                <th class="py-3 px-6 border-b">ID</th>
                <th class="py-3 px-6 border-b">اسم الفئة</th>
                <th class="py-3 px-6 border-b">الوصف</th>
                <th class="py-3 px-6 border-b text-center">الإجراءات</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm">
            @foreach($categories as $category)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6">{{ $category->category_id }}</td>
                <td class="py-3 px-6 font-medium">{{ $category->name }}</td>
                <td class="py-3 px-6">{{ $category->description }}</td>
                <td class="py-3 px-6 text-center flex justify-center gap-2">
                    <a href="{{ route('categories.show', $category->category_id) }}" class="text-blue-500 hover:underline">عرض</a>
                    <a href="{{ route('categories.edit', $category->category_id) }}" class="text-yellow-600 hover:underline">تعديل</a> 
                    
                    <form action="{{ route('categories.destroy', $category->category_id) }}" method="POST" style="display:inline" onsubmit="return confirm('هل أنت متأكد؟')">
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
@endsection