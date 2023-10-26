<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'birthday',
        'phone_number',
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
    public function wishLists()
    {
        return $this->hasMany(WishList::class);
    }
    public function getInstagramAttribute()
    {
        return $this->accounts()->where('provider', 'instagram')->first()?->username;
    }

    public function getFacebookAttribute()
    {
        return $this->accounts()->where('provider', 'facebook')->first()?->username;
    }

    public function getTwitterAttribute()
    {
        return $this->accounts()->where('provider', 'twitter')->first()?->username;
    }

    public function generateUsername($email)
    {
        $firstpart = explode('@', $email)[0];
        if (User::where('username', $firstpart)->first() == null) {
            $this->username = $firstpart;
        } else {
            $this->username = $firstpart . '-' . Str::random(4);
        }
    }

    public function getAvatarAttribute()
    {
        return $this->accounts()->first()->avatar;
    }

    public function followedByUsers()
    {
        return $this->belongsToMany(User::class, 'connections', 'followed_id', 'following_id');
    }

    public function followingUsers()
    {
        return $this->belongsToMany(User::class, 'connections', 'following_id', 'followed_id');
    }
}
