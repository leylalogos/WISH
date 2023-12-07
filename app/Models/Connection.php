<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Connection extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'followed_id',
        'following_id',
        'created_by',
        'nickname',
    ];

    public static function hasConnection($followed_id, $following_id)
    {
        return (bool) self::where('followed_id', $followed_id)
            ->where('following_id', $following_id)->first();
    }
}
