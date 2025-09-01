<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $message;
    protected $status;
    /**
     * Create a new notification instance.
     */
    public function __construct($message, $status = 'success')
    {
        $this->message = $message;
        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast']; // only push to browser
    }




    public function toBroadcast($notifiable)
    {
        return [
            'message' => $this->message,
            'status'  => $this->status,
        ];
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
