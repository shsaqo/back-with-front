<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HomeProduct extends Model
{
    use HasFactory;

    protected $fillable = ['trello', 'name', 'price', 'old_price', 'sale', 'status', 'order_by', 'photo', 'youtube'];

    public static function saveProduct(Request $request)
    {
        self::old_price($request);
        $filePath = $request->file('photo')->store('product-photo');
        $product = HomeProduct::create($request->except('photo') + ['photo' => $filePath]);
        if (isset($request->slider) && count($request->slider)) {
            foreach ($request->slider as $slider) {
                $product->slider()->create(['photo' => $slider->store('product-photo')]);
            }
        }
        if (isset($request->description) && count($request->description)) {
            $descriptions = [];
            foreach ($request->description as $description) {
                array_push($descriptions,['description' => $description]);
            }
            $product->description()->createMany($descriptions);
        }
        return $product;
    }

    public static function updateProduct(Request $request, $product)
    {
        self::old_price($request);
        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('product-photo');
            $product->update($request->except('photo') + ['photo' => $filePath]);
        } else {
            $product->update($request->except('photo'));
        }
        if (isset($request->slider) && count($request->slider)) {
            foreach ($request->slider as $slider) {
                $product->slider()->create(['photo' => $slider->store('product-photo')]);
            }
        }

        if (isset($request->description) && count($request->description)) {
            $descriptions = [];
            $product->description()->delete();
            foreach ($request->description as $description) {
                if ($description) {
                    array_push($descriptions,['description' => $description]);
                }
            }
            $product->description()->createMany($descriptions);
        }
        return 'success';
    }

    public static function old_price(Request $request): void
    {
        $old_price = $request->price * 100 / (100 - $request->sale);
        $request->request->add(['old_price' => $old_price]);
    }
    public function slider()
    {
        return $this->hasMany(HomeProductSlider::class);
    }

    public function description()
    {
        return $this->hasMany(HomeProductDescription::class);
    }
}
