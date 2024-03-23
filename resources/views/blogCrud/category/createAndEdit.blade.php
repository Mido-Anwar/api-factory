<x-model-crud-layout>
    <x-slot name="header">
        create category
    </x-slot>
    <x-slot name="link">
        <a href="{{ route('categories') }}" class="btn-btn btn-green">Back</a>
    </x-slot>
    @if (request()->routeIs('category.create'))
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            @method('POST')
            <label for="name">Category Name</label>
            <input type="text" name="name">
            <label for="content">Category description</label>
            <input type="text" name="content">
            <button type="submit" class="btn-btn btn-blue">Save</button>
        </form>
    @endif
    @if (request()->routeIs('category.edit'))
        <form action="{{ route('category.update',$category->id) }}" method="post">
            @csrf
            @method('POST')
            <label for="name">Category Name</label>
            <input type="text" name="name" value="{{ $category->name }}">
            <label for="content">Category description</label>
            <input type="text" name="content" value="{{ $category->content }}">
            <button type="submit" class="btn-btn btn-black">update</button>
        </form>
    @endif
</x-model-crud-layout>
