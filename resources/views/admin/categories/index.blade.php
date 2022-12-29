{{-- <x-admin-layout class="max-w-xl"> --}}
<x-admin-layout x-data="{ open: false }">

    <x-slot name="header">
        <x-slot name="title">Categories</x-slot>
        {{-- <a href="{{ route('admin.categories.create') }}" class="btn-primary">
            Add Category
        </a> --}}
        <button class="btn-primary" x-on:click="open = ! open"><i class="mr-2 fa-sharp fa-solid fa-plus"></i>Add Category</button>
    </x-slot>

    <div x-show="open" x-transition>
        <form action="">
            <label for="">New category</label>
            <div class="flex gap-2 mb-6 lg:w-1/2 xl:w-1/3">
                <input type="text" id="new_category" name="new_category" placeholder="Category name">
                <button class="btn-primary">Save</button>
            </div>
        </form>
    </div>

    <div class="custom-table">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th><span class="sr-only">Action</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td class="w-1">{{ $category->id }}</td>
                    <th>{{ $category->name }}</th>
                    <td>
                        <x-admin.badge>{{ $category->slug }}</x-admin.badge>
                    </td>
                    <td class="w-1 space-x-1 whitespace-nowrap">
                        <x-admin.btn-show :action="route('admin.categories.show', $category->id)" />
                        <x-admin.btn-edit :action="route('admin.categories.edit', $category->id)" />
                        <x-admin.btn-delete :action="route('admin.categories.destroy', $category->id)" confirm="Are you sure you want to delete this category?" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="relative mb-6 overflow-x-auto border border-gray-200 dark:border-none sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3 text-right">#</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Slug</th>
                    <th class="px-6 py-3"><span class="sr-only">Action</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-1 px-6 py-3">
                            {{ $category->id }}
                        </td>
                        <th class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $category->name }}
                        </th>
                        <td class="px-6 py-3">
                            <span
                                class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                {{ $category->slug }}
                            </span>
                        </td>
                        <td class="w-1 px-6 py-3 space-x-1 whitespace-nowrap">
                            <a href="{{ route('admin.categories.show', $category->id) }}" target="_blank"
                                class="px-2 py-1 text-xs text-black bg-blue-200 rounded-md dark:text-white hover:bg-blue-400 dark:bg-blue-900 dark:hover:bg-blue-700">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                class="px-2 py-1 text-xs text-black bg-green-200 rounded-md dark:text-white hover:bg-green-400 dark:bg-green-900 dark:hover:bg-green-700"
                                role="button">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2 py-1 text-xs text-black bg-red-200 rounded-md dark:text-white hover:bg-red-400 dark:bg-red-900 dark:hover:bg-red-700"
                                    onclick="confirm('Are you sure you want to delete this category?')">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

</x-admin-layout>
