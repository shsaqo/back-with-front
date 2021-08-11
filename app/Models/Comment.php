<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name', 'user_photo', 'comment_text', 'comment_video', 'comment_type', 'like', 'comment_time'
    ];

    public function comment()
    {
        return $this->belongsTo(Product::class);
    }
}
