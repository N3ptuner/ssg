<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function project()
    {
        return $this->belongsTo(Project::class, 'id');
    }
    protected $fillable=[
        'introduction', 'cover', 'files', 'name', 'classification', 'release_status'
    ];
}
