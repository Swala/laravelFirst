<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {

    return [
        //creates 5 entries to DB
        'title' => substr($faker->sentence(2), 0, -1),

        'url' => $faker->url,

        'description' => $faker->paragraph,

    ];

});
