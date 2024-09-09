<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->email === "moo@me.com";
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
