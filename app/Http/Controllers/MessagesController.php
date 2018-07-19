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
        $image = $request->file('image');

        $message = Message::create([
            'content' => $request->input(['message']),
            'image' => $image->store('messages', 'public'),
            'user_id' => $user->id,
        ]);

        return redirect('/messages/' . $message->id);

    }

    public function search(Request $request){

        $query = $request->input('query');

        $messages = Message::search($query)->get();
        $messages->load('user');

        return view('messages.index', [
            'messages' => $messages,
        ]);

    }

    public function responses(Message $message){

        return $message->responses;

    }
}
