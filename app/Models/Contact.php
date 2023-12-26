<?php

namespace App\Models;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'user_id', 'username', 'source', 'source_id'];

    public static function boot()
    {
        parent::boot();
        self::saved(function ($model) {
            Cache::forget(USER::CACHE_KEY_SUGGESTION . $model->user_id);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reacted()
    {
        $this->reaction = now();
        $this->save();
    }

    const STATE_TO_INVITE = 1;
    const STATE_FOLLOWED = 2;
    const STATE_TO_REACT = 3;
    const STATE_SKIPPED = 4;
    const STATE_FOLLOWED_AWAITE = 5;

    public function getStateAttribute()
    {
        if (!$this->hasAccount()) {
            return self::STATE_TO_INVITE;
        }
        $followedState = $this->checkConnectionState();
        if ($followedState) {
            return $followedState;
        }
        if ($this->isReacted()) {
            return self::STATE_SKIPPED;
        }
        return self::STATE_TO_REACT;
    }

    public function hasAccount()
    {
        return !is_null($this->getAccount());
    }

    public function getAccount()
    {
        return Account::where('provider', $this->source)
            ->where('provider_id', $this->source_id)->first();
    }

    public function getContactAppUser()
    {
        return User::where('id', $this->getAccount()->user_id)->first();
    }
    public function checkConnectionState()
    {
        $contactUserId = $this->getAccount()->user_id;
        $connection = Connection::getConnectionBetween(Auth::id(), $contactUserId);
        if (is_null($connection)) {
            return false;
        }
        if ($connection->is_confirmed) {
            return self::STATE_FOLLOWED;
        }
        return self::STATE_FOLLOWED_AWAITE;
    }

    /**
     * is skipped or follwed account
     */
    public function isReacted()
    {
        return !is_null($this->reaction) && (Carbon::create($this->reaction)->floatDiffInYears(now()) < 1);
    }
}
