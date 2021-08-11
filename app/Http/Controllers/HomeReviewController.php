<?php

namespace App\Http\Controllers;

use App\Models\HomeReview;
use App\Models\HomeReviewFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeReviewController extends Controller
{

    public function index(Request $request)
    {
        if (isset($request->search)) {
            $items = HomeReview::where('message', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $items = HomeReview::all();
        }

        return view('admin.home.review.index', compact('items'));
    }


    public function create()
    {
        abort(404);
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'user_photo' => 'required|image',
            'name' => 'required|max:50',
            'youtube' => 'string|max:250|nullable',
            'message' => 'string|max:1000|nullable',
            'star' => 'between:0,5',
            'file' => 'array|nullable',
            'file.*' => 'image'
        ]);

        if($validation->fails()){
            return back()->withErrors($validation->getMessageBag());
        }

        if ($request->hasFile('user_photo')) {
            $userPhoto = $request->file('user_photo')->store('home-slider');
            $review = HomeReview::create($request->except('user_photo') + ['user_photo' => $userPhoto]);
        } else {
            $review = HomeReview::create($request->all());
        }

        if(isset($request->file) && count($request->file) && isset($review)) {
            foreach ($request->file as $file) {
                $review->file()->create([
                    'file' => $file->store('home-slider')
                ]);
            }
        }
        return back()->with('ok', 'Մեկնաբանությունը ստեղծվել է');
    }


    public function show(HomeReview $homeReview)
    {
        abort(404);
    }


    public function edit(HomeReview $homeReview)
    {
        $item = $homeReview;
        return view('admin.home.review.edit', compact('item'));
    }


    public function update(Request $request, HomeReview $homeReview)
    {
        $validation = Validator::make($request->all(),[
            'user_photo' => 'image',
            'name' => 'required|max:50',
            'youtube' => 'string|max:250|nullable',
            'message' => 'string|max:1000|nullable',
            'star' => 'between:0,5',
            'file' => 'array|nullable',
            'file.*' => 'image'
        ]);

        if($validation->fails()){
            return back()->withErrors($validation->getMessageBag());
        }

        if ($request->hasFile('user_photo')) {
            $userPhoto = $request->file('user_photo')->store('home-slider');
            $homeReview->update($request->except('user_photo') + ['user_photo' => $userPhoto]);
        } else {
            $homeReview->update($request->all());
        }
        if (isset($request->file) && count($request->file)) {
            foreach ($request->file as $file) {
                $homeReview->file()->create(['file' => $file->store('home-slider')]);
            }
        }
        return redirect()->route('home-review.index')->with('ok', 'Մեկնաբանությունը խմբագրվել է');
    }


    public function destroy(HomeReview $homeReview)
    {
        if ($homeReview->user_photo) {
            File::delete(public_path('images/'.$homeReview->user_photo));
        }
        $homeReview->delete();
        return back()->with('ok', 'Մեկնաբանությունը հեռացված է');
    }

    public function frontHomeReview(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'offset' => 'required',
            'limit' => 'required',
        ]);

        if($validation->fails()){
            return response()->json(['status' => 400, 'error' => $validation->getMessageBag()], 400);
        }

        $res = HomeReview::with('file')->offset($request->offset)->limit($request->limit)->get();
        return response()->json(['status' => 200, 'data' => $res], 200);
    }
}
