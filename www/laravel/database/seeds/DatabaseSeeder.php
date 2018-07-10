<?php

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
        $faker = \Faker\Factory::create();

        $user = new \App\User();
        $user->name = $faker->name;
        $user->email = $faker->unique()->safeEmail;
        $user->password = bcrypt('password');
        $user->remember_token = str_random(10);
        $user->save();

        $article = new \App\Article();
        $article->user_id = $user->id;
        $article->title = 'test';
        $article->content = $faker->text();
        $article->save();
    }
}
