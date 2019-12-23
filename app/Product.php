<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class, "tagmaps", "product_id", "tag_id");
    }

    public function add_tag(Tag $tag)
    {
        $this->tags()->sync($tag->id,false);
    }

    public function remove_tag(Tag $tag)
    {
        $this->tags()->detach($tag->id);
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'id');
    }
    protected $fillable=[
        'tag_list','introduction', 'cover', 'files', 'name', 'classification', 'release_status'
    ];
}
