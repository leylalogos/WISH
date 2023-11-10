<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anniversary extends Model
{
    use HasFactory;
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
}
