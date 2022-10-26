<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function github()
    {
        //send the user request to github
        return Socialite::driver('github')->redirect();
    }
    public function githubRedirect()
    {
        //get request back from github
        $user = Socialite::driver('github')->user();

        $createOrCheck = User::firstOrCreate([
            'email' => $user->email
        ],[
            'name' => $user->name,
            'email' => $user->email,
            'password' => Hash::make(Str::random(25)),
        ]);

        Auth::login($createOrCheck, true);

        return redirect()->route('dashboard');

    }
}
