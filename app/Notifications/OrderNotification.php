<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $order , $services , $user , $Shankel;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order , $services , $user , $Shankel)
    {
        $this->order = $order;
        $this->services = $services;
        $this->user = $user;
        $this->Shankel = $Shankel;
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
        ->view('invoices.Ordering' , ['order' => $this->order , 'services' =>$this->services , 'user' => $this->user , 'Shankel' => $this->Shankel]);
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
          "mail" => "Mailing"
        ];
    }
}
