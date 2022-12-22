@csrf

<div class="space-y-6">

    <div>
        <label for="name" class="form-label block mb-2">Name</label>
        <input type="text" name="name" id="name" class="text-input"
            value="{{ old('name') ?? ($product->name ?? '') }}">
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    {{-- <div>
        <label for="slug" class="form-label block mb-2">Slug</label>
        <input type="name" name="slug" id="slug" class="text-input"
            value="{{ old('slug') ?? ($product->slug ?? '') }}">
        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
    </div> --}}
    <div>
        <label for="price" class="form-label block mb-2">price</label>
        <input type="number" name="price" id="price" class="text-input"
            value="{{ old('price') ?? ($product->price ?? '') }}">
        <x-input-error :messages="$errors->get('price')" class="mt-2" />
    </div>
    <div>
        <label for="image" class="form-label block mb-2">Image</label>
        <input type="file" name="image" id="image" class="file-input">
    </div>
    <div>
        <label for="description" class="form-label block mb-2">Description</label>
        <textarea name="description" id="description" class="textarea"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
    <div class="flex">
        <div class="flex-1 space-y-4">
            <x-input-label value="catgories" class="-mb-2" />
            @foreach ($categories as $category)
                <div class="flex items-center">
                    <input type="checkbox" name="categories[]" id="category-checkbox-{{ $category->id }}" class="checkbox-input"
                        value="{{ $category->id }}"
                        @isset($product)
                    @if ($category->id == $product->categories->pluck('id')->first()) checked @endif
                @endisset>
                    <x-input-label for="test" :value="$category->name" class="mb-0" />
                </div>
            @endforeach
        </div>
        <div class="flex-1 space-y-4">
            <x-input-label value="Tags" class="-mb-2" />
            @foreach ($tags as $tag)
                <div class="flex items-center">
                    <input type="checkbox" name="tags[]" id="tag-checkbox-{{ $tag->id }}" class="checkbox-input"
                        value="{{ $tag->id }}"
                        @isset($user)
                    @if ($tag->id == $product->tags->pluck('id')->first()) checked @endif
                @else
                    @if ($tag->name == 'User') checked @endif
                @endisset>
                    <x-input-label for="tags" :value="$tag->name" class="mb-0" />
                </div>
            @endforeach
        </div>
    </div>
    @empty($product)
    @endempty

    <button type="submit" class="btn-primary mr-2">
        @isset($product)
            Update
        @else
            Submit
        @endisset
    </button>

</div>
