<x-admin-layout>

    <x-slot name="header">
        <x-slot name="title">Products</x-slot>
        <a href="{{ route('admin.products.create') }}"
            class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Add Product
        </a>
    </x-slot>

    <div class="overflow-x-auto relative border border-gray-200 dark:border-none sm:rounded-lg mb-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="py-3 px-6 text-right w-1">#</th>
                    <th>Image</th>
                    <th class="py-3 px-6">Name</th>
                    <th class="py-3 px-6">Slug</th>
                    <th class="py-3 px-6">Categories</th>
                    <th class="py-3 px-6">Tags</th>
                    <th class="py-3 px-6"><span class="sr-only">Action</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="py-3 px-6 w-1">
                            {{ $product->id }}
                        </td>
                        <td>
                            @if ($product->images)
                                @foreach ($product->images as $image)
                                    @if ($loop->first)
                                        <img src="{{ $image ? asset('storage/product_images/' . $image) : asset('images/no-image.png') }}"
                                            class="m-2 h-16 w-16 rounded-lg">
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <th class="py-3 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->name }}
                        </th>
                        <td class="py-3 px-6">
                            {{ $product->slug }}
                        </td>
                        <td class="py-3 px-6">
                            @foreach ($product->categories as $category)
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="py-3 px-6">
                            @foreach ($product->tags as $tag)
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="py-3 px-6 w-1 whitespace-nowrap space-x-1">
                            <a href="{{ route('admin.products.show', $product->id) }}" target="_blank"
                                class="px-2 py-1 text-xs text-black dark:text-white bg-blue-200 hover:bg-blue-400 dark:bg-blue-900 dark:hover:bg-blue-700 rounded-md">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                class="px-2 py-1 text-xs  text-black dark:text-white bg-green-200 hover:bg-green-400 dark:bg-green-900 dark:hover:bg-green-700 rounded-md"
                                role="button">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2 py-1 text-xs text-black dark:text-white bg-red-200 hover:bg-red-400 dark:bg-red-900 dark:hover:bg-red-700 rounded-md"
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

    {{ $products->links() }}


</x-admin-layout>
