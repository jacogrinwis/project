<x-admin-layout class="max-w-xl">

    <x-slot name="header">
        <x-slot name="title">Create User</x-slot>
    </x-slot>


    {{-- <div class="max-w-7xl mx-auto space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">

                <form action="{{ route('admin.users.store') }}" method="POST">
                    <div class="flex flex-col lg:flex-row gap-6 lg:gap-10 mb-6">
                        <div class="flex-1 space-y-6">
                            <div>
                                <x-input-label for="name" value="Name" />
                                <x-text-input id="name" name="name" type="text" class="block w-full"
                                    required autofocus autocomplete="name" />
                            </div>
                            <div>
                                <x-input-label for="name" value="Email" />
                                <x-text-input id="name" name="name" type="text" class="block w-full"
                                    required autofocus autocomplete="name" />
                            </div>
                            <div>
                                <x-input-label for="name" value="Password" />
                                <x-text-input id="name" name="name" type="text" class="block w-full"
                                    required autofocus autocomplete="name" />
                            </div>
                            <div>
                                <x-input-label for="name" value="Confirm Password" />
                                <x-text-input id="name" name="name" type="text" class="block w-full"
                                    required autofocus autocomplete="name" />
                            </div>

                        </div>
                        <fieldset class="flex-shrink space-y-4">
                            <legend class="block -mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</legend>
                            <div class="flex items-center">
                                <x-radio-input type="radio" id="test" name="test" />
                                <x-input-label for="test" value="User" class="mb-0" />
                            </div>
                            <div class="flex items-center">
                                <x-radio-input type="radio" id="test" name="test" />
                                <x-input-label for="test" value="Moderator" class="mb-0" />
                            </div>
                            <div class="flex items-center">
                                <x-radio-input type="radio" id="test" name="test" />
                                <x-input-label for="test" value="Publisher" class="mb-0" />
                            </div>
                            <div class="flex items-center">
                                <x-radio-input type="radio" id="test" name="test" />
                                <x-input-label for="test" value="Writer" class="mb-0" />
                            </div>
                            <div class="flex items-center">
                                <x-radio-input type="radio" id="test" name="test" />
                                <x-input-label for="test" value="Editor" class="mb-0" />
                            </div>
                            <div class="flex items-center">
                                <x-radio-input type="radio" id="test" name="test" />
                                <x-input-label for="test" value="Admin" class="mb-0" />
                            </div>
                            <div class="flex items-center">
                                <x-radio-input type="radio" id="test" name="test" />
                                <x-input-label for="test" value="Super-Admin" class="mb-0" />
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <x-primary-button>Save</x-primary-button>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">

                <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                    <div>
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            required autofocus autocomplete="name" />
                    </div>
                    <div>
                        <x-input-label for="name" value="Email" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            required autofocus autocomplete="name" />
                    </div>
                    <div>
                        <x-input-label for="name" value="Password" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            required autofocus autocomplete="name" />
                    </div>
                    <div>
                        <x-input-label for="name" value="Confirm Password" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            required autofocus autocomplete="name" />
                    </div>
                    <div>
                        <x-primary-button>Save</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

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
