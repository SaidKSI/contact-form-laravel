<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $email;
    public $description;
    public $document;
    public $created_at;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $email, $description, $document, $created_at)
    {
        $this->subject = $subject;
        $this->email = $email;
        $this->description = $description;
        $this->document = $document;
        $this->created_at = $created_at;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact-form-submitted')
            ->subject('Contact Form Submitted')
            ->with([
                'subject' => $this->subject,
                'email' => $this->email,
                'description' => $this->description,
                'document' => $this->document,
                'created_at' => $this->created_at,
            ]);
    }
}

