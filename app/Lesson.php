<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lesson
 * @package App
 *
 * @property integer $id
 * @property integer $course_id
 * @property integer $video_id
 * @property string $name
 * @property string description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Lesson extends Model
{
    protected $fillable = [
        'course_id',
        'video_id',
        'name',
        'description'
    ];
}
