@extends('layouts.admin') {{-- الوراثة من القالب الرئيسي  --}}

@section('title', 'الرئيسية') {{-- تحديد عنوان الصفحة  --}}

@section('content') {{-- وضع المحتوى في المكان المخصص  --}}
    <div class="text-center py-10">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">مرحباً بكِ في نظام مستودعات بلدية غزة</h2>
        <p class="text-gray-600 mb-8">يمكنكِ البدء بإدارة الأقسام المختلفة من خلال القائمة الجانبية.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-blue-100 p-6 rounded-lg shadow">
                <h3 class="font-bold text-blue-800">إدارة الفئات</h3>
                <p class="text-sm text-blue-600 mt-2">تنظيم وتصنيف المشتريات والمخزون.</p>
            </div>
            <div class="bg-green-100 p-6 rounded-lg shadow text-gray-400">
                <h3 class="font-bold">إدارة الأصناف</h3>
                <p class="text-sm mt-2">قريباً: إضافة وتعديل الأصناف التفصيلية.</p>
            </div>
            <div class="bg-purple-100 p-6 rounded-lg shadow text-gray-400">
                <h3 class="font-bold">المخازن والموردين</h3>
                <p class="text-sm mt-2">قريباً: تتبع حركة الصادر والوارد.</p>
            </div>
        </div>
    </div>
@endsection