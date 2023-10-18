<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'user_id',
        'provider',
        'last_login',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
