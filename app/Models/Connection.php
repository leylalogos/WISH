<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;
    protected $fillable = [
        'followed_id',
        'following_id',
        'created_by',
    ];

    public static function hasConnection($followed_id, $following_id)
    {
        return (bool) self::where('followed_id', $followed_id)
            ->where('following_id', $following_id)->first();
    }
}
