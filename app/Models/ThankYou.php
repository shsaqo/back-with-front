<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThankYou extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'old_price', 'sale', 'photo', 'description', 'attached', 'trello'];
    protected $casts = [
        'description' => 'array',
        'attached' => 'array'
    ];
}
