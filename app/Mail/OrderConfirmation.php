<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $lead; //variabile che contiene le informazioni dell'ordine
    /**
     * Create a new message instance.
     */
   
    public function __construct($_lead) //_lead è un oggetto che contiene tutte le informazioni relative all'ordine.All'interno del costruttore, il valore di $_lead viene assegnato a una proprietà pubblica della classe ($lead).

    {
        $this->lead = $_lead; 
    }

    /**
     * Get the message envelope.
     */

    public function envelope(): Envelope //crea l'oggetto envelope per la mail della conferma dell'ordine
    {
        return new Envelope(
            subject: 'Order Confirmation',
            replyTo: $this->lead->address
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.emails.order-confirmation', /* percorso della vista */
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
