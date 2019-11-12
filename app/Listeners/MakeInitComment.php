<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Mail\Commented;
use App\Model\Comment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MakeInitComment
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        Comment::create(['user_id' => Auth::id(), 'post_id' => $event->post->id, 'content' => 'Init comment made by event']);
        Mail::to($event->post->user->email)->send(new Commented($event->post));
    }
}
