<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Jobs\CallBackPhoneJob;
use App\Models\Color;
use App\Models\Comment;
use App\Models\InfoLongDescriptionList;
use App\Models\InfoShortDescriptionList;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Validator;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $items = Product::where(function ($q) use ($request) {
            if (isset($request->search)) {
                $q->where('custom', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('url', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('name', 'LIKE', '%' . $request->search . '%');
            }
        })
        ->orderBy('id', 'desc')->paginate(20);
        return view('admin.product.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::all();
        return view('admin.product.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::saveProduct($request);
        return redirect()->route('product.index')->with(['ok' => 'Ապրանքը Ստեղծվել է']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $item = Product::where('url', $slug)->with('infoShortDescription', 'infoLongDescription', 'sliderPhoto', 'comment')->firstOrFail();
        $shortTexts = InfoShortDescriptionList::select('info_short_description_text')->where([['product_id', $item->id], ['info_short_description_text', '!=', null]])->get()->pluck('info_short_description_text')->toArray();
        $shortDesc = InfoShortDescriptionList::where([['product_id', $item->id], ['info_short_description_text', null]])->first();
        $longTexts = InfoLongDescriptionList::select('info_long_description_text')->where([['product_id', $item->id], ['info_long_description_text', '!=', null]])->get()->pluck('info_long_description_text')->toArray();
        $longDesc = InfoLongDescriptionList::where([['product_id', $item->id], ['info_long_description_text', null]])->first();
        $comments = Comment::where('product_id', $item->id)->get();
        $sliders = Slider::where('product_id', $item->id)->get();
        $colors = Color::all();
        return view('admin.product.edit', compact('item', 'shortDesc', 'shortTexts', 'longTexts', 'longDesc', 'comments', 'sliders', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $item = Product::where('url', $slug)->first();
        Product::updateProduct($request, $item);
        return redirect()->route('product.index')->with('ok', 'Ապրանքի Փոփոխությունը Պահպանված է');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Product::DeleteProduct($slug);
        return redirect()->route('product.index')->with('ok', 'Ապրանքը Ջնջված է');
    }

}
