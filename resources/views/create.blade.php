<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label>اسم الفئة:</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name') <span style="color:red">{{ $message }}</span> @enderror <br>

    <label>الوصف:</label>
    <textarea name="description">{{ old('description') }}</textarea>
    
    <button type="submit">حفظ الفئة</button>
</form>