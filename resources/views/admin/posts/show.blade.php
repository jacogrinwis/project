<x-admin2-layout>

    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold dark:text-white">
            New Post
        </h2>
    </div>

    <x-admin.card class="mb-6">
        <div class="max-w-xl">
            <div class="flex-1 space-y-4">
                <div>
                    <x-admin.toggle value="Published" />
                </div>
                <div>
                    <label for="">Title</label>
                    <input type="text">
                </div>
                <div>
                    <label for="">Cover Image</label>
                    <input type="file">
                </div>
                <div>
                    <label for="">Images</label>
                    <input type="file">
                </div>
                <div>
                    <label for="">Body</label>
                    <textarea name="" id=""></textarea>
                </div>
                <div class="@container">
                    <div class="flex flex-col @sm:flex-row">
                        <div class="flex-1">
                            <label>Categories</label>
                            <label for="category-laravel">
                                <input type="checkbox" name="categories[]" id="category-laravel" value="1">
                                Laravel
                            </label>
                            <label for="category-codeigniter">
                                <input type="checkbox" name="categories[]" id="category-codeigniter" value="2">
                                Codeigniter
                            </label>
                            <label for="category-tailwind">
                                <input type="checkbox" name="categories[]" id="category-tailwind" value="3">
                                Tailwind
                            </label>
                            <label for="category-bootstrap">
                                <input type="checkbox" name="categories[]" id="category-bootstrap" value="4">
                                Oeste schelpen kranzen
                            </label>
                            <label for="category-vscode">
                                <input type="checkbox" name="categories[]" id="category-vscode" value="5">
                                VSCode
                            </label>
                            <label for="category-xammp">
                                <input type="checkbox" name="categories[]" id="category-xammp" value="6">
                                XAMPP
                            </label>
                        </div>
                        <div class="flex-1">
                            <label>Tags</label>
                            <label for="tag-html">
                                <input type="checkbox" name="tags[]" id="tag-html" value="1">
                                HTML
                            </label>
                            <label for="tag-css">
                                <input type="checkbox" name="tags[]" id="tag-css" value="2">
                                CSS
                            </label>
                            <label for="tag-js">
                                <input type="checkbox" name="tags[]" id="tag-js" value="3">
                                JS
                            </label>
                            <label for="tag-php">
                                <input type="checkbox" name="tags[]" id="tag-php" value="4">
                                PHP
                            </label>
                            <label for="tag-sql">
                                <input type="checkbox" name="tags[]" id="tag-sql" value="5">
                                SQL
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="mt-6 btn-primary">Save</button>
    </x-admin.card>

    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold dark:text-white">
            Edit Post
        </h2>
        <button class="btn-red">
            <i class="mr-2 fa-solid fa-trash"></i>
            Delete
        </button>
    </div>

    <x-admin.card class="mb-6">
        <div class="@container">
            <div class="flex flex-col @xl:flex-row gap-4 @xl:gap-8">
                <div class="flex-1 space-y-4">
                    <div>
                        <x-admin.toggle value="Published" checked />
                    </div>
                    <div>
                        <label for="">Title</label>
                        <input type="text" value="Post title">
                    </div>
                    <div>
                        <label for="">Cover Image</label>
                        <input type="file">
                    </div>
                    <div>
                        <label for="">Images</label>
                        <input type="file">
                    </div>
                    <div>
                        <label for="">Body</label>
                        <textarea name="" id="">Post body content</textarea>
                    </div>
                    <div class="@container">
                        <div class="flex flex-col @sm:flex-row">
                            <div class="flex-1">
                                <label>Categories</label>
                                <label for="category-laravel">
                                    <input type="checkbox" name="categories[]" id="category-laravel" value="1">
                                    Laravel
                                </label>
                                <label for="category-codeigniter">
                                    <input type="checkbox" name="categories[]" id="category-codeigniter"
                                        value="2" checked="">
                                    Codeigniter
                                </label>
                                <label for="category-tailwind">
                                    <input type="checkbox" name="categories[]" id="category-tailwind"
                                        value="3">
                                    Tailwind
                                </label>
                                <label for="category-bootstrap">
                                    <input type="checkbox" name="categories[]" id="category-bootstrap"
                                        value="4">
                                    Oeste schelpen kranzen
                                </label>
                                <label for="category-vscode">
                                    <input type="checkbox" name="categories[]" id="category-vscode" value="5"
                                        checked="">
                                    VSCode
                                </label>
                                <label for="category-xammp">
                                    <input type="checkbox" name="categories[]" id="category-xammp" value="6">
                                    XAMPP
                                </label>
                            </div>
                            <div class="flex-1">
                                <label>Tags</label>
                                <label for="tag-html">
                                    <input type="checkbox" name="tags[]" id="tag-html" value="1">
                                    HTML
                                </label>
                                <label for="tag-css">
                                    <input type="checkbox" name="tags[]" id="tag-css" value="2"
                                        checked="">
                                    CSS
                                </label>
                                <label for="tag-js">
                                    <input type="checkbox" name="tags[]" id="tag-js" value="3">
                                    JS
                                </label>
                                <label for="tag-php">
                                    <input type="checkbox" name="tags[]" id="tag-php" value="4"
                                        checked="">
                                    PHP
                                </label>
                                <label for="tag-sql">
                                    <input type="checkbox" name="tags[]" id="tag-sql" value="5">
                                    SQL
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 space-y-6">
                    <div>
                        <label for="">Cover</label>
                        <div class="@container">
                            <div class="grid gap-4 grid-cols-2 @sm:grid-cols-3 @md:grid-cols-4">
                                <div class="relative overflow-hidden shadow-lg outline outline-2 outline-white group">
                                    <form action="">
                                        <img src="http://project.test/posts/cover/63a8d17cc24ac.jpg"
                                            class="object-cover aspect-square group-hover:brightness-50">
                                        <button
                                            class="absolute text-xl text-red-600 bottom-1 left-2 group-hover:text-white">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="">Images</label>
                        <div class="@container">
                            <div class="grid gap-4 grid-cols-2 @sm:grid-cols-3 @md:grid-cols-4">
                                <div class="relative overflow-hidden shadow-lg outline outline-2 outline-white group">
                                    <form action="">
                                        <img src="http://project.test/posts/cover/63a8d17cc24ac.jpg"
                                            class="object-cover aspect-square group-hover:brightness-50">
                                        <button
                                            class="absolute text-xl text-red-600 bottom-1 left-2 group-hover:text-white">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="relative overflow-hidden shadow-lg outline outline-2 outline-white group">
                                    <form action="">
                                        <img src="http://project.test/posts/cover/63a8d17cc24ac.jpg"
                                            class="object-cover aspect-square group-hover:brightness-50">
                                        <button
                                            class="absolute text-xl text-red-600 group-hover:text-white bottom-1 left-2">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="relative overflow-hidden shadow-lg outline outline-2 outline-white group">
                                    <form action="">
                                        <img src="http://project.test/posts/cover/63a8d17cc24ac.jpg"
                                            class="object-cover aspect-square group-hover:brightness-50">
                                        <button
                                            class="absolute text-xl text-red-600 bottom-1 left-2 group-hover:text-white">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="relative overflow-hidden shadow-lg outline outline-2 outline-white group">
                                    <form action="">
                                        <img src="http://project.test/posts/cover/63a8d17cc24ac.jpg"
                                            class="object-cover aspect-square group-hover:brightness-50">
                                        <button
                                            class="absolute text-xl text-red-600 bottom-1 left-2 group-hover:text-white">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                                <div class="relative overflow-hidden shadow-lg outline outline-2 outline-white group">
                                    <form action="">
                                        <img src="http://project.test/posts/images/63aabca9598dc.jpg"
                                            class="object-cover aspect-square group-hover:brightness-50">
                                        <button
                                            class="absolute text-xl text-red-600 bottom-1 left-2 group-hover:text-white">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="relative overflow-hidden shadow-lg outline outline-2 outline-white group">
                                    <form action="">
                                        <img src="http://project.test/posts/images/63aabc9848861.jpg"
                                            class="object-cover aspect-square group-hover:brightness-50">
                                        <button
                                            class="absolute text-xl text-red-600 bottom-1 left-2 group-hover:text-white">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="relative overflow-hidden shadow-lg outline outline-2 outline-white group">
                                    <form action="">
                                        <img src="http://project.test/posts/images/63a8d17100f05.jpg"
                                            class="object-cover aspect-square group-hover:brightness-50">
                                        <button
                                            class="absolute text-xl text-red-600 bottom-1 left-2 group-hover:text-white">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="relative overflow-hidden shadow-lg outline outline-2 outline-white group">
                                    <form action="">
                                        <img src="http://project.test/posts/images/63a8c0b9e3ec2.jpg"
                                            class="object-cover aspect-square group-hover:brightness-50">
                                        <button
                                            class="absolute text-xl text-red-600 bottom-1 left-2 group-hover:text-white">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <button class="mt-6 btn-primary">Update</button>
    </x-admin.card>

</x-admin2-layout>
