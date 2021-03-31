<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class MailTemp extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $feedback;
    public $password;

    /**
     * Create a new message instance.
     *
     * @param $feedback
     */
    public function __construct($feedback)
    {
        $this->feedback = $feedback;
        $this->password = Hash::make(str_random(8));
    }

    /**
     * Build the message.
     * resources/views/emails/auth/registration.blade.php
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth.registration')->with($this->feedback);
    }
}
