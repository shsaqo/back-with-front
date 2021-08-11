<?php

namespace App\Http\Controllers;

use App\Models\HomePageStatus;
use Illuminate\Http\Request;

class HomePageStatusController extends Controller
{
    public function index()
    {
        $item = HomePageStatus::first();
        return view('admin.home.index', compact('item'));
    }

    public function status(Request $request)
    {
        if ($status = HomePageStatus::first()) {
            $status->update($request->only('status'));
        } else {
            HomePageStatus::create($request->only('status'));
        }
        $statusChange = $request->status ? 'Գլխավոր էջը ակտիվ է' : 'Գլխավոր էջը պասիվ է';
        return back()->with('ok', $statusChange);
    }
}
