<x-admin-layout class="max-w-xl">

    <x-slot name="header">
        <x-slot name="title">Create User</x-slot>
    </x-slot>

    <form action="{{ route('admin.users.store') }}" method="POST">
        <x-admin.users.form :roles="$roles">
    </form>

    </x-admin.users.form>

</x-admin-layout>
