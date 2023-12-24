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
        'provider_id',
        'avatar',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();
        self::saved(function ($model) {
            foreach (Contact::where('source', $this->provider)->where('source_id', $this->provider_id)->get() as $contact) {
                Cache::forget(USER::CACHE_KEY_SUGGESTION . $contact->user_id);
            }
        });
    }
}
