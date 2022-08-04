<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerServiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $username, $message, $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $message, $subject)
    {
        $this->username = $username;
        $this->message = $message;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('customerservice@efcontact.com', 'E.F. Contact Customer Service')->markdown('emails.customerservice.sendmail')->subject($this->subject);
    }
}
