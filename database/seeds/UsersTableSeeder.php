<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
           'username'=>'N3ptuner',
           'email'=>'email@qq.com',
           'password'=>bcrypt('111111'),
           'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        $faker = app(Faker\Generator::class);

        $users = factory(User::class)
                ->times(100)
                ->make()
                ->each(function ($user) use($faker) {

                });

        User::insert($users->toArray());

    }
}
