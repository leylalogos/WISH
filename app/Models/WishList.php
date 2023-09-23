<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'url',
        'priority',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    const PRIORITIES = [
        0 => 'کم',
        1 => 'متوسط',
        2 => 'مهم',
        3 => 'خیلی مهم',
    ];
    public function getPriorityTextAttribute()
    {
        return self::PRIORITIES[$this->priority];
    }
}
