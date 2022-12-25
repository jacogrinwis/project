<x-admin-layout>

    <x-slot name="header">
        <x-slot name="title">Create Post</x-slot>
    </x-slot>

    <x-admin.form-card>

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="title">
                </div>
                <div>
                    <label for="cover">Cover Image</label>
                    <input type="file" name="cover" id="cover">
                </div>
                <div>
                    <label for="images">Images</label>
                    <input type="file" name="images[]" id="images" multiple>
                </div>
                <div>
                    <label for="body">Body</label>
                    <textarea name="body" id="body" placeholder="body"></textarea>
                </div>
                <div class="flex flex-col lg:flex-row">
                    <div class="flex-1">
                        <label>Categories</label>
                        @foreach ($categories as $category)
                        <label for="category-{{ $category->slug }}">
                            <input type="checkbox" name="categories[]" id="category-{{ $category->slug }}" value="{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                        @endforeach
                    </div>
                    <div class="flex-1">
                        <label>Tags</label>
                        @foreach ($tags as $tag)
                        <label for="tag-{{ $tag->slug }}">
                            <input type="checkbox" name="tags[]" id="tag-{{ $tag->slug }}" value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </x-admin.form-card>

</x-admin-layout>
