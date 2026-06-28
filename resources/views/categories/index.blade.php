<h1>مديرية المستودعات - قائمة الفئات</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>اسم الفئة</th>
            <th>الوصف</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->category_id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <a href="{{ route('categories.show', $category->category_id) }}">عرض التفاصيل</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>