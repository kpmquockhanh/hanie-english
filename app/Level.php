<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'title',
        'image',
        'lesson_number',
        'duration_by_week',
        'desc'
    ];
    protected $table = 'config_levels';
    public function getUrlImageAttribute () {
        $url = env('AWS_URL');
        return "$url/$this->image";
    }
}
