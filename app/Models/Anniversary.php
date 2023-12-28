<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Morilog\Jalali\Jalalian;

class Anniversary extends Model
{
    use SoftDeletes;
    use HasFactory;
    use JalaliDateTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'anniversary_date',
        'anniversary_type',
        'importance',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'anniversary_date' => 'datetime',
    ];

    const IMPORTANCE = [
        0 => 'کم',
        1 => 'متوسط',
        2 => 'مهم',
        3 => 'خیلی مهم',
    ];
    public function getImportanceTextAttribute()
    {
        return self::IMPORTANCE[$this->importance];
    }
    const ANNIVERSARY_TYPE_NAME = [
        1 => 'تولد',
        2 => 'ازدواج',

    ];
    public function getAnniversaryTypeTextAttribute()
    {
        return self::ANNIVERSARY_TYPE_NAME[$this->anniversary_type];
    }

    public function getjalaliDate()
    {
        return Jalalian::fromDateTime($this->anniversary_date);
    }

}
