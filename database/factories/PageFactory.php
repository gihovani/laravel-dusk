<?php

use Faker\Generator as Faker;

$factory->define(App\Page::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->name,
        'body' => $faker->text
    ];
});
