<x-model-crud-layout>
    @if (request()->routeIs('image.create.logo'))
        <x-slot name="header">
            create logo
        </x-slot>
        <x-slot name="link">
            <a href="{{ route('images') }}" class="btn-btn btn-green">Back</a>
        </x-slot>
        <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="logoName">logo name</label>
            <input type="text" name="logoName">
            <label for="logo">Category description</label>
            <input type="file" name="logo">
            <button type="submit" name="logoUpload" class="btn-btn btn-blue">Save</button>
        </form>
    @endif
    @if (request()->routeIs('image.create.postimage'))
        <x-slot name="header">
            create post images
        </x-slot>
        <x-slot name="link">
            <a href="{{ route('images') }}" class="btn-btn btn-green">Back</a>
        </x-slot>
        <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="imageName">image name</label>
            <input type="text" name="imageName" id="imageName">
            <label for="postImages">posts images</label>
            <input type="file" name="postImages" id="postImages">
            <button type="submit" name="imageUpload" class="btn-btn btn-black">save</button>
        </form>
    @endif
</x-model-crud-layout>
