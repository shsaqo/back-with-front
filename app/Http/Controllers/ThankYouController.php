<?php

namespace App\Http\Controllers;

use App\Models\CodeScript;
use App\Models\Product;
use App\Models\ThankYou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use function GuzzleHttp\Promise\all;

class ThankYouController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        Product::old_price($request);
        Product::photo($request, 'image', 'photo');
        $request->request->add(['attached' => []]);
        ThankYou::create($request->all());
        return redirect()->back();
    }

    public function create(Request $request)
    {
        if(!Gate::allows('spec')) {
            auth()->logout();
            abort(403);
        }
        $items = ThankYou::where(function ($q) use ($request) {
            if(isset($request->search)) {
                $q->where('trello', 'LIKE', '%' . $request->search . '%')
                ->orWhere('name', 'LIKE', '%' . $request->search . '%');
            }
        })->paginate(20);
        $products = Product::all();
        $attacheds = ThankYou::all()->pluck('attached')->toArray();
        $update = false;
        return view('admin.thank-you.create', compact('items', 'products', 'update', 'attacheds'));
    }

    public function update(Request $request, $slug)
    {
        if($request->attached == null) {
            ThankYou::where('id', $slug)->update(['attached' => []]);
        } else {
            ThankYou::where('id', $slug)->update($request->only('attached'));
        }
        return back();
    }

    public function edit ($slug)
    {
        $items = ThankYou::all();
        $products = Product::all();
        $item = ThankYou::find($slug);
        $update = true;
        return view('admin.thank-you.update', compact('item', 'update', 'items', 'products'));
    }

    public function delete($slug)
    {
        ThankYou::where('id', $slug)->delete();
        return back();
    }

    public function index($slug)
    {
        $items = ThankYou::all();
        $update = false;
        $codes = CodeScript::all();
        return view('admin.thank-you.create', compact('items', 'update', 'codes'));
    }

    public function updateElement (Request $request, $slug)
    {
        Product::old_price($request);
        Product::photo($request, 'image', 'photo');
        ThankYou::where('id', $slug)->update($request->only('photo', 'name', 'description', 'price', 'sale', 'old_price'));
        return redirect()->route('thankYou.create');
    }
}
