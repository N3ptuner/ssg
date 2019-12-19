<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'project_id');
    }
    public function product()
    {
        return $this->hasOne(Product::class, 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    protected $fillable = [
    'name', 'content_md', 'visibility', 'template_id', 'creator_id'
];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($project)
        {
            $project->posts()->delete();
            $project->product()->delete();

            $is_default_template = false;

            foreach ([1,2,3] as $template)
            {
                if($project->template_id == $template)
                {
                    $is_default_template = true;
                    break;
                }
            }
            if(!$is_default_template)
            {
                $project->template()->delete();
            }
        });
    }
}
