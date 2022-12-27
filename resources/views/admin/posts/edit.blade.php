<x-admin-layout>

    <x-slot name="header">
        <x-slot name="title">Update Post</x-slot>
    </x-slot>



    <x-admin.form-card class="w-full mb-6">

        <form id="edit_post" action="{{ route('admin.posts.update', $post->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="title" value="{{ $post->title }}">
                </div>
                <div class="flex flex-col gap-6 sm:items-center sm:flex-row">
                    <div class="relative ">
                        <img src="{{ $post->cover ? asset('posts/cover/' . $post->cover) : asset('images/no-image.png') }}"
                            class="w-32 rounded-lg shadow-xl aspect-square">
                        <button class="absolute text-xl text-red-600 hover:text-red-400 bottom-1 left-1"
                            form="delete_cover">
                            <i class="fa-solid fa-trash "></i>
                        </button>
                    </div>
                    <div class="flex-grow">
                        <label for="cover">Cover Image</label>
                        <input type="file" name="cover" id="cover">
                    </div>
                </div>
                {{-- <div>
                    <label for="images">Images</label>
                    <input type="file" name="images[]" id="images" multiple>
                </div> --}}
                <div>
                    <label for="body">Body</label>
                    <textarea name="body" id="body" placeholder="body">{{ $post->body }}</textarea>
                </div>
                <div class="flex flex-col lg:flex-row">
                    <div class="flex-1">
                        <label>Categories</label>
                        @foreach ($categories as $category)
                            <label for="category-{{ $category->slug }}">
                                <input type="checkbox" name="categories[]" id="category-{{ $category->slug }}"
                                    value="{{ $category->id }}"
                                    {{ in_array($category->id, $post->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                                {{ $category->name }}
                            </label>
                        @endforeach
                    </div>
                    <div class="flex-1">
                        <label>Tags</label>
                        @foreach ($tags as $tag)
                            <label for="tag-{{ $tag->slug }}">
                                <input type="checkbox" name="tags[]" id="tag-{{ $tag->slug }}"
                                    value="{{ $tag->id }}"
                                    {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                                {{ $tag->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full btn-primary sm:w-min" form="edit_post">Update</button>
                </div>
            </div>
        </form>

    </x-admin.form-card>

    <form id="delete_cover" action="{{ route('admin.posts.delete_cover', $post->id) }}" method="POST">
        @csrf
        @method('delete')
    </form>

    <x-admin.form-card>
        <div class="mb-6">
            <form id="add_image" action="{{ route('admin.posts.upload_images', $post->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="images">Images</label>
                <div class="flex flex-col gap-2 sm:flex-row">
                    <input type="file" name="images[]" id="images" multiple>
                    <button type="submit" class="border border-blue-600 btn-primary">
                        <span class="sm:hidden">Upload Images</span>
                        <span class="hidden sm:block">Upload</span>
                    </button>
                </div>
            </form>
        </div>
        {{-- <label>Images</label> --}}
        <div class="grid grid-cols-2 gap-4 mb-6 sm:grid-cols-3 md:grid-cols-4">
            @foreach ($post->postImages as $image)
                <div class="relative">
                    <form id="delete_image" action="{{ route('admin.posts.delete_image', $image->id) }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <img src="{{ asset('posts/images/' . $image->image) }}"
                            class="w-full rounded-lg shadow-xl aspect-square">
                        <button class="absolute text-xl text-red-600 hover:text-red-400 bottom-1 left-1">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
        {{-- <div>
            <button type="submit" class="btn-primary" form="add_image">Update</button>
        </div> --}}

    </x-admin.form-card>

    {{-- <x-admin.form-card>
        <label>Images</label>
        <div class="flex flex-wrap gap-4">
            @foreach ($post->postImages as $image)
                <div class="relative">
                    <form id="delete_image" action="{{ route('admin.posts.delete_image', $image->id) }}"
                        method="POST">
                        @csrf
                        @method('delete')
                        <img src="{{ asset('posts/images/' . $image->image) }}" class="w-32 h-32 rounded-lg shadow-xl">
                        <button class="absolute text-xl text-red-600 hover:text-red-400 bottom-1 left-1"
                            form="delete_image">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </x-admin.form-card> --}}

</x-admin-layout>
