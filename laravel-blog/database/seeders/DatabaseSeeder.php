<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Post;
use \App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = collect();
        for ($i=1; $i <= 10; $i++) {
            $user = User::factory()->create([
                'email' => 'user' . $i . '@server.com'
            ]);

            $users -> add($user);
        }

        $posts = collect();
        for ($i=1; $i <= 10; $i++) {
            $post = Post::factory()->create([
                'user_id' => $users -> random()
            ]);

            $posts -> add($post);
        }

        for ($i=1; $i <= 5; $i++) {
            $tag = Tag::factory() -> create();
            // TODO: N-N kapcsolat
        }
    }
}
