<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(10)->create();
        $posts = Post::select('id')->get();

        foreach ($posts as $post) {
            $randTags = $tags->random(rand(0, $tags->count()));
            foreach ($randTags as $randTag) {
                $randTag->posts()->attach($post);
            }
        }
    }
}
