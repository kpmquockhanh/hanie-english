<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Score
 * @package App
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $lesson_id
 * @property float $score
 * @property string $note
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $started_at
 */
class Score extends Model
{
    protected $fillable = [
        'user_id',
        'lesson_id',
        'score',
        'note',
        'started_at'
    ];
    protected $dates = [
      'started_at'
    ];


    const TIME_UP = 15;

    public function getEndAtAttribute()
    {
        return $this->started_at->addMinutes(self::TIME_UP);
    }
    public function getSecondAttribute()
    {
        return $this->started_at->addMinutes(self::TIME_UP)->diffInSeconds(Carbon::now());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function isExpired()
    {
        return $this->started_at->isPast();
    }
}
