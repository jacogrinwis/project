<x-admin-layout>

    <x-slot name="header">
        <x-slot name="title">Upload Images</x-slot>
    </x-slot>

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
        <p>{{ Session::get('name') }}</p>
        <img src="{{ asset('uploads/' . Session::get('image')) }}" class="rounded-lg mr-6 mt-6 mb-6">
    @endif

    <div class="max-w-7xl mx-auto space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-admin.images.form />
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>
