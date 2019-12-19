<?php

use Illuminate\Database\Seeder;

class DevelopJamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $creator_id = range(1,101);
        $classification = ['game', 'music', 'picture', 'tool'];


        $faker = app(Faker\Generator::class);

        $developjams = factory(\App\DevelopJam::class)
            ->times(100)
            ->make()
            ->each(function ($developjam) use ($faker, $creator_id, $classification){
                $developjam->creator_id = $faker->randomElement($creator_id);
                $developjam->classification = $faker->randomElement($classification);

            });
        \App\DevelopJam::insert($developjams->toArray());
    }
}
