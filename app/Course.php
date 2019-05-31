<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * @package App
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];
}
