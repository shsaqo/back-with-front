<?php

namespace App\Http\Controllers;

use App\Models\HomeSpecial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeSpecialController extends Controller
{

    public function index(Request $request)
    {
        if (isset($request->search)) {
            $items = HomeSpecial::where('trello', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $items = HomeSpecial::all();
        }
        return view('admin.home.special.index', compact('items'));
    }


    public function create()
    {
        abort(404);
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'image' => 'required_without_all:youtube|image',
            'photo_mobile' => 'required_without_all:youtube|image',
            'order_by' => 'integer|nullable',
            'trello' => 'max:250|string|required',
            'price' => 'integer|required',
            'sale' => 'integer|required',
            'youtube' => 'required_without_all:image|string|nullable',
            'youtube_image' => 'required_without_all:image|image',
            'youtube_photo_mobile' => 'required_without_all:image|image',
            'type' => 'integer|required'
        ]);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        if($request->hasFile('photo') && $request->hasFile('youtube_photo')) {
            return back()->withErrors(['error' => 'only one should be filled in youtube or photo']);
        }

        if ($request->hasFile('youtube_image') && !isset($request->youtube) || !$request->hasFile('youtube_image') && isset($request->youtube)){
            return back()->withErrors(['error' => 'youtube and youtube-photo these fields are complemented']);
        }

        HomeSpecial::saveSpecial($request);
        return back()->with('ok', 'Հատուկ առաջարկը ստեղծված է');
    }


    public function show(HomeSpecial $homeSpecial)
    {
        abort(404);
    }


    public function edit(HomeSpecial $homeSpecial)
    {
        $item = $homeSpecial;
        return view('admin.home.special.edit', compact('item'));
    }


    public function update(Request $request, HomeSpecial $homeSpecial)
    {
        $validation = Validator::make($request->all(),[
            'image' => 'image',
            'order_by' => 'integer|nullable',
            'trello' => 'max:250|string|required',
            'price' => 'integer|required',
            'sale' => 'integer|required',
            'youtube' => 'string|nullable',
            'youtube_image' => 'image',
            'type' => 'integer|required'
        ]);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        if($request->hasFile('image') && $request->hasFile('youtube_image')) {
            return back()->withErrors(['error' => 'only one should be filled in youtube or photo']);
        }
         if ($request->hasFile('youtube_image') && !isset($request->youtube) && $homeSpecial->youtube == null ||
             !$request->hasFile('youtube_image') && isset($request->youtube) && $homeSpecial->youtube_photo == null ||
             !$request->hasFile('youtube_photo_mobile') && isset($request->youtube) && $homeSpecial->youtube_photo_mob == null)
         {
             return back()->withErrors(['error' => 'youtube and youtube-photo these fields are complemented']);
         }

        HomeSpecial::updateSpecial($request, $homeSpecial);
        return redirect()->route('home-special.index')->with('ok', 'Հատուկ առաջարկը խմբագրվել է');
    }


    public function destroy(HomeSpecial $homeSpecial)
    {
        if (isset($homeSpecial->photo)) {
            File::delete(public_path('images/'.$homeSpecial->photo));
        }
        if (isset($homeSpecial->youtube_photo)) {
            File::delete(public_path('images/'.$homeSpecial->youtube_photo));
        }
        $homeSpecial->delete();
        return back()->with('ok', 'Հատուկ առաջարկը հեռացված է');
    }

    public function frontSpecial(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'offset' => 'required',
            'limit' => 'required',
            'type' => 'in:1,8,16,24'
        ]);

        if($validation->fails()){
            return response()->json(['status' => 400, 'error' => $validation->getMessageBag()], 400);
        }
        if($request->type) {
            $res = HomeSpecial::where('type', $request->type)->orderByRaw('ISNULL(order_by), order_by ASC')->offset($request->offset)->limit($request->limit)->get();

        } else {
            $res = HomeSpecial::all();

        }
        return response()->json(['status' => 200, 'data' => !$request->type ? $res->sortBy(function ($v) {
            if ($v['order_by'] == null) {
                return PHP_INT_MAX;
            }
            return $v['order_by'];
        })
            ->groupBy('type')
            : $res], 200);
    }
}
