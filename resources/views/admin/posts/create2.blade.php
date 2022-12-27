<x-admin2-layout>

    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold dark:text-white">
            New Post
        </h2>
    </div>

    <x-admin.card class="mb-6">
        <div class="max-w-xl">
            <div class="flex-1">
                <form id="store-post" action="{{ route('admin.posts.store') }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="space-y-4">
                        @csrf
                        <div>
                            <x-admin.toggle id="published" name="published" value="published" label="Published" />
                        </div>
                        <div>
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title">
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
                            <textarea name="body" id="body"></textarea>
                        </div>
                        <div class="@container">
                            <div class="flex flex-col @sm:flex-row">
                                <div class="flex-1">
                                    <label>Categories</label>
                                    @foreach ($categories as $category)
                                        <label for="category-{{ $category->slug }}">
                                            <input type="checkbox" name="categories[]"
                                                id="category-{{ $category->slug }}" value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    @endforeach
                                </div>
                                <div class="flex-1">
                                    <label>Tags</label>
                                    @foreach ($tags as $tag)
                                        <label for="tag-{{ $tag->slug }}">
                                            <input type="checkbox" name="tags[]" id="tag-{{ $tag->slug }}"
                                                value="{{ $tag->id }}">
                                            {{ $tag->name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <button class="mt-6 mr-2 btn-primary" form="store-post">Save</button>
    </x-admin.card>

</x-admin2-layout>
