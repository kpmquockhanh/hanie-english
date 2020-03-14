<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * @package App
 *
 * @property integer $id
 * @property string $content
 * @property string $explain
 * @property integer $right_answer_id
 * @property string $wrong_answer_ids
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Question extends Model
{
    protected $fillable = [
        'content',
        'explain',
        'right_answer_id',
        'wrong_answer_ids',
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

    public function rightAnswer()
    {
        return $this->belongsTo(Answer::class, 'right_answer_id');
    }

    public function wrongAnswers()
    {
        return $this->belongsToMany(Answer::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'question_categories');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
}
