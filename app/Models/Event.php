<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'date',
        'importance',
        'description',
        'origin',
        'title',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
