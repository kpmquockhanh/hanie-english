<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLesson extends Model
{
    protected $fillable = [
        'user_id',
        'lesson_id',
    ];

    public static function getByUserAndLesson($user_id, $lesson_id)
    {
        return self::query()->where('user_id', $user_id)
            ->where('lesson_id', $lesson_id);
    }
}
