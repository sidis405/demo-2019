<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostWasUpdatedEmail extends Mailable
{
    public $recipient;
    public $post;
    public $sender;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender, $recipient, $post)
    {
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('A post was updated.')->markdown('email.posts.post-was-updated');
    }
}
