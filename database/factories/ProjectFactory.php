<?php

use Faker\Generator as Faker;


$factory->define(App\Project::class, function (Faker $faker) {
    $date_time = $faker->date.' '.$faker->time;
    return [
        'name'=>$faker->name(),
        'content_md'=>$faker->text(),
        'created_at'=>$date_time,
        'updated_at'=>$date_time,
    ];
});
