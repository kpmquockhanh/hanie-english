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
 */
class Score extends Model
{
    protected $fillable = [
        'user_id',
        'lesson_id',
        'score',
        'note'
    ];
}
