<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoLongDescriptionList extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'info_long_description', 'info_long_description_photo', 'info_long_description_type', 'info_long_description_text'
    ];

    public function longDescription()
    {
        return $this->belongsTo(Product::class);
    }
}
