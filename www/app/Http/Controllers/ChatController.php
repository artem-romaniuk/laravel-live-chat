<?php

namespace App\Http\Controllers;

use App\ChatMessage;
use App\Events\SendMessage;
use App\Http\Requests\ChatMessageRequest;

class ChatController extends Controller
{
    public function index()
    {
        $messages = ChatMessage::with('user')->get();

        return view('chat.index', compact('messages'));
    }

    public function send(ChatMessageRequest $request)
    {
        $message = ChatMessage::create($request->only(['message', 'user_id']));

        event(new SendMessage($message));

        return redirect()->back();
    }
}
