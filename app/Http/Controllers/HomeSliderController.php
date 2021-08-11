<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\HomeSliderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeSliderController extends Controller
{

    public function index(Request $request)
    {
        $items = HomeSlider::with(['sliderItem' => function ($q) use($request) {
            $q->orderBy('id', 'desc');
        }])->first();
        return view('admin.home.slider.index', compact('items'));
    }



    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'trello' => 'max:250|required_if:buy_status,==,1',
            'photo' => 'required|image',
            'photo_mobile' => 'required|image',
        ]);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $filePath = $request->file('photo')->store('home-slider');
        $filePathMob = $request->file('photo_mobile')->store('home-slider');

        if ($slider = HomeSlider::first()) {
            $res = $slider->sliderItem()->create($request->only('trello', 'order_by', 'buy_status') + ['photo' => $filePath, 'photo_mobile' => $filePathMob]);
            return back()->with('ok', 'Սլիյդերը ավելացել է');
        } else {
            $slider = new HomeSlider();
            $newSlider = $slider->create();
            $res = $newSlider->sliderItem()->create($request->only('trello', 'order_by', 'buy_status') + ['photo' => $filePath, 'photo_mobile' => $filePathMob]);
            return back()->with('ok', 'Սլիյդերը ավելացել է');
        }
    }

    public function edit($id)
    {
        $item = HomeSliderItem::where('id', $id)->first();
        return view('admin.home.slider.edit', compact('item'));
    }

    public function show(HomeSlider $homeSlider)
    {
        abort(404);
    }

    public function create(HomeSlider $homeSlider)
    {
        abort(404);
    }



    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[
            'photo' => 'image',
            'trello' => 'max:250|string|nullable',
            'order_by' => 'integer|nullable',
            'buy_status' => 'integer'
        ]);

        if($validation->fails()){
            return back()->withErrors($validation);
        }
        if ($request->hasFile('photo') || $request->hasFile('photo_mobile')) {
            HomeSliderItem::where('id', $id)->update($request->only('trello', 'order_by', 'buy_status') + HomeSliderItem::photo($request));
            return redirect()->route('slider.index')->with('ok', 'Սլիյդերը խմբագրվել է');
        } else {
            HomeSliderItem::where('id', $id)->update($request->only('trello', 'order_by', 'buy_status'));
            return redirect()->route('slider.index')->with('ok', 'Սլիյդերը խմբագրվել է');
        }
    }


    public function destroy($id)
    {
        if ($item = HomeSliderItem::where('id', $id)->first()) {
            File::delete(public_path('images/'.$item->photo));
            $item->delete();
        }

        return back()->with('ok', 'Սլայդերը հեռացվել է');
    }

    public function status (Request $request)
    {
        HomeSlider::first()->update(['status' => $request->status]);
        return back();
    }

    public function frontSlider(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'offset' => 'required',
            'limit' => 'required',
        ]);

        if($validation->fails()){
            return response()->json(['status' => 400, 'error' => $validation->getMessageBag()], 400);
        }

        $res = HomeSlider::with(['sliderItem' => function ($q) use($request) {
            $q->offset($request->offset)->limit($request->limit)->orderByRaw('ISNULL(order_by), order_by ASC');
        }])->get();
        return response()->json(['status' => 200, 'data' => $res], 200);
    }
}
