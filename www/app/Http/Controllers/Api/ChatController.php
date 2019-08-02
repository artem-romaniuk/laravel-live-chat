<?php

namespace App\Http\Controllers\Api;

use App\ChatMessage;
use App\Events\SendMessage;
use App\Http\Requests\ChatMessageRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChatMessageResource;
use App\Http\Resources\ChatMessagesResource;

class ChatController extends Controller
{
    public function getMessages()
    {
        $messages = ChatMessage::with('user')->get();

        return new ChatMessagesResource($messages);
    }

    public function postMessage(ChatMessageRequest $request)
    {
        try {
            $message = ChatMessage::create($request->only(['message', 'user_id']));

            event(new SendMessage(new ChatMessageResource($message)));

            return response()->json(['status' => 'success'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 503);
        }
    }
}
