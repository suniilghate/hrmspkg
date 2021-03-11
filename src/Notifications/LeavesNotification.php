<?php

namespace ITAIND\HRMSPKG\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeavesNotification extends Notification
{
    use Queueable;
    private $leaveData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($leaveData)
    {
        $this->leaveData = $leaveData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($this->leaveData['name'])
                    ->line($this->leaveData['body'])
                    ->action($this->leaveData['leaveText'], $this->leaveData['leaveUrl'])
                    ->line($this->leaveData['thanks']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'leave_id' => $this->leaveData['leave_id']
        ];
    }
}
