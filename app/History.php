<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class History
 * @package App
 * @property integer $admin_id
 * @property string $action
 * @property string $table
 * @property integer $referent_id
 * @property Carbon $created_at
 * @property Carbon $deleted_at
 */
class History extends Model
{
    protected $fillable = [
        'admin_id',
        'action',
        'table',
        'referent_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public static function makeHistory(Model $model, $action) {
        self::query()->create([
           'admin_id' => Auth::guard('admin')->id() ?? 1,
           'action' => $action,
           'table' => $model->getTable(),
           'referent_id' => $model->id,
        ]);
    }

}
