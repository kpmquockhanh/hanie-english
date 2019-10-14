<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigTestLinks extends Model
{
    protected $fillable = [
        'label',
        'link'
    ];
}
