<x-admin-layout>

    <x-slot name="header">
        <x-slot name="title">Images</x-slot>
        <a href="{{ route('admin.images.create') }}" class="btn-secondary">
            Add Image
        </a>
    </x-slot>

    @foreach ($images as $image)
        <a href="{{ route('admin.images.edit', $image->id) }}" class="inline-block text-center">
            <img src="{{ asset('uploads/' . $image->image) }}">
            <span>{{ $image->name }}</span>
        </a>
    @endforeach

</x-admin-layout>
