<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function child_comments()
    {
        return $this->morphMany(Comment::class, 'parent');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'id');
    }

    protected $fillable=[
      'created_at', 'updated_at', 'title', 'content_md', 'creator_id', 'post_type', 'project_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post)
        {
            $post->child_comments()->delete();
            //echo 'post is deleting';
           $comments = Comment::where('parent_type', 'App\Post')
                    ->where('parent_id', $post->id)
                    ->get();
//           $comment = $comments[0];
//           $comment->delete();


            foreach($comments as $comment)
           {
               $comment->delete();

           }
        });

    }
}
