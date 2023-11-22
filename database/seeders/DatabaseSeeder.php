<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\PostKategori;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        Post::factory(10)->create();
        Kategori::factory(5)->create();
        Comment::factory(100)->create();
        PostKategori::factory(20)->create();
    }
}
