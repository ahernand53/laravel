<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function show(Message $message){

        return View('messages.show', [
            'message' => $message,
        ]);

    }

    public function create(CreateMessageRequest $request){

        $user = $request->user();
        $message = Message::create([
            'content' => $request->input(['message']),
            'image' => 'http://lorempixel.com/600/338?' . mt_rand(0, 1000),
            'user_id' => $user->id,
        ]);

        return redirect('/messages/' . $message->id);

    }
}
