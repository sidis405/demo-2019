<?php

namespace App\Listeners;

use App\User;
use App\Events\PostWasUpdated;
use App\Jobs\SendPostUpdateNotificationEmail;

class NotifyForUpdatedPostListener
{
    /**
     * Handle the event.
     *
     * @param  PostWasUpdated  $event
     * @return void
     */
    public function handle(PostWasUpdated $event)
    {
        $sender = null;
        $recipient = null;
        $user = auth()->user() ?? new User;

        $author = $event->post->user;
        $admin = User::where('role', 'admin')->first();

        if ($event->post->isAuthoredBy($user) && $user->isNotAdmin()) {
            $sender = $author;
            $recipient = $admin;
        }

        if ($event->post->isNotAuthoredBy($user) && $user->isAdmin()) {
            $sender = $admin;
            $recipient = $author;
        }

        if (! ($event->post->isAuthoredBy($user) && $user->isAdmin())) {
            SendPostUpdateNotificationEmail::dispatch($sender, $recipient, $event->post);
        }
    }
}
