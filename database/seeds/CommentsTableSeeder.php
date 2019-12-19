<?php

use Illuminate\Database\Seeder;
use App\Comment;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reply_type = ['post', 'comment'];

        $faker = app(Faker\Generator::class);

        $comments = factory(Comment::class)
                    ->times(100)
                    ->make()
                    ->each(function ($comment) use ($faker, $reply_type){
                       $comment->reply_type = $faker->randomElement($reply_type);
                    });
        Comment::insert($comments->toArray());

    }
}
