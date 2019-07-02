<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Video
 * @package App
 *
 * @property integer $id
 * @property string $title
 * @property string $original_name
 * @property string $disk
 * @property string $path
 * @property Carbon $converted_for_download_at
 * @property Carbon $converted_for_stream_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Video extends Model
{
    protected $fillable = [
        'title',
        'original_name',
        'disk',
        'path',
        'converted_for_download_at',
        'converted_for_stream_at',
        'lesson_id'
    ];

    public function lesson()
    {
        return $this->hasOne('App\Lesson');
    }

    public function getUrlPathAttribute()
    {
        $url = env('AWS_URL');
        return "$url/$this->disk/$this->path";
    }
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
}
