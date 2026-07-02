<form action="{{ route('categories.destroy', $category->category_id) }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
</form>
<a href="{{ route('categories.edit', $category->category_id) }}">تعديل</a>