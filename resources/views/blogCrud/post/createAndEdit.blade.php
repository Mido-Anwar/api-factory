<x-model-crud-layout>
    <x-slot name="header">
        edit post
    </x-slot>
    <x-slot name="link">
        <a href="{{ route('posts') }}" class="btn-btn btn-green">Back</a>
    </x-slot>
    @if (request()->routeIs('post.create'))
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            @method('POST')
            <label for="name">post title</label>
            <textarea type="text" name="title">
        </textarea>
            <label for="content">post subject</label>
            <textarea type="text" name="content">
        </textarea>
            <input type="text" class="form-control" hidden name="slug" value="" id="slug">
            <div class="form-group my-8">
                <label for="categoryId">Select Category</label>
                <select class="form-control" name="categoryId" id="categoryId">
                    <option disabled selected value=""> categoryName </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-8 border">
                <h2>Tags</h2>
                @foreach ($tags as $tag)
                    <label for="tags">{{ $tag->name }}</label>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" aria-label="Tags">
                @endforeach
            </div>
            <button type="submit" class="btn-btn btn-blue">Save</button>
        </form>
    @endif
    @if (request()->routeIs('post.edit'))
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('PATCH')
            <label for="name">post Name</label>
            <textarea type="text" name="title" value="{{ $post->title }}">
                {{ $post->title }}
        </textarea>
            <label for="content">post description</label>
            <textarea type="text" name="content" value="{{ $post->content }}">
                {{ $post->content }}
        </textarea>
            <input type="text" class="form-control" hidden name="slug" value="{{ $post->title }}"
                id="slug">
            <div class="form-group my-8">
                <label for="categoryId">Select Category</label>
                <select class="form-control" name="categoryId" id="categoryId">
                    <option disabled value=""> category Name </option>

                    @foreach ($categories as $category)
                        <option {{ $post->category->name == $category->name ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            {{ $post->tags }}
            <div class="form-group my-8 p-5 border">
                <h2>{{ count($post->tags) }} Tags</h2>

                @foreach ($tags as $tag)
                    <label for="tags">{{ $tag->name }}

                    </label>

                    <input type="checkbox"
                    name="tags[]" value="{{ $tag->id }}" aria-label="Tags"

                    @foreach ($post->tags as $tag2)
                    {{ $tag2->name == $tag->name ? 'checked' : '' }}
                    @endforeach
                    >
                @endforeach
            </div>
            <button type="submit" class="btn-btn btn-black">update</button>
        </form>
    @endif
</x-model-crud-layout>
