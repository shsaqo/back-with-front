<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoShortDescriptionList extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'info_short_description', 'info_short_description_photo', 'info_short_description_type', 'info_short_description_text'
    ];

    public function shortDescription()
    {
        return $this->belongsTo(Product::class);
    }
}
