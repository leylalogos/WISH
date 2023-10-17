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
        'email',
        'avatar',
        'username',
        'birthday',
        'phone_number',
    ];

    public function social_networks()
    {
        return $this->hasMany(SocialNetwork::class);
    }
    public function wishLists()
    {
        return $this->hasMany(WishList::class);
    }
    public function getInstagramAttribute()
    {
        return $this->social_networks()->where('platform', 'instagram')->first()?->username;
    }

    public function getFacebookAttribute()
    {
        return $this->social_networks()->where('platform', 'facebook')->first()?->username;
    }

    public function getTwitterAttribute()
    {
        return $this->social_networks()->where('platform', 'twitter')->first()?->username;
    }

    public function generateUsername()
    {
        $email = $this->email;
        $firstpart = explode('@', $email)[0];
        if (User::where('username', $firstpart)->first() == null) {
            $this->username = $firstpart;
        } else {
            $this->username = $firstpart . '-' . Str::random(4);
        }
    }

}
