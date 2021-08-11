<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class HomeSliderItem extends Model
{
    use HasFactory;
    protected $fillable = ['trello', 'photo', 'photo_mobile', 'order_by', 'buy_status'];

    public static function photo (Request $request)
    {
        $data = array();
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('home-slider');
        }
        if ($request->hasFile('photo_mobile')) {
            $data['photo_mobile'] = $request->file('photo_mobile')->store('home-slider');
        }
        return $data;
    }
}
