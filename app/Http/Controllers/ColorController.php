<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (Request $request)
    {
        $items = Color::all();
        return view('admin.color', compact('items'));
    }

    public function create (Request $request)
    {
        Color::create($request->all());
        return redirect()->route('colors')->with('ok', 'Գույնը Ստեղծված է');
    }

    public function delete(Color $color)
    {
        $color->delete();
        return redirect()->route('colors')->with('ok', 'Գույնը ջնջված է');
    }
}
