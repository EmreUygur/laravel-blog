<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public $timestamps = false;
    protected $fillable = ['school_name', 'department_name', 'gpa', 'note', 'started_at', 'finished_at'];
}
