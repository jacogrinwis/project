<x-admin-layout>

    <x-slot name="header">
        <x-slot name="title">Update Post</x-slot>
    </x-slot>

    <x-admin.form-card>

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="title" value="{{ $post->title }}">
                </div>
                <div>
                    <label for="cover">Cover Image</label>
                    <input type="file" name="cover" id="cover">
                </div>
                {{-- <div class="relative">
                    <form action="{{ route('admin.posts.delete_cover', $post->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <img src="{{ asset('posts/cover/' . $post->cover) }}" class="w-32 h-32 rounded-lg">
                        <button class="absolute text-xl text-red-600 bottom-1 left-1">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </form>
                </div> --}}
                <div>
                    <label for="images">Images</label>
                    <input type="file" name="images[]" id="images" multiple>
                </div>
                {{-- <div class="flex gap-2">
                    @foreach ($post->postImages as $image)
                        <div class="relative">
                            <form action="{{ route('admin.posts.delete_image', $image->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <img src="{{ asset('posts/images/' . $image->image) }}" class="w-32 h-32 rounded-lg">
                                <button class="absolute text-xl text-red-600 bottom-1 left-1">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
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
                    <button type="submit" class="btn-primary">Update</button>
                </div>
            </div>
        </form>

    </x-admin.form-card>

</x-admin-layout>
