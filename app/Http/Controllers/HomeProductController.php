<?php

namespace App\Http\Controllers;

use App\Models\HomeProduct;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeProductController extends Controller
{

    public function index(Request $request)
    {
        if (isset($request->search)) {
            $items = HomeProduct::where('trello', 'LIKE', '%' . $request->search . '%')->orWhere('name', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $items = HomeProduct::all();
        }
        return view('admin.home.product.index', compact('items'));
    }


    public function create()
    {
        abort(404);
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'photo' => 'required|image',
            'name' => 'max:250|string|required',
            'order_by' => 'integer|nullable',
            'trello' => 'max:250|string|nullable',
            'price' => 'integer|required',
            'sale' => 'integer|required',
            'status' => 'integer',
            'youtube' => 'string|nullable',
            'slider.*' => 'image',
            'description.*' => 'max:250'
        ]);

        if($validation->fails()){
            return back()->withErrors($validation);
        }
        HomeProduct::saveProduct($request);
        return back()->with('ok', 'Ապրանքը ստեղծված է');
    }


    public function show(HomeProduct $homeProduct)
    {
        abort(404);
    }


    public function edit(HomeProduct $homeProduct)
    {
        return view('admin.home.product.edit', compact('homeProduct'));
    }


    public function update(Request $request, HomeProduct $homeProduct)
    {
        $validation = Validator::make($request->all(),[
            'photo' => 'image',
            'name' => 'max:250|string|required',
            'order_by' => 'integer|nullable',
            'trello' => 'max:250|string|nullable',
            'price' => 'integer|required',
            'sale' => 'integer|required',
            'status' => 'integer',
            'youtube' => 'string|nullable',
            'slider.*' => 'image',
            'description.*' => 'max:250'
        ]);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        HomeProduct::updateProduct($request, $homeProduct);

        return redirect()->route('home-product.index')->with('ok', 'Ապրանքը ստեղծված է');

    }


    public function destroy(HomeProduct $homeProduct)
    {
        $homeProduct->delete();
        return back()->with('ok', 'Ապրանքը հեռացվել է');
    }

    public function status(Request $request, $id)
    {
        HomeProduct::where('id', $id)->update($request->only('status'));
        return back();
    }

    public function frontProduct(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'offset' => 'required',
            'limit' => 'required',
        ]);

        if($validation->fails()){
            return response()->json(['status' => 400, 'error' => $validation->getMessageBag()], 400);
        }

        $res = HomeProduct::with('slider')->where('status', 1)->orderByRaw('ISNULL(order_by), order_by ASC')->offset($request->offset)->limit($request->limit)->get();
        return response()->json(['status' => 200, 'data' => $res], 200);
    }
}
