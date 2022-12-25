<x-admin-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="mb-6 custom-table">
        <table>
            <thead>
                <tr>
                    <th>#<span class="sr-only">Id</span></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th><span class="sr-only">Action</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-1">1</td>
                    <th>Firstname Lastname</th>
                    <td>example@example.com</td>
                    <td class="w-1 space-x-1 whitespace-nowrap">
                        <button class="btn-action-blue">
                            <i class="bi bi-eye-fill"></i>
                            <span class="sr-only"></span>
                        </button>
                        <button class="btn-action-green">
                            <i class="bi bi-pencil-fill"></i>
                            <span class="sr-only">Edit</span>
                        </button>
                        <button class="btn-action-red">
                            <i class="bi bi-trash3-fill"></i>
                            <span class="sr-only">Delete</span>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="w-1">2</td>
                    <th>Firstname Lastname</th>
                    <td>example@example.com</td>
                    <td class="w-1 space-x-1 whitespace-nowrap">
                        <button class="btn-action-blue">
                            <i class="bi bi-eye-fill"></i>
                            <span class="sr-only"></span>
                        </button>
                        <button class="btn-action-green">
                            <i class="bi bi-pencil-fill"></i>
                            <span class="sr-only">Edit</span>
                        </button>
                        <button class="btn-action-red">
                            <i class="bi bi-trash3-fill"></i>
                            <span class="sr-only">Delete</span>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="w-1">3</td>
                    <th>Firstname Lastname</th>
                    <td>example@example.com</td>
                    <td class="w-1 space-x-1 whitespace-nowrap">
                        <button class="btn-action-blue">
                            <i class="bi bi-eye-fill"></i>
                            <span class="sr-only"></span></button>
                        <button class="btn-action-green">
                            <i class="bi bi-pencil-fill"></i>
                            <span class="sr-only">Edit</span>
                        </button>
                        <button class="btn-action-red">
                            <i class="bi bi-trash3-fill"></i>
                            <span class="sr-only">Delete</span>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="w-1">4</td>
                    <th>Firstname Lastname</th>
                    <td>example@example.com</td>
                    <td class="w-1 space-x-1 whitespace-nowrap">
                        <button class="btn-action-blue">
                            <i class="bi bi-eye-fill"></i>
                            <span class="sr-only"></span>
                        </button>
                        <button class="btn-action-green">
                            <i class="bi bi-pencil-fill"></i>
                            <span class="sr-only">Edit</span>
                        </button>
                        <button class="btn-action-red">
                            <i class="bi bi-trash3-fill"></i>
                            <span class="sr-only">Delete</span>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="w-1">5</td>
                    <th>Firstname Lastname</th>
                    <td>example@example.com</td>
                    <td class="w-1 space-x-1 whitespace-nowrap">
                        <button class="btn-action-blue">
                            <i class="bi bi-eye-fill"></i>
                            <span class="sr-only"></span></button>
                        <button class="btn-action-green">
                            <i class="bi bi-pencil-fill"></i>
                            <span class="sr-only">Edit</span>
                        </button>
                        <button class="btn-action-red">
                            <i class="bi bi-trash3-fill"></i>
                            <span class="sr-only">Delete</span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <x-admin.form-card>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="space-y-6">
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title">
                </div>
                <div>
                    <label for="cover">Cover image</label>
                    <input type="file" name="cover" id="cover">
                </div>
                <div>
                    <label for="images">Images</label>
                    <input type="file" name="images[]" id="images" multiple>
                </div>
                <div>
                    <label for="body2">Body</label>
                    <textarea name="body" id="body2">text</textarea>
                </div>
                <div>
                    <button type="submit" class="btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </x-admin.form-card>

</x-admin-layout>
