<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserCourse
 * @package App
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $course_id
 * @property integer $study_times
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class UserCourse extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'study_times'
    ];
}
