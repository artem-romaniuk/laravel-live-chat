<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChatMessagesResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => ChatMessageResource::collection($this->collection),
        ];
    }
}
