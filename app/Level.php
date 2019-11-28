<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'title',
        'image',
        'config_test_link_id',
        'lesson_number',
        'duration_by_week',
        'desc',
        'created_by'
    ];
    protected $table = 'config_levels';
    public function getUrlImageAttribute () {
        $url = env('AWS_URL');
        return "$url/$this->image";
    }

    public function testLink() {
        return $this->hasOne(ConfigTestLinks::class, 'id', 'config_test_link_id');
    }
}
