<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationProgram extends Model
{
    protected $fillable = [
        'title',
        'content'
    ];
}
