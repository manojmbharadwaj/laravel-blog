<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Socialite;

use Illuminate\Http\Request;


class GoogleAuthController extends Controller
{
    public function callback()
    {
        $user = Socialite::with('google')->user();
        $userDetails = User::login($user);
        if ($userDetails) {
            auth()->login($userDetails, TRUE);
            if ($userDetails->usertype_id == UT_ADMIN) return redirect()->route('admin.index');
            else return redirect()->route('home');
        } else dd('error');
    }

    public function auth()
    {
        return Socialite::driver('google')->redirect();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }
}
