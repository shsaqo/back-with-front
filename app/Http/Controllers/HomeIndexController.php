<?php

namespace App\Http\Controllers;

use App\Models\HomeProduct;
use App\Models\HomeReview;
use App\Models\HomeSlider;
use App\Models\HomeSpecial;
use Illuminate\Http\Request;
use App\Models\HomePageStatus;
use Illuminate\Support\Facades\Validator;

class HomeIndexController extends Controller
{
    public function index(Request $request)
    {
        if(!HomePageStatus::first() || HomePageStatus::first()->status == 0) {
            return view('empty');
        }
        $spec = [];

        $sliders = HomeSlider::with(['sliderItem' => function ($q) use($request) {
            $q->orderByRaw('ISNULL(order_by), order_by ASC');
        }])->get();

        $products = HomeProduct::with('slider')->where('status', 1)->orderByRaw('ISNULL(order_by), order_by ASC')->get();
        $spec['type_1'] = HomeSpecial::where('type', 1)->get();
        $spec['type_8'] = HomeSpecial::where('type', 8)->get();
        $spec['type_16'] = HomeSpecial::where('type', 16)->get();
        $spec['type_24'] = HomeSpecial::where('type', 24)->get();
        $reviews = HomeReview::with('file')->get();
        return view('main', compact('sliders', 'products', 'spec', 'reviews'));
    }
}
