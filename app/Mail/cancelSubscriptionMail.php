<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class cancelSubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $User;
    public $event;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($User , $event)
    {
        $this->User = $User;
        $this->event = $event;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        
        return new Envelope( 
            subject: 'Cancel Subscription Mail',
            to: [$this->User['email']],
            
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view:"Mails.cancelEvent",
            
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
