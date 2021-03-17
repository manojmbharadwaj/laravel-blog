<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
// use Socialite;

use Faker\Generator as Faker;

use stdClass;

class DummyLoginController extends Controller
{
    public function fakeLogin()
    {
        if (env('APP_DEBUG')) {
            $userDetails = User::fakeLogin();
            if ($userDetails) {
                auth()->login($userDetails, TRUE);
                if ($userDetails->usertype_id == UT_ADMIN) return redirect()->route('admin.index');
                else return redirect()->route('home_page');
            } else dd('error');
        } else redirect()->route('home_page');
    }

    public function fakeRegister(string $email, Faker $faker)
    {
        if (env('APP_DEBUG')) {

            $user = new stdClass();
            $user->email = $email;
            $user->avatar = '';
            $user->user['name'] = $faker->name;
            $user->user['email'] = $email;
            // google id
            $user->user['id'] = $faker->randomNumber($nbDigits = 8, $strict = false);

            $userDetails = User::login($user);
            if ($userDetails) {
                auth()->login($userDetails, TRUE);
                if ($userDetails->usertype_id == UT_ADMIN) return redirect()->route('admin.index');
                else return redirect()->route('home_page');
            } else dd('error');
        } else redirect()->route('home_page');
    }
}
