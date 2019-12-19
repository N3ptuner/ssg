<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public function projects()
    {
        return $this->hasMany(Project::class, 'template_id');
    }
}
