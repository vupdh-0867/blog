<?php

namespace App\Policies;

use App\Model\Post;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id ? Response::allow() : Response::deny('You must own this post.');
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id ? Response::allow() : Response::deny('You must own this post.');
    }
}
