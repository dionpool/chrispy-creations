<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        Project::factory()->create([
            'user_id'       => 1,
            'category_id'   => 1,
            'title'         => 'Fake Project One',
            'slug'          => 'fake-project-one',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'thumbnail'     => 'images/thumbnails/1.jpg',
            'status'        => 'published',
            'created_at'    => now(),
            'updated_at'    => now(),
            'size'          => 'big',
        ]);

        // 2
        Project::factory()->create([
            'user_id'       => 1,
            'category_id'   => 2,
            'title'         => 'Fake Project Two',
            'slug'          => 'fake-project-two',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'thumbnail'     => 'images/thumbnails/2.jpg',
            'status'        => 'published',
            'created_at'    => now(),
            'updated_at'    => now(),
            'size'          => 'small',
        ]);

        // 3
        Project::factory()->create([
            'user_id'       => 1,
            'category_id'   => 3,
            'title'         => 'Fake Project Three',
            'slug'          => 'fake-project-three',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'thumbnail'     => 'images/thumbnails/3.jpg',
            'status'        => 'published',
            'created_at'    => now(),
            'updated_at'    => now(),
            'size'          => 'small',
        ]);

        // 4
        Project::factory()->create([
            'user_id'       => 1,
            'category_id'   => 1,
            'title'         => 'Fake Project Four',
            'slug'          => 'fake-project-four',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'thumbnail'     => 'images/thumbnails/4.jpg',
            'status'        => 'published',
            'created_at'    => now(),
            'updated_at'    => now(),
            'size'          => 'small',
        ]);

        // 5
        Project::factory()->create([
            'user_id'       => 1,
            'category_id'   => 2,
            'title'         => 'Fake Project Five',
            'slug'          => 'fake-project-five',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'thumbnail'     => 'images/thumbnails/5.jpg',
            'status'        => 'published',
            'created_at'    => now(),
            'updated_at'    => now(),
            'size'          => 'big',
        ]);

        // 6
        Project::factory()->create([
            'user_id'       => 1,
            'category_id'   => 3,
            'title'         => 'Fake Project Six',
            'slug'          => 'fake-project-six',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'thumbnail'     => 'images/thumbnails/6.jpg',
            'status'        => 'published',
            'created_at'    => now(),
            'updated_at'    => now(),
            'size'          => 'small',
        ]);

        // 7
        Project::factory()->create([
            'user_id'       => 1,
            'category_id'   => 1,
            'title'         => 'Fake Project Seven',
            'slug'          => 'fake-project-seven',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'thumbnail'     => 'images/thumbnails/7.jpg',
            'status'        => 'published',
            'created_at'    => now(),
            'updated_at'    => now(),
            'size'          => 'small',
        ]);

        // 8
        Project::factory()->create([
            'user_id'       => 1,
            'category_id'   => 2,
            'title'         => 'Fake Project Eight',
            'slug'          => 'fake-project-eight',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'thumbnail'     => 'images/thumbnails/8.jpg',
            'status'        => 'published',
            'created_at'    => now(),
            'updated_at'    => now(),
            'size'          => 'small',
        ]);

        // 9
        Project::factory()->create([
            'user_id'       => 1,
            'category_id'   => 3,
            'title'         => 'Fake Project Nine',
            'slug'          => 'fake-project-nine',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'thumbnail'     => 'images/thumbnails/9.jpg',
            'status'        => 'published',
            'created_at'    => now(),
            'updated_at'    => now(),
            'size'          => 'small',
        ]);

        // 10
        Project::factory()->create([
            'user_id'       => 1,
            'category_id'   => 1,
            'title'         => 'Fake Project Ten',
            'slug'          => 'fake-project-ten',
            'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'thumbnail'     => 'images/thumbnails/10.jpg',
            'status'        => 'published',
            'created_at'    => now(),
            'updated_at'    => now(),
            'size'          => 'small',
        ]);
    }
}
