<x-admin-layout>

    <x-slot name="header">
        <x-slot name="title">Posts</x-slot>
        <a href="{{ route('admin.posts.create') }}" class="btn-primary">
            Add Post
        </a>
    </x-slot>

    @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm font-bold text-center text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
            role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="relative mb-6 overflow-x-auto border border-gray-200 dark:border-none sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="w-1 px-6 py-3 text-right">#</th>
                    {{-- <th class="px-6 py-3 text-center">Cover</th> --}}
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Categories</th>
                    <th class="px-6 py-3">Tags</th>
                    <th class="w-1 px-6 py-3 text-center">Published</th>
                    <th class="px-6 py-3"><span class="sr-only">Action</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-1 px-6 py-3">
                            {{ $post->id }}
                        </td>
                        {{-- <td class="px-6 py-3 text-center">
                            <img src="{{ $post->cover ? asset('posts/cover/' . $post->cover) : asset('images/no-image.png') }}" class="object-cover w-16 h-16 m-2 shadow-lg aspect-square outline outline-2 outline-white">
                        </td> --}}
                        <th class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->title }}
                        </th>
                        <td class="px-6 py-3">
                            @foreach ($post->categories as $category)
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="px-6 py-3">
                            @foreach ($post->tags as $tag)
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="px-6 py-3 text-center">
                            <span class="{{ $post->published ? 'text-white' : 'text-gray-400' }}">
                                <i
                                    class="{{ $post->published ? 'fa-sharp fa-solid fa-eye' : 'fa-sharp fa-solid fa-eye-slash' }}"></i>
                            </span>
                        </td>
                        <td class="w-1 px-6 py-3 space-x-1 whitespace-nowrap">
                            <a href="{{ route('admin.posts.show', $post->id) }}" target="_blank"
                                class="px-2 py-1 text-xs text-black bg-blue-200 rounded-md dark:text-white hover:bg-blue-400 dark:bg-blue-900 dark:hover:bg-blue-700">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}"
                                class="px-2 py-1 text-xs text-black bg-green-200 rounded-md dark:text-white hover:bg-green-400 dark:bg-green-900 dark:hover:bg-green-700"
                                role="button">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2 py-1 text-xs text-black bg-red-200 rounded-md dark:text-white hover:bg-red-400 dark:bg-red-900 dark:hover:bg-red-700"
                                    onclick="confirm('Are you sure you want to delete this tag?')">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-admin-layout>
