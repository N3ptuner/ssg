<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public function parent()
    {
        return $this->morphTo();
    }
    public function child_comments()
    {
        return $this->morphMany(Comment::class, 'parent', 'parent_type', 'parent_id');
    }
//    public function post()
//    {
//        return $this->belongsTo(Post::class);
//    }
//    public function comments()
//    {
//        return $this->hasMany(Comment::class,'parent_id');
//    }

//    public function comment_child()
//    {
//        return $this->
//    }
    protected $fillable = [
        'created_at', 'updated_at', 'content_md', 'parent_type',
        'parent_id', 'level',
    ];


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($comment)
        {
            $comment->child_comments()->delete();
//            $child_comments = Comment::where('parent_type', 'comment')
//                ->where('parent_id', $comment->id)
//                ->get();
//
//            foreach($child_comments as $comment)
//            {
//                $comment->delete();
//            }
        });
    }

}
