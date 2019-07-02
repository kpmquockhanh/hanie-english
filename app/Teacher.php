<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Teacher
 * @package App
 *
 * @property integer $id
 * @property string $name
 * @property string $word
 * @property string $position
 * @property string $image
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Teacher extends Model
{
    protected $fillable = [
        'name',
        'word',
        'position',
        'image',
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
    public function getUrlImageAttribute()
    {
        $url = env('AWS_URL');
        return "$url/$this->image";
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
