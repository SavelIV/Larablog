<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Mail from contact form ' . env('MAIL_FROM_NAME'))
            ->markdown('emails.contact-mail',
                [
                    "subject" => $this->mailData['subject'],
                    "name" => $this->mailData['name'],
                    "phone" => $this->mailData['phone'],
                    "text" => $this->mailData['text'],
                    "email" => $this->mailData['email'],
                ]
            );
    }
}
