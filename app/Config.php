<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Config
 * @package App
 *
 * @property integer $id
 * @property string $type
 * @property boolean $show
 * @property string $name
 * @property string $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Config extends Model
{
    protected $fillable = [
        'type', 'show', 'name', 'content',
    ];
}
