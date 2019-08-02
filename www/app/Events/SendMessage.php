<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(JsonResource $message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('live-chat');
    }

    public function broadcastAs()
    {
        return 'message-live-chat';
    }
}
