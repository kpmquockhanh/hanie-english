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
        'wrong_answer_ids'
    ];

    public function rightAnswer()
    {
        return $this->belongsTo(Answer::class, 'right_answer_id');
    }

    public function wrongAnswers()
    {
        return $this->belongsToMany(Answer::class);
    }

}
