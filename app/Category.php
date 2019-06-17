<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 *
 * @property integer $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Category extends Model
{
    protected $fillable = [
        'name',
        'created_by'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
