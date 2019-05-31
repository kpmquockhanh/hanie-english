<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionCategory
 * @package App
 *
 * @property string $id
 * @property integer $question_id
 * @property integer $category_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class QuestionCategory extends Model
{
    protected $fillable = [
        'question_id',
        'category_id',
    ];
}
