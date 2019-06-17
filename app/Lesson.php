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
        'name',
        'description',
        'created_by'
    ];

    public function video()
    {
        return $this->hasOne('App\Video');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
