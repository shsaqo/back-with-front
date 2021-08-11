<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HomeSpecial extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'old_price', 'sale', 'type', 'order_by', 'trello', 'youtube', 'youtube_photo', 'photo', 'photo_mob', 'youtube_photo_mob'];

    public static function saveSpecial(Request $request)
    {
        self::old_price($request);
        if ($request->hasFile('photo')) {
            self::photo($request);
            HomeSpecial::create($request->all());
        } else {
            self::photo($request);
            HomeSpecial::create($request->all());
        }
    }

    public static function updateSpecial(Request $request, $homeSpecial)
    {
        self::old_price($request);
        if ($request->hasFile('image') || $request->hasFile('photo_mobile')) {
            self::photo($request);
            $request->merge(['youtube_photo' => null, 'youtube_photo_mob' => null, 'youtube' => null]);
            $homeSpecial->update($request->all());
        } elseif ($request->hasFile('youtube_image') || $request->hasFile('youtube_photo_mobile')) {
            self::photo($request);
            $request->merge(['photo' => null, 'photo_mob' => null]);
            $homeSpecial->update($request->all());
        } else {
            $homeSpecial->update($request->all());
        }
    }

    public static function old_price(Request $request): void
    {
        $old_price = $request->price * 100 / (100 - $request->sale);
        $request->request->add(['old_price' => $old_price]);
    }

    public static function photo (Request $request)
    {
        if ($request->hasFile('photo_mobile')) {
            $request->request->add(['photo_mob' => $request->file('photo_mobile')->store('product-photo')]);
        }

        if ($request->hasFile('youtube_photo_mobile')) {
            $request->request->add(['youtube_photo_mob' => $request->file('youtube_photo_mobile')->store('product-photo')]);
        }

        if ($request->hasFile('image')) {
            $request->request->add(['photo' => $request->file('image')->store('product-photo')]);
        }

        if ($request->hasFile('youtube_image')) {
            $request->request->add(['youtube_photo' => $request->file('youtube_image')->store('product-photo')]);
        }
    }


}
