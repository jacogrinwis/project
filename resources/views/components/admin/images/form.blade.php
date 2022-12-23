<div class="space-y-6">

    {{-- @isset($images)
        <div class="flex">
            @foreach ($product->images as $image)
                <div class="text-center">
                    <img src="{{ $image->url ? asset('storage/' . $image->url) : asset('images/no-image.png') }}"
                        alt="" class="h-40 w-40 rounded-lg">
                    <a href="{{ route('admin.image.remove', $image->id) }}" class="btn-red">Delete</a>
                </div>
            @endforeach
        </div>
    @endisset --}}

    <div>
        <label for="name" class="form-label block mb-2">Name</label>
        <input type="text" name="name" id="name" class="text-input" value="{{ old('name') ?? ($image->name ?? '') }}">
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div>
        <label for="images" class="form-label block mb-2">Images</label>
        <input type="file" name="images" id="images" class="file-input">
        <x-input-error :messages="$errors->get('images')" class="mt-2" />
    </div>

    <button type="submit" class="btn-primary mr-2">
        @isset($images)
            Update
        @else
            Submit
        @endisset
    </button>

</div>
