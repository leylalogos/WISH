<?php

namespace App\Models;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'user_id', 'username', 'source', 'source_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    const STATE_TO_INVITE = 1;
    const STATE_FOLLOWED = 2;
    const STATE_TO_REACT = 3;
    const STATE_SKIPPED = 4;

    public function getStateAttribute()
    {
        if (!$this->hasAccount()) {
            return self::STATE_TO_INVITE;
        }
        if ($this->isFollowed()) {
            return self::STATE_FOLLOWED;
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
    public function isFollowed()
    {
        $contactUserId = $this->getAccount()->user_id;
        return Connection::hasConnection(Auth::id(), $contactUserId);
    }

    /**
     * is skipped or follwed account
     */
    public function isReacted()
    {
        return !is_null($this->reaction) && (Carbon::create($this->reaction)->floatDiffInYears(now()) < 1);
    }
}
