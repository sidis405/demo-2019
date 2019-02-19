<?php

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(Category::class, 10)->create();

        $tags = factory(Tag::class, 30)->create();

        // 10 utenti
        User::create([
            'name' => 'Sid',
            'email' => 'forge405@gmail.com',
            'password' => bcrypt('sapiens'),
            'role' => 'admin',
        ]);

        $users = factory(User::class, 10)->create();

        // per ogni utente 15 post
        foreach ($users as $user) {
            $posts = factory(Post::class, 15)->create([
                'user_id' => $user->id,
                // post con categoria random fra quelle esistenti
                'category_id' => $categories->random()->id,
            ]);

            // per ogni post assegnare 3 tag random
            foreach ($posts as $post) {
                $post->tags()->sync($tags->random(3));
            }
        }
    }
}
