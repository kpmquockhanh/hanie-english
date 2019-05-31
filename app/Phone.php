<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phone
 * @package App
 *
 * @property integer $id
 * @property string $name
 * @property string $phone_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Phone extends Model
{
    protected $fillable = [
        'name', 'phone_number'
    ];
}
