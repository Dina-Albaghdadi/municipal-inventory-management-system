{{-- 1. رسالة النجاح  --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 shadow-sm" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

{{-- 2. رسالة الخطأ العامة (إضافة لضمان تكامل المشروع) --}}
@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 shadow-sm" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

{{-- 3. عرض قائمة أخطاء التحقق (Validation Errors) --}}
@if ($errors->any())
    <div class="bg-orange-100 border border-orange-400 text-orange-700 px-4 py-3 rounded mb-4 shadow-sm">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif