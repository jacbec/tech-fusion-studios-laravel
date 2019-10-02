<?php

namespace App\Mail\Main;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $reason;
    public $msg;

    /**
     * Create a new message instance.
     *
     * @param $name
     * @param $email
     * @param $reason
     * @param $msg
     * @return void
     */
    public function __construct($name, $email, $reason, $msg)
    {
        $this->name = $name;
        $this->email = $email;
        $this->reason = $reason;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return
            $this->from('contact@techfusionstudios.com', $this->name)
                ->replyTo($this->email, $this->name)
                ->view('emails.contact');
    }
}
