<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SchoolSeatBooked extends Notification implements ShouldQueue
{
    use Queueable;

    public $school , $order , $child , $parent , $Shankel , $price;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($school , $order , $child , $parent , $Shankel , $price)
    {
        $this->school = $school;
        $this->order = $order;
        $this->child = $child;
        $this->parent = $parent;
        $this->Shankel = $Shankel;
        $this->price = $price;
        
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
                    ->view('invoices.SchoolBooking' , ['school' => $this->school , 'order' =>$this->order , 'child' => $this->child, 'parent' => $this->parent , 'Shankel' => $this->Shankel , 'Total' => $this->price->seat_price ]);
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
