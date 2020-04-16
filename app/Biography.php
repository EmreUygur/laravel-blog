<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    public $timestamps = false;
    protected $fillable = ['biography'];
}
