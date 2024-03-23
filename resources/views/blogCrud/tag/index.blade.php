<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'Tags' }}
        </h2>
    </x-slot>
    <div class="my-4">
        <a href="{{ route('tag.create') }}"
            class=" btn-btn btn-blue">Craete
            a Tag</a>
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
                        action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $tag->id }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $tag->name }}
                        </th>
                        <th scope="row"
                            class="px-4 py-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div>
                            <a href="{{ route('tag.edit', $tag->id) }}" class="btn-btn btn-green">edit</a>
                            </div>
                            <form method="POST" action="{{ route('tag.destroy', $tag->id) }}" class="">
                                @csrf
                                @method('DELETE')
                                <button class="btn-btn btn-red">delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach


        </table>
    </div>


</x-app-layout>
