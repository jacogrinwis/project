<x-admin-layout class="max-w-xl">

    <x-slot name="header">
        <x-slot name="title">Create User</x-slot>
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    <x-admin.users.form :roles="$roles" />
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>
