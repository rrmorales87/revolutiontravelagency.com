<?php

namespace App\Notifications;

use App\Http\Resources\ReservationResource;
use App\Mail\CreateReservationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class ReservationCreated extends Notification
{
    use Queueable;

    private $reservation;

    /**
     * Create a new notification instance.
     */
    public function __construct(ReservationResource $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {
        return (new MailMessage)
                ->subject(__('newRequest').$this->reservation->slug)
            ->view('emails.reservation_created', ['reserva' => $this->reservation]);

        /*return Mail::to($this->reservation->client->contact)
            ->send(new CreateReservationMail($this->reservation));*/
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
