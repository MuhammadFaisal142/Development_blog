<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\UserFactory;
use Database\Factories\CategoryFactory;
use Database\Factories\TagFactory;
use Database\Factories\PostFactory;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
         // Register and create users
         User::factory()->count(10)->create();

         // Register and create categories
         Category::factory()->count(5)->create();

         // Register and create tags
         Tag::factory()->count(20)->create();

         // Register and create posts
         Post::factory()->count(30)->create();
           // Register and create posts

         Setting::factory()->count(1)->create();
    }
}
