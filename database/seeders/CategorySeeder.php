<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        Category::factory()->create([
            'user_id'       => 1,
            'title'         => 'Alles',
            'slug'          => 'alles',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        // 2
        Category::factory()->create([
            'user_id'       => 1,
            'title'         => 'Grafisch',
            'slug'          => 'grafisch',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        // 3
        Category::factory()->create([
            'user_id'       => 1,
            'title'         => 'Website',
            'slug'          => 'website',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        // 4
        Category::factory()->create([
            'user_id'       => 1,
            'title'         => 'Kunst',
            'slug'          => 'kunst',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
