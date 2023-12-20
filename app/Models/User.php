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
        return $this->belongsToMany(User::class, 'connections', 'followed_id', 'following_id')->where('deleted_at', null);
    }

    public function followingUsers()
    {
        return $this->belongsToMany(User::class, 'connections', 'following_id', 'followed_id')->where('deleted_at', null);
    }
    public function anniversaries()
    {
        return $this->hasMany(Anniversary::class);
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function followedByRequestedUsers()
    {
        return $this->followedByUsers()->where('is_confirmed', false);

    }
    public function followedByConfirmedUsers()
    {
        return $this->followedByUsers()->where('is_confirmed', true);

    }
    public function followingRequestedUsers()
    {
        return $this->followingUsers()->where('is_confirmed', false);
    }
    public function followingConfirmedUsers()
    {
        return $this->followingUsers()->where('is_confirmed', true);

    }
    public function myFriends()
    {
        $set1 = $this->followedByConfirmedUsers;
        $set2 = $this->followingConfirmedUsers;

        $pluckedSet2Ids = $set2->pluck('id')->all();
        return $set1->whereIn('id', $pluckedSet2Ids);

    }

    public function follow($followed_id, $created_by, $nickname = null)
    {
        $reverse = Connection::where('followed_id', $this->id)->where('following_id', $followed_id)->first();
        $is_confirmed = false;
        if ($reverse != null) {
            $reverse->is_confirmed = true;
            $reverse->save();
            $is_confirmed = true;
        }
        Connection::create([
            'following_id' => $this->id,
            'followed_id' => $followed_id,
            'created_by' => $created_by,
            'nickname' => $nickname,
            'is_confirmed' => $is_confirmed,
        ]);
    }

    public function unfollow($followed_id)
    {
        Connection::where('following_id', $this->id)->where('followed_id', $followed_id)->delete();
    }

}
