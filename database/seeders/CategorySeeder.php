<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Codeigniter',
                'slug' => 'codeigniter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tailwind',
                'slug' => 'tailwind',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bootstrap',
                'slug' => 'bootstrap',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'VSCode',
                'slug' => 'vscode',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'XAMPP',
                'slug' => 'xammp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Category::insert($data);
    }
}
