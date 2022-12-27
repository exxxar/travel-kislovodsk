<?php

namespace App\Mail;

use App\Models\Company;
use App\Models\Document;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyProfileDeclineMail extends Mailable
{
    use Queueable, SerializesModels;

    public $company;
    public $messages;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $company, array $messages)
    {
        $this->company = $company;
        $this->messages = $messages;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Notification Mail',
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
            view: 'emails.verification-profile-decline',
            with: [
                'company' => $this->company,
                'messages' => $this->messages,
            ],
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

    public function build()
    {
        return $this->view('emails.verification-profile-decline')
            ->with([
                'company' => $this->company,
                'messages' => $this->messages,
            ]);
    }
}
