<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    protected static function boot()
    {
        parent::boot();
        self::created(function ($model) {
            self::recordCreated($model);
        });
        self::updated(function ($model) {
            self::recordUpdated($model);
        });
        self::deleted(function ($model) {
            self::recordDelete($model);
        });
    }

    protected static function recordCreated($model) {
        History::makeHistory($model, 'create');
    }

    protected static function recordUpdated($model) {
        History::makeHistory($model, 'update');
    }

    protected static function recordDelete($model) {
        History::makeHistory($model, 'delete');
    }

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

    public function examination()
    {
        return $this->hasOne(Examination::class, 'lesson_id');
    }

    public function score()
    {
        return $this->hasOne(Score::class);
    }

    public function getCountAttribute()
    {
        if (Auth::guard('user')->check()) {
            $userLesson = UserLesson::getByUserAndLesson(Auth::guard('user')->id(), $this->id)
                ->first();
            if (!$userLesson) {
                return 0;
            }
            return $userLesson->count;
        }
        return 0;
    }
}
