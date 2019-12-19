<?php

use Faker\Generator as Faker;

$factory->define(\App\DevelopJam::class, function (Faker $faker) {
    $date_time = $faker->date().' '.$faker->time();
    $start = $faker->date().' '.$faker->time();
    $end = $faker->date().' '.$faker->time();
    return [
        'created_at' => $date_time,
        'updated_at' => $date_time,
        'name' => $faker->name(),
        'begin' => $start,
        'end' => $end,
        'content_md' => $faker->text(),

    ];
});
