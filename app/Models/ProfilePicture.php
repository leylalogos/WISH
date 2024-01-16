<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'mime', 'file_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
