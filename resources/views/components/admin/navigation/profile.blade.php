<div class="flex flex-col justify-center items-center">
    {{-- <img class="w-20 h-20 rounded-full mb-4" src="{{ asset('/storage/images/avatar.png') }}"> --}}
    <h3 class="text-lg font-bold text-gray-900 dark:text-white">
        <a href="#">{{ auth()->user()->name }}</a>
    </h3>
    <p class="font-basic text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
    <form action="{{ route('logout') }}" method="post">
        @csrf <button type="submit"
            class="w-full py-2.5 px-5 mt-6 mb-2 text-center inline-flex justify-center items-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            <svg class="mr-2 -ml-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                </path>
            </svg>
            Logout
        </button>
    </form>
</div>
