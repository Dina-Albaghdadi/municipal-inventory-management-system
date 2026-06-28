<h1>تفاصيل الفئة: {{ $category->name }}</h1>
<p><strong>الوصف:</strong> {{ $category->description }}</p>
<p><strong>تاريخ الإنشاء:</strong> {{ $category->created_at }}</p>
<a href="{{ route('categories.index') }}">العودة للقائمة</a>