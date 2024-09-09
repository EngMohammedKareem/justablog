<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reply;

class ReplyPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    public function update(User $user, Reply $reply)
    {
        return $user->id === $reply->user_id;
    }

    public function delete(User $user, Reply $reply)
    {
        return $user->id === $reply->user_id;
    }
}
