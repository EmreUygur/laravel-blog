<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'excerpt', 'slug', 'body'];

    public function tags () {
        return $this->belongsToMany(Tag::class);
    }
}
