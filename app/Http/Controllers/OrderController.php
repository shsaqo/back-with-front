<?php

namespace App\Http\Controllers;

use App\Jobs\ChangePhoneNumberJob;
use App\Jobs\HomeOrderJob;
use App\Jobs\SendEmail;
use App\Models\Order;
use App\Models\ThankYou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Traits\RedisExpirationPhone;

class OrderController extends Controller
{
    use RedisExpirationPhone;

    public function create (Request $request)
    {
        $validatedData = $request->validate([
            'phone' => 'min:8|max:9|required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'user_name' => 'required_if:phone_type,==,2|max:50'
        ],[
            'min' => 'Հեռախոսահամարը պետք է լինի 8 կամ 9 նիշ',
            'max' => 'Հեռախոսահամարը պետք է լինի 8 կամ 9 նիշ',
            'required' => 'Հեռախոսահամարը պարտադիր դաշտ է',
            'regex' => 'Հեռախոսահամարի սխալ ձևաչափ'
        ]);

        $thankYouCheck = $request->thankYouUrl ? false : true;
        if ($this->getExpirationNumber($request->phone, url()->previous()) && $thankYouCheck) {
            Session::flash('expirationPhone', $request->phone . ' Համարից պատվերը ընդունված է');
            return back();
        }

        $request->request->add(['ip_address' => $request->ip()]);
        $item = Order::create($request->all());
        if ($thankYouCheck) $this->setExpirationNumber($request->phone, url()->previous());
        $fullUrl = request()->getHost() . '/' . $item->url;

        if (isset($request->homePage) && $request->homePage == 1) {
            $request->request->add(['order_id' => $item->id]);
            $request->request->add(['time' => now()->toDateTimeString()]);
            HomeOrderJob::dispatch($request->all());
            $url = $request->productId;
        } else {
            $url = $request->url;
            SendEmail::dispatch($item->user_name, $item->phone, $fullUrl, $item->product_name, $item->ip_address,  now()->toDateTimeString(), $item->id, $request->custom);
        }

        Session::put('phone', $request->phone);
        Session::put('orderId', $item->id);
        Session::put('pageColor', $request->pageColor ?? '');
        Session::put('user_name', $item->user_name);
        Session::put('thankYouUrl', $request->url);
        Session::put('custom', $request->custom ?? '');
        Session::push('thankYouId', $request->thankYouId ?? '');
        if ($request->thankYouUrl) {
            $thankYou = ThankYou::whereJsonContains('attached', $request->thankYouUrl)->get();
            Session::put('thankYouUrl', $request->thankYouUrl);
            Session::put('thankYou', $thankYou);
        } else {
            $thankYou = ThankYou::whereJsonContains('attached', $request->url)->get();
            Session::put('thankYou', $thankYou);
        }
        if ($request->url == 'Thank you Page') {
            return back();
        }

        return redirect()->route('thank-you', $url);
    }

    public function thankYou (Request $request)
    {
        $thankYou = ThankYou::whereJsonContains('attached', $request->url)->get();
        return view('thank-you', compact('thankYou'));
    }

    public function changePhoneNumber (Request $request)
    {
        $request->validate([
            'newPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
        ]);
        ChangePhoneNumberJob::dispatch($request->newPhone, $request->orderId);
        Session::put('phone', $request->newPhone);
        return back();
    }
}
