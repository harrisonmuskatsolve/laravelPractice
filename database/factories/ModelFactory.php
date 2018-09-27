<?php

use Faker\Generator as Faker;
use App\User;
use App\Post;
use App\Comment;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'title' => $faker->sentence(6, true),
        'body' => $faker->paragraph(3, true),
        'created_at' => $faker->dateTimeBetween('-1 year', 'now')
    ];
});

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'post_id' => function() {
            return factory(Post::class)->create()->id;
        },
        'body' => $faker->paragraph(2, true)
    ];
});
