<?php

namespace App\Http\Controllers;

use App\SocialProfile;
use App\User;
use Illuminate\Http\Request;
use Socialite;

class SocialAuthController extends Controller
{
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        $existing = User::whereHas('socialProfile', function ($query) use ($user) {

            $query->where('social_id', $user->id);

        })->first();

        if($existing !== null){
            auth()->login($existing);

            return redirect('/');
        }else {
            session()->flash('facebookUser', $user);

            return view('users.facebook', [
                'user' => $user,
            ]);

        }


    }

    public function register(Request $request){
        $data = $request->session()->get('facebookUser');

        $username = $request->input('username');

        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'avatar' => $data->avatar,
            'username' => $username,
            'password' => str_random(16),

        ]);

        $profile = SocialProfile::create([
            'social_id' => $data->id,
            'user_id' => $user->id,
        ]);

        auth()->login($user);

        return redirect('/');

    }
}
