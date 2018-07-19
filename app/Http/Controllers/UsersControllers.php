<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Notifications\UserFollow;
use App\PrivateMessage;
use App\User;
use Illuminate\Http\Request;

class UsersControllers extends Controller
{

    public function show($username){


        $user = $this->findByUsername($username);
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
            'follows' => $user->follows,
        ]);
    }

    public function followers($username){
        $user = $this->findByUsername($username);

        return view('users.follows', [
            'user' =>  $user,
            'follows' => $user->followers,
        ]);

    }

    public function follow($username, Request $request){
        $user = $this->findByUsername($username);

        $me = $request->user();

        $me->follows()->attach($user);

        $user->notify(new UserFollow($me));

        return redirect("/$username")->withSuccess('Users Followed!');
    }

    public function unfollow($username, Request $request){
        $user = $this->findByUsername($username);
        $me = $request->user();

        $me->follows()->detach($user);

        return redirect("/$username")->withSuccess('Users Unfollowed!');
    }

    public function sendPrivateMessage($username, Request $request){

        $user = $this->findByUsername($username);

        $me = $request->user();
        $message = $request->input('message');

        $conversation = Conversation::between($me, $user);

        $privateMessage = PrivateMessage::create([
            'conversation_id' => $conversation->id,
            'user_id' => $me->id,
            'message' => $message,
        ]);

        return redirect('/conversation/' .$conversation->id);

    }

    public function showConversation(Conversation $conversation){

        $conversation->load('users', 'privateMessages');
        $me = auth()->user();

        $validator = PrivateMessage::validator($me, $conversation);

        if($validator){
            return view('users.conversation', [
                'conversation' => $conversation,
                'user' => auth()->user(),
            ]);
        }else {
            return redirect('/');
        }




    }

    private function findByUsername($username){
        return User::where('username', $username)->firstOrFail();
    }

}
