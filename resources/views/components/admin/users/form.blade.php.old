@csrf

<div class="flex flex-col sm:flex-row sm:gap-12 mb-6">

    <div class="sm:flex-1">

        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ old('name') }}@isset($user) {{ $user->name }} @endisset">
            @error('name')
                <p class="text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ old('email') }}@isset($user) {{ $user->email }} @endisset">
            @error('email')
                <p class="text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

       @if (!isset($user))
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password" id="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('password') }}@isset($user) {{ $user->password }} @endisset">
                @error('password')
                    <p class="text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="password_confirmation"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('password_confirmation')
                    <p class="text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
        @endif



    </div>

    <div class="sm:w-1/4">

        <div class="mb-6">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>

            @foreach ($roles as $role)
                <div class="flex items-center mb-4">
                    <input type="radio" name="role" id="role-radio-{{ $role->id }}"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        value="{{ $role->name }}"
                        @isset($user)
                            @if($role->id == $user->roles->pluck('id')->first()) checked @endif
                        @else
                            @if($role->name == 'User') checked @endif
                        @endisset>
                    <label for="role-radio-{{ $role->id }}"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                </div>
            @endforeach
            @error('role')
                <p class="text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

    </div>

</div>

<button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
    @isset($user)
        Update
    @else
        Submit
    @endisset
</button>
