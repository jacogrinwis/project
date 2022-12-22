<x-admin-layout>

    <x-slot name="header">
        <x-slot name="title">Create Product</x-slot>
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    <x-admin.products.form :categories="$categories" :tags="$tags" />
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>
