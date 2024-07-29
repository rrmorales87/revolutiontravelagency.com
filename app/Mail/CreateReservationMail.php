<?php

namespace App\Mail;

use App\Http\Resources\ReservationResource;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use MailerSend\Helpers\Builder\Personalization;
use MailerSend\Helpers\Builder\Variable;
use MailerSend\LaravelDriver\MailerSendTrait;

class CreateReservationMail extends Mailable
{
    use Queueable, SerializesModels, MailerSendTrait;

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
        $to = Arr::get($this->to, '0.address');

        // Additional options for MailerSend API features
        $this->mailersend(
            template_id: null,
            variables: [
                new Variable($to, ['name' => $this->reservation->client->name,'reservation' => $this->reservation]),
            ],
            precedenceBulkHeader: true,
            sendAt: new Carbon(),
        );
        return new Content(
            view: 'emails.reservation_created'

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
