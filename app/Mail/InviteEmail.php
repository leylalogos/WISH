<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class InviteEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $inviter;

    /**
     * Create a new message instance.
     */
    public function __construct($inviter)
    {
        $this->inviter = $inviter;
    }

    /**
    * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('invite@wish.xnor.one', config('app.name')),
            replyTo: [
                new Address('no-reply@wish.xnor.one', 'No Reply'),
            ],
            subject: "You have an Invitation from {$this->inviter->name}"
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.invitation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
