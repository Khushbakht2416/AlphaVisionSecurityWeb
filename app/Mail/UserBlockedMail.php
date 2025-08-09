<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class UserBlockedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Account Blocked - AlphaVision Security',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.blocked',
            with: [
                'user' => $this->user,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
