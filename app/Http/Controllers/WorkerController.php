<?php

namespace App\Http\Controllers;

use App\Jobs\InvitationJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use function Sodium\add;

class WorkerController extends Controller
{
    public function index (Request $request)
    {
        $users = User::where('id', '!=', 1)->get();
        return view('admin.workers.index', compact('users'));
    }

    public function invitation (Request $request)
    {
        $request->validate([
           'email' => 'unique:users'
        ], [
            'unique' => $request->email . '-ը արդեն գրանցված է!'
        ]);
        $request->request->add(['name' => 'Անուն Ազգանուն']);
        $request->request->add(['password' => Str::random(16)]);
        $user = User::create($request->all());
        $token = Hash::make($request->password);
        InvitationJob::dispatch($user, $token);
        return back()->with('ok', $request->email . '-ը հրավիրված է։');
    }

    public function invitationRegister (Request $request)
    {
        if (!$user = User::where([['email', $request->email], ['email_verified_at', null], ['status', 0]])->first()) {
            abort(403);
        }
        if (!Hash::check($user->password, $request->token)) {
            abort(403);
        }
        return view('admin.workers.register', compact('user'));
    }

    public function invitationRegistration (Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'email' => 'required|email|min:9|max:100',
            'password' => 'required|confirmed|min:8|max:100',
            'avatar' => 'image'
        ]);

        if (!$user = User::where([['email', $request->email], ['email_verified_at', null], ['status', 0]])->first()) {
            abort(403);
        }
        if (!Hash::check($user->password, $request->user_token)) {
            abort(403);
        }
        $data = [
            'name' => $request->name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'status' => 1
        ];
        if ($request->hasFile('avatar')) {
            $user->update($data + ['avatar' => $request->file('avatar')->store('avatar')]);
        } else {
            $user->update($data);
        }

        return redirect()->route('login');
    }

    public function editWorker (User $user)
    {
        return view('admin.workers.edit', compact('user'));
    }



    public function updateWorker(Request $request, User $user)
    {
        $user->update($request->only('product_permission', 'special_permission', 'home_permission', 'position'));
        return redirect()->route('worker.index')->with('ok', $user->name . '-ը խմբագրվել է։');
    }

    public function deleteWorker (User $user)
    {
        $deletedWorker = $user->name;
        if(File::exists('images/'.$user->avatar)) File::delete('images/'.$user->avatar);
        $user->delete();
        return redirect()->route('worker.index')->with('ok', $deletedWorker . '-ը հեռացվել է։');
    }

    public function settingWorker (User $user)
    {
        return view('admin.workers.settings', compact('user'));
    }

    public function settingUpdateWorker (Request $request, User $user)
    {
        $photo = null;

        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'old_password' => 'required|string|min:8|max:100',
            'password' => 'confirmed',
            'avatar' => 'image'

        ]);

        if(!Hash::check($request->old_password, $user->password)) return back()->withErrors(['old_password' => 'Գաղտնաբառի սխալ']);
        if ($request->hasFile('avatar')) $photo = $request->file('avatar')->store('avatar');
        $user->update([
            'name' => $request->name,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'avatar' => $photo ?? $user->avatar
        ]);
        return back()->with('ok', 'Ձեր տվյալները խմբագրվել են');
    }

}
