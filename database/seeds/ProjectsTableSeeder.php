<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$release_status = ['released', 'developing'];
        $visibility = ['public', 'draft'];
        $creator_id = range(1,101);
        $template_id = range(1, 100);
        //$jam_id = range(1,100).append('');

        $faker = app(Faker\Generator::class);

        $projects = factory(\App\Project::class)
                    ->times(100)
                    ->make()
                    ->each(function ($project) use ($faker, $visibility, $creator_id, $template_id) {
            $project->visibility = $faker->randomElement($visibility);
            $project->creator_id = $faker->randomElement($creator_id);
            $project->template_id = $faker->randomElement($template_id);
        });

        \App\Project::insert($projects->toArray());

        //给测试账号插入一些projects
        $projects = factory(\App\Project::class)
            ->times(10)
            ->make()
            ->each(function ($project) use ($faker, $release_status, $visibility, $creator_id, $template_id) {
                $project->visibility = $faker->randomElement($visibility);
                $project->creator_id = 1;
                $project->template_id = $faker->randomElement($template_id);
            });

        \App\Project::insert($projects->toArray());
    }
}
