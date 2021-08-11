<?php

namespace App\Http\Controllers;

use App\Jobs\CallBackPhoneJob;
use App\Jobs\SendCommentEmailJob;
use App\Models\CodeScript;
use App\Models\Comment;
use App\Models\InfoLongDescriptionList;
use App\Models\InfoShortDescriptionList;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\RedisExpirationPhone;

class IndexController extends Controller
{
    use RedisExpirationPhone;

    public function index(Request $request, $slug)
    {
        $items = Product::with('saleTime')->where([['url', $slug], ['status', 1]])->firstOrFail();
        $shortDesc = InfoShortDescriptionList::where([['product_id', $items->id], ['info_short_description_text', null]])->first();
        $shortTexts = InfoShortDescriptionList::select('info_short_description_text')->where([['product_id', $items->id], ['info_short_description_text', '!=', null]])->get()->pluck('info_short_description_text')->toArray();
        $longTexts = InfoLongDescriptionList::select('info_long_description_text')->where([['product_id', $items->id], ['info_long_description_text', '!=', null]])->get()->pluck('info_long_description_text')->toArray();
        $longDesc = InfoLongDescriptionList::where([['product_id', $items->id], ['info_long_description_text', null]])->first();
        $sliders = Slider::where('product_id', $items->id)->get()->pluck('slider_photo')->toArray();
        $comments = Comment::where('product_id', $items->id)->get();
        $codes = CodeScript::all();
        return view('index', compact(
            'items',
            'shortDesc',
            'shortTexts',
            'longDesc',
            'longTexts',
            'sliders',
            'comments',
            'codes'
        ));
    }

    public function like (Request $request)
    {
        $ip = DB::table('ip_addresses')->where('like', $request->ip())->first();
        if (!$ip) {
            DB::table('ip_addresses')->insert(['like' => $request->ip()]);
            Comment::where('id', $request->id)->increment('like');
        } else {
            DB::table('ip_addresses')->where('like', $request->ip())->delete();
            Comment::where('id', $request->id)->decrement('like');
        }
        return back();
    }
    public function callBackPhone (Request $request)
    {
        $request->validate([
            'tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
        ]);
        $url = request()->getHost() . '/' . $request->callBackUrl;
        CallBackPhoneJob::dispatch($request->tel, $url);
        return back()->with('ok', 'Մեր օպերատորը կապ կհաստատի Ձեզ հետ 10 ր ընթացքում');
    }

    public function sendCommentEmail (Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:50',
            'text' => 'string|max:250'
        ]);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo')->storeAs('comment', 'user_photo.jpg');
        } else {
            $file = 'comment\no-photo\no-photo.png';
        }

        SendCommentEmailJob::dispatch($request->name, $request->text, $file);
        return back();
    }
}
