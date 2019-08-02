<?php

namespace App\Observers;

use App\User;

class UserObserver
{
    public function creating(User $user)
    {
        if (empty($user->api_token)) {
            $user->api_token = $user->getApiToken();
        }
    }
}
