<?php

$arr = [
    [
        'icon' => 'bi bi-box-fill',
        'name' => 'Products',
        'sub_items' => [
            [
                'name' => 'All Products',
                'href' => route('admin.products.index'),
            ],
            [
                'name' => 'Add Product',
                'href' => route('admin.products.create'),
            ],
        ],
    ],
    [
        'icon' => 'bi bi-clipboard-fill',
        'name' => 'Posts',
        'sub_items' => [
            [
                'name' => 'All Posts',
                'href' => route('admin.posts.index'),
            ],
            [
                'name' => 'Add Post',
                'href' => route('admin.posts.create'),
            ],
        ],
    ],
    [
        'icon' => 'bi bi-file-earmark-text-fill',
        'name' => 'Pages',
        'sub_items' => [
            [
                'name' => 'All Pages',
                'href' => route('admin.pages.index'),
            ],
            [
                'name' => 'Add Page',
                'href' => route('admin.pages.create'),
            ],
        ],
    ],
    [
        'icon' => 'bi bi-collection-fill',
        'name' => 'Categories',
        'sub_items' => [
            [
                'name' => 'All Categories',
                'href' => route('admin.categories.index'),
            ],
            [
                'name' => 'Add Category',
                'href' => route('admin.categories.create'),
            ],
        ],
    ],
    [
        'icon' => 'bi bi-tags-fill',
        'name' => 'Tags',
        'sub_items' => [
            [
                'name' => 'All Tags',
                'href' => route('admin.tags.index'),
            ],
            [
                'name' => 'Add Tag',
                'href' => route('admin.tags.create'),
            ],
        ],
    ],
    [
        'icon' => 'bi bi-people-fill',
        'name' => 'Users',
        'sub_items' => [
            [
                'name' => 'All Users',
                'href' => route('admin.users.index'),
            ],
            [
                'name' => 'Add User',
                'href' => route('admin.users.create'),
            ],
        ],
    ],
    [
        'icon' => 'bi bi-person-fill-gear',
        'name' => 'Roles',
        'sub_items' => [
            [
                'name' => 'All Roles',
                'href' => route('admin.roles.index'),
            ],
            [
                'name' => 'Add Role',
                'href' => route('admin.roles.create'),
            ],
        ],
    ],
    [
        'icon' => 'bi bi-unlock-fill',
        'name' => 'Permissions',
        'sub_items' => [
            [
                'name' => 'All Permissions',
                'href' => route('admin.permissions.index'),
            ],
            [
                'name' => 'Add Permission',
                'href' => route('admin.permissions.create'),
            ],
        ],
    ],
    [
        'icon' => 'bi bi-gear-fill',
        'name' => 'Settings',
        'sub_items' => [
            [
                'name' => 'All Settings',
                'href' => route('admin.settings.index'),
            ],
        ],
    ],
];

?>


<nav x-data="{ open: false }" x-on:click.outside="open = false">
    <button x-on:click="open = ! open" class="w-6 h-6 fixed top-6 right-6 md:hidden text-white focus:outline-none" >
        <span class="sr-only">Open main menu</span>
        <div class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
            <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
            <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out" :class="{'opacity-0': open } "></span>
            <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
        </div>
    </button>
    <div :class="open ? '' : 'hidden'"
        class="fixed left-0 top-0 z-10 h-full w-64 md:block px-3 py-6 overflow-y-auto bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 shadow-lg md:shadow-none
        custom-scrollbar-rounded-thin">
        <x-admin.navigation.profile />
        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            @foreach ($arr as $item)
                <li x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                    <button
                        class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        @click="open = ! open">
                        <i
                            class="bi {{ $item['icon'] }} flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white text-lg"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $item['name'] }}</span>
                        <i class="bi bi-chevron-down text-xs"></i>
                    </button>

                    <ul x-show="open">
                        @foreach ($item['sub_items'] as $sub_item)
                            <li>
                                <a href="{{ $sub_item['href'] }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    {{ $sub_item['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
