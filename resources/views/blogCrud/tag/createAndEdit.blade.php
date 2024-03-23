<x-model-crud-layout>
    <x-slot name="header">
        create tag
    </x-slot>
    <x-slot name="link">
       <a href="{{ route('tags') }}" class="btn-btn btn-green">Back</a>
    </x-slot>
    @if (request()->routeIs('tag.create'))
    <form action="{{ route('tag.store') }}" method="post">
        @csrf
        @method('POST')
        <label for="name">tag Name</label>
        <input type="text" name="name">
        <label for="content">tag description</label>
        <input type="text" name="content">
        <button type="submit" class="btn-btn btn-blue">Save</button>
    </form>
@endif
@if (request()->routeIs('tag.edit'))
    <form action="{{ route('tag.update',$tag->id) }}" method="post">
        @csrf
        @method('POST')
        <label for="name">tag Name</label>
        <input type="text" name="name" value="{{ $tag->name }}">
        <label for="content">tag description</label>
        <input type="text" name="content" value="{{ $tag->content }}">
        <button type="submit" class="btn-btn btn-black">update</button>
    </form>
@endif
    </x-model-crud-layout>

