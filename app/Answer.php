<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 * @package App
 * @property integer $id
 * @property string $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Answer extends Model
{
    protected $fillable = [
        'content',
        'created_by'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
