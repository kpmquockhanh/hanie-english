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

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
