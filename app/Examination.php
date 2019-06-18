<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    protected $fillable = [
        'lesson_id',
        'question_ids',
        'created_by'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
