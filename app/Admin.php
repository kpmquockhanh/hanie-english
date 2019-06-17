<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Admin
 * @package App
 * @property integer $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $avatar
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'avatar'
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

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'created_by');
    }

    public function phones()
    {
        return $this->hasMany(Phone::class, 'created_by');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'created_by');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'created_by');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'created_by');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'created_by');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'created_by');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'created_by');
    }

    public function examinations()
    {
        return $this->hasMany(Examination::class, 'created_by');
    }
}
