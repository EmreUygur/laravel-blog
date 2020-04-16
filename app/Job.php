<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;
    protected $fillable = ['company', 'position', 'note', 'started_at', 'quitted_at'];
}
