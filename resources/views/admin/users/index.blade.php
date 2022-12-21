<x-admin-layout>

    <x-slot name="header">
        <x-slot name="title">Users</x-slot>
        <a href="{{ route('admin.users.create') }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Add User
        </a>
    </x-slot>

    <div class="overflow-x-auto relative border border-gray-200 dark:border-none sm:rounded-lg mb-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="py-3 px-6 text-right">#</th>
                    <th class="py-3 px-6">Name</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Role</th>
                    <th class="py-3 px-6"><span class="sr-only">Action</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="py-3 px-6 w-1">
                            {{ $user->id }}
                        </td>
                        <th class="py-3 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="py-3 px-6 whitespace-nowrap">
                            {{ $user->email }}
                        </td>
                        <td class="py-3 px-6 whitespace-nowrap">
                            <span class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                {{ $user->roles->pluck('name')->first() }}
                            </span>
                        </td>
                        <td class="py-3 px-6 w-1 whitespace-nowrap space-x-1">
                            <a href="{{ route('admin.users.show', $user->id) }}"
                                class="px-2 py-1 text-xs text-black dark:text-white bg-blue-200 hover:bg-blue-400 dark:bg-blue-900 dark:hover:bg-blue-700 rounded-md">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="px-2 py-1 text-xs  text-black dark:text-white bg-green-200 hover:bg-green-400 dark:bg-green-900 dark:hover:bg-green-700 rounded-md"
                                role="button">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2 py-1 text-xs text-black dark:text-white bg-red-200 hover:bg-red-400 dark:bg-red-900 dark:hover:bg-red-700 rounded-md"
                                    onclick="confirm('Are you sure you want to delete this user?')">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-admin-layout>
