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
        'name', 'word', 'position', 'image'
    ];
}
