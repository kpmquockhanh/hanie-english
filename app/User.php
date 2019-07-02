<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 *
 * @property integer $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $avatar
 * @property boolean $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'avatar', 'status', 'created_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private $statusName = [
        'Deactivate',
        'Active',
    ];
    public function getStatusNameAttribute()
    {
        return array_get($this->statusName, $this->status);
    }

    public function getUrlAvatarAttribute()
    {
        if ($this->avatar) {
            $url = env('AWS_URL');
            return "$url/$this->avatar";
        }
        return null;
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
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
