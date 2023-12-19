<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventSeatBooked extends Notification implements ShouldQueue
{
    use Queueable;
    
   
    
    public $user;
    public $event;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user , $event)
    {
        $this->connection = 'database';
        $this->user = $user;
        $this->event = $event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->line('اهلا و سهلا بك استاذ : '. $this->user->name('ar'))
                    ->line("لقد حجزت في فاعلية ". $this->event->title('ar'))
                    ->line('شكرا لمشاركتك في الحدث');
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
            //
        ];
    }

    public function viaQueues() : array
    {

        return [
          "mail" => "default"
        ];
    }

}
