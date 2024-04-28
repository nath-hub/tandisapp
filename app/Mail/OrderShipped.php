<?php

namespace App\Mail;

use App\Models\Enterprise;
use Illuminate\Support\Facades\Cache;
use Illuminate\Bus\Queueable;  
use Illuminate\Mail\Mailable; 
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Headers;
use Illuminate\Mail\Attachment;
use Illuminate\Support\Facades\Storage;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public function headers(): Headers
    {
        return new Headers( 
            references: ['tandisInvestment'],
            text: [
                'X-Custom-Header' => 'Custom Value',
            ],
        );
    }

    public $storagePath;
    public $contratPath;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($storagePath, $contratPath, $user)
    {
        $this->storagePath = $storagePath;
        $this->contratPath = $contratPath;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Facture de paiement',
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
            view: 'mail',
            with: [$this->user],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    { 
        return [Attachment::fromPath($this->contratPath), Attachment::fromPath($this->storagePath)];
    
    }
}
