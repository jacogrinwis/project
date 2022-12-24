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
        <label for="images" class="form-label block mb-2">
            @isset($edit)
                Add images
            @else
                Images
            @endisset
        </label>
        <input type="file" name="images[]" id="images" class="file-input"
            accept="image/png, image/jpeg, image/jpg, image/gif, image/webp" multiple>
        <x-input-error :messages="$errors->get('images')" class="mt-2" />
    </div>
    @if (isset($edit))
        @if ($product->images)
            <div class="flex gap-2">
                @foreach ($product->images as $key => $image)
                    <div class="relative">
                        <img src="{{ $image ? asset('storage/product_images/' . $image) : asset('images/no-image.png') }}"
                            alt="" class="h-32 w-32 rounded-lg border border-gray-600 shadow-md">
                        <a href="{{ route('admin.products.remove-image', ['pid' => $product, 'iid' => $key]) }}"
                            class="btn-red absolute top-2 right-2 py-1 px-2 rounded-full">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    @endif
    <div>
        <label for="description" class="form-label block mb-2">Description</label>
        <textarea name="description" id="description" class="textarea">{{ old('description') ?? ($product->description ?? '') }}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
    <div class="flex">
        <div class="flex-1 space-y-4">
            <x-input-label value="catgories" class="-mb-2" />
            @foreach ($categories as $category)
                <div class="flex items-center">
                    <input type="checkbox" name="categories[]" id="category-checkbox-{{ $category->id }}"
                        class="checkbox-input" value="{{ $category->id }}"
                        @isset($product)
                            {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}
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
                        @isset($product)
                            {{ in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'checked' : '' }}
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
