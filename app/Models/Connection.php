<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Connection extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'followed_id',
        'following_id',
        'created_by',
        'nickname',
        'is_confirmed',
    ];

    public static function boot()
    {
        parent::boot();
        self::saved(function ($model) {
            Cache::forget(USER::CACHE_KEY_SUGGESTION . $model->followed_id);
            Cache::forget(USER::CACHE_KEY_SUGGESTION . $model->following_id);
        });
    }

    /**
     *
     * @return Connection|null
     */
    public static function getConnectionBetween($following_id, $followed_id)
    {
        return self::where('followed_id', $followed_id)->where('following_id', $following_id)->first();
    }

}
