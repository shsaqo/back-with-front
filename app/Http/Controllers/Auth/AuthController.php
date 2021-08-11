<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function changePassword (Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|string|min:8|max:50'
        ],[
            'password.confirmed' => 'Գաղնաբառի կրկնությունը չի համընկնում',
            'password.min' => 'Գաղնաբառ պետք է ունենա ամենաքիչը 8 նիշ',
            'password.max' => 'Գաղնաբառ պետք է ունենա ամենաշատը 50 նիշ'
        ]);
        $user = auth()->user();
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('old_password', 'Գաղնաբառը չի համընկնում');
        }
        if ($request->password != $request->password_confirmation) {
            return back()->with('password_confirmation', 'Գաղնաբառի կրկնությունը չի համընկնում');
        }
        $user->update(['password' => Hash::make($request->password)]);
        return back()->with('ok', 'Գաղնաբառը փոխված է');
    }
    public function changePasswordShow ()
    {
        return view('auth.password-change');
    }
}
