<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersControllers extends Controller
{

    public function show($username){
        $user = User::where('username', $username)->first();
        $messages = $user->messages()->paginate(10);

        return view('users.show', [
            'user' => $user,
            'messages' => $messages,
        ]);
    }

    public function follows($username){
        $user = $this->findByUsername($username);
        return view('users.follows', [
            'user' => $user,
        ]);
    }

    public function follow($username, Request $request){
        $user = $this->findByUsername($username);
        $me = $request->user();

        $me->follows()->attach($user);

        return redirect("/$username")->withSuccess('Users Followed!');
    }

    private function findByUsername($username){
        return User::where('username', $username)->first();
    }

}
