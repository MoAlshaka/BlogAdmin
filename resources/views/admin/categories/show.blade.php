<a href="{{ route('category.index') }}">back </a>
<br>
@isset($category)
    {{ $category->name }} .... {{ $category->created_at }} ....
    <a href="{{ route('category.edit', $category->id) }}">edit</a>
    <form action="{{ route('category.destroy', $category->id) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="delete">
    </form>
    <br>
@endisset
