<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- إضافة وسم الحماية CSRF Token لضمان أمان الطلبات البرمجية --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    
    <title>نظام مستودعات بلدية غزة - @yield('title')</title>
    
    {{-- ربط ملفات التنسيق والبرمجة باستخدام Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex flex-col md:flex-row">
        <aside class="bg-gray-800 text-white w-full md:w-64 min-h-screen p-4">
            <h2 class="text-2xl font-bold mb-6 text-center text-blue-400 border-b border-gray-700 pb-4">لوحة التحكم</h2>
            <nav>
                <ul class="space-y-2">
                    <li><a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">الرئيسية</a></li>
                    <li><a href="{{ route('categories.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded bg-gray-700">إدارة الفئات</a></li> 
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded text-gray-400">إدارة الأصناف</a></li> 
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded text-gray-400">المخازن والموردين</a></li>
                </ul>
            </nav>
        </aside>

        <main class="flex-1 p-6">
            <header class="flex justify-between items-center p-4 bg-white shadow">
                <span class="font-bold">نظام مستودعات بلدية غزة</span>
                <div class="flex items-center gap-4">
                    {{-- عرض اسم المستخدم المسجل حالياً من نظام الـ Auth  --}}
                    <span class="text-gray-600">مرحباً، {{ Auth::user()->name }}</span>
        
                    {{-- زر تسجيل الخروج --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 underline">خروج</button>
                    </form>
                </div>
            </header>

            <div class="bg-white p-6 rounded shadow-lg">
                @yield('content') {{-- المنطقة المتغيرة لمحتوى الصفحات  --}}
            </div>
        </main>
    </div>
    <footer class="bg-white border-t border-gray-200 text-center p-4 mt-auto">
        <p class="text-gray-600 text-sm">جميع الحقوق محفوظة &copy; {{ date('Y') }} - بلدية غزة</p> 
    </footer>
</body>
</html>