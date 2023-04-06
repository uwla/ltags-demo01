<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Uwla\Ltags\Models\Tag;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory(200)->create();
        $tags = Tag::all();
        $n = $tags->count();
        $m = (int) ($n / 3);
        foreach ($posts as $post)
        {
            $random_tags = $tags->random(random_int(1, $m));
            $post->addTags($random_tags);
        }
    }
}
