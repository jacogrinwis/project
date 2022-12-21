<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
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
                'name' => 'HTML',
                'slug' => 'html',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CSS',
                'slug' => 'css',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'JS',
                'slug' => 'js',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PHP',
                'slug' => 'php',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SQL',
                'slug' => 'sql',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Tag::insert($data);
    }
}
