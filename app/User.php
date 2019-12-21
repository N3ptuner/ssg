<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function comments()
    {
        return $this->hasMany(Comment::class, "creator_id");
    }

    public function follow(User $user)
    {
        $this->followings()->sync($user->id,false);
    }
    public function unfollow(User $user)
    {
        $this->followings()->detach($user->id);
    }
    public function is_following(User $user)
    {
        return $this->followings->contains($user->id);
    }


    public function followers()
    {
        return $this->belongsToMany(User::class, 'following', 'user_id', 'follower_id');
    }
    public function followings()
    {
        return $this->belongsToMany(User::class, 'following', 'follower_id', 'user_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'creator_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //password隐藏会导致seed填不进去
//    protected $hidden = [
//        'password',
//    ];

}
