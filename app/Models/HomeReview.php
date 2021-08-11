<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeReview extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_photo', 'message', 'star', 'youtube'];

    public function file()
    {
        return $this->hasMany(HomeReviewFile::class);
    }
}
