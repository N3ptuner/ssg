<?php

use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    $date_time = $faker->date().' '.$faker->time();
    return [
        'created_at' => $date_time,
        'updated_at' => $date_time,
        'content' => $faker->text(),
    ];
});
