<x-admin2-layout>

    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold dark:text-white">
            New Post
        </h2>
    </div>

    <script defer src="https://unpkg.com/alpinejs-slug@latest/dist/slug.min.js"></script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <x-admin.card class="mb-6">
        <div class="max-w-xl">
            <div class="flex-1">
                <form id="store-post" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data"
                    x-data="{ title: '' }">
                    <div class="space-y-4">
                        @csrf
                        <div>
                            <x-admin.toggle name="published" label="Published" />
                        </div>
                        <div class="{{ $errors->has('title') ? 'is-invalid' : '' }}">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}"
                                x-model="title">
                            @error('title')
                                <p class="mt-2 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="slug">Slug</label>
                            <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                                x-slug="title">
                            @error('slug')
                                <p class="mt-2 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="cover">Cover Image</label>
                            <input type="file" id="cover" name="cover" accept="image/png, image/jpeg">
                            @error('cover')
                                <p class="mt-2 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="images">Images</label>
                            <input type="file" id="images" name="images[]" multiple>
                            @error('images')
                                <p class="mt-2 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="body">Body</label>
                            <textarea name="body" id="body">{{ old('body') }}</textarea>
                            @error('body')
                                <p class="mt-2 text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="@container">
                            <div class="flex flex-col @sm:flex-row">
                                <div class="flex-1">
                                    <label>Categories</label>
                                    @foreach ($categories as $category)
                                        <label for="category-{{ $category->slug }}">
                                            <input type="checkbox" name="categories[]"
                                                id="category-{{ $category->slug }}" value="{{ $category->id }}"
                                                {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : '' }}>
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
                                                {{ is_array(old('tags')) && in_array($tag->id, old('tags')) ? 'checked' : '' }}>
                                            {{ $tag->name }}
                                        </label>
                                    @endforeach
                                </div>
                                <php print_r(old('tags')); ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <button class="mt-6 mr-2 btn-primary" form="store-post">Save</button>
    </x-admin.card>

</x-admin2-layout>
