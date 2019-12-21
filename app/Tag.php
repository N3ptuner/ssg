<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function products()
    {
        return $this->belongsToMany(Product::class, "tagmaps", "tag_id", "product_id");
    }

}
