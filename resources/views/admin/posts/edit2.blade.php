<x-admin2-layout>

    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold dark:text-white">
            Edit Post
        </h2>
        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-red">
                <i class="mr-2 fa-solid fa-trash"></i>
                Delete
            </button>
        </form>
    </div>

    <script defer src="https://unpkg.com/alpinejs-slug@latest/dist/slug.min.js"></script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- <script>
        import Alpine from 'alpinejs'
        import slug from 'alpinejs-slug'

        Alpine.plugin(slug)

        Alpine.start()
    </script> --}}

    <x-admin.card class="mb-6">
        <div class="@container">
            <div class="flex flex-col @xl:flex-row gap-4 @xl:gap-8">
                <div class="flex-1 ">
                    <form id="post-update" action="{{ route('admin.posts.update', $post->id) }}" method="POST"
                        enctype="multipart/form-data" x-data="{ title: '{{ $post->title }}' }">
                        <div class="space-y-4">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-admin.toggle id="published" name="published" value="published" label="Published"
                                    checked="{{ $post->published ? true : false }}" />
                            </div>
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" value="{{ $post->title }}"
                                    placeholder="Post title" x-model="title">
                            </div>
                            <div>
                                <label for="slug">Slug</label>
                                <input type="text" id="slug" name="slug" value="{{ $post->slug }}" x-slug="title">
                            </div>
                            <div>
                                <label for="cover">Cover Image</label>
                                <input type="file" id="cover" name="cover">
                            </div>
                            <div>
                                <label for="images">Images</label>
                                <input type="file" id="images" name="images[]" multiple>
                            </div>
                            <div>
                                <label for="">Body</label>
                                <textarea name="body" id="body" placeholder="Post body">{{ $post->body }}</textarea>
                            </div>
                            <div class="@container">
                                <div class="flex flex-col @sm:flex-row">
                                    <div class="flex-1">
                                        <label>Categories</label>
                                        @foreach ($categories as $category)
                                            <label for="category-{{ $category->slug }}">
                                                <input type="checkbox" name="categories[]"
                                                    id="category-{{ $category->slug }}" value="{{ $category->id }}"
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
                            </div>
                        </div>
                    </form>
                </div>
                <div class="flex-1 space-y-6">
                    <div>
                        <label for="">Cover</label>
                        <div class="@container">
                            <div class="grid gap-4 grid-cols-2 @sm:grid-cols-3 @md:grid-cols-4">
                                <div class="relative overflow-hidden shadow-lg outline outline-2 outline-white group">
                                    <img src="{{ $post->cover ? asset('posts/cover/' . $post->cover) : asset('images/no-image.png') }}"
                                        class="object-cover aspect-square group-hover:brightness-50">
                                    <form id="delete_cover" action="{{ route('admin.posts.delete_cover', $post->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="absolute text-xl text-red-600 bottom-1 left-2 group-hover:text-white">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="">Images</label>
                        <div class="@container">
                            <div class="grid gap-4 grid-cols-2 @sm:grid-cols-3 @md:grid-cols-4">
                                @foreach ($post->postImages as $image)
                                    <div
                                        class="relative overflow-hidden shadow-lg outline outline-2 outline-white group">
                                        <img src="{{ asset('posts/images/' . $image->image) }}"
                                            class="object-cover aspect-square group-hover:brightness-50">
                                        <form id="delete_image"
                                            action="{{ route('admin.posts.delete_image', $image->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="absolute text-xl text-red-600 bottom-1 left-2 group-hover:text-white">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="mt-6 btn-primary" form="post-update">Update</button>
    </x-admin.card>

</x-admin2-layout>
