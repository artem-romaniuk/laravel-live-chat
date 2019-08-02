<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatMessageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'message' => $this->message,
            'created_at' => $this->created_at->format('H:m:s d-m-Y'),
            'user' => new UserResource($this->user),
        ];
    }
}
