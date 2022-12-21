<x-admin-layout class="max-w-xl">

    <x-slot name="header">
        <x-slot name="title">Create User</x-slot>
    </x-slot>

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @method('PUT')
        <x-admin.users.form :user="$user" :roles="$roles">
    </form>

    </x-admin.users.form>

</x-admin-layout>
