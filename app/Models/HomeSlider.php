<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;
    protected $fillable = ['status'];

    public function sliderItem()
    {
        return $this->hasMany(HomeSliderItem::class);
    }

}
