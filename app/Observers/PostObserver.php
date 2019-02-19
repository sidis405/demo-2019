<?php

namespace App\Observers;

use App\Post;
use App\Events\PostWasUpdated;

class PostObserver
{
    public function creating(Post $post)
    {
        $post->attributes['slug'] = str_slug($post->title);
    }

    public function updating(Post $post)
    {
        $post->attributes['slug'] = str_slug($post->title);
    }

    public function updated(Post $post)
    {
        event(new PostWasUpdated($post));
    }
}
