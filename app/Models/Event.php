<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Morilog\Jalali\Jalalian;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    use JalaliDateTrait;

    protected $fillable = [
        'user_id',
        'date',
        'importance',
        'description',
        'origin',
        'title',
    ];

    const IMPORTANCE = [
        0 => 'کم',
        1 => 'متوسط',
        2 => 'مهم',
        3 => 'خیلی مهم',
    ];
    const ORIGIN_USER = 1;
    const ORIGIN_CEREMONY = 2;
    const ORIGIN_ANNIVERSARY = 3;

    public function getImportanceTextAttribute()
    {
        return self::IMPORTANCE[$this->importance];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getjalaliDate()
    {
        return Jalalian::fromDateTime($this->date);
    }
}
