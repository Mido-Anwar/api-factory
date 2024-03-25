<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Home' }}
        </h2>
    </x-slot>
    <div class="my-4">
        <a href="{{ route('image.create.logo') }}" class=" btn-btn btn-blue">Create
            Logo</a>
    </div>
    <div class="my-4">
        <a href="{{ route('image.create.postimage') }}" class=" btn-btn btn-green">Create
            post Images</a>
    </div>
    <div class="my-4">
        <h1>logo & images table</h1>
    </div>
    <div class="relative overflow-x-auto my-7">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        action
                    </th>
                </tr>
            </thead>
            {{ dd($images) }}
            <tbody>

                @foreach ($images as $img)
                    <tr>
                        <td>
                            {{ $img->id }}
                        </td>
                        <td>
                            @if ($img->imageName == null)
                                {{ $img->logoName }}
                            @elseif($img->logoName == null)
                                {{ $img->imageName }}
                            @endif
                        </td>
                        <td style="display:flex;align-items: center; justify-content: center;">
                            @if ($img->postImage == null)
                                <img style="width: 100px;" alt="{{ $img->logoName }}"
                                    src="{{ URL::asset('storage/logo/' . $img->logo) }}" />
                            @elseif($img->logo == null)
                                <img style="width: 100px;" alt="{{ $img->imageName }}"
                                    src="{{ URL::asset('storage/images/' . $img->postImage) }}" />
                            @endif

                        </td>
                        <td>
                            <form action="{{ route('image.destroy', $img->id) }}" method="POST"
                                class="btn-btn btn-red">
                                @csrf
                                @method('DELETE')
                                <button type="submit">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
