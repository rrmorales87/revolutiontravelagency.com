<?php

namespace App\Mail;

use App\Http\Resources\ReservationResource;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;



class CreateReservationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected  ReservationResource $reservation;

    /**
     * Create a new message instance.
     */
    public function __construct(ReservationResource $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('newRequest').'-'.strtoupper($this->reservation->slug),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reservation_created',
            with: ['reservation' => $this->reservation],

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
