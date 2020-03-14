<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advisory extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'checked' // Determine it is checked or not confirm by admin
    ];
}
