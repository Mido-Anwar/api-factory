<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="my-4">
        <a href="{{ route('post.create') }}" class="btn-btn btn-blue">Craete a Post</a>
    </div>

    <div class="relative overflow-x-auto my-6">



        <table style="border: 2px solid black"
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead style="border: 2px solid black" class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                    title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->id }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 text-wrap font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->title }}

                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('post.edit',$post->id) }}"
                                class="btn-btn btn-green">edit</a>
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="btn-btn btn-red">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                   >delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach


        </table>
    </div>
</x-app-layout>



