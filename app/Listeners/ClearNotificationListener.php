<?php

namespace App\Listeners;

use App\Events\ClearNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class ClearNotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ClearNotification $event)
    {
          $event->User->notifications = 0;


          $event->User->save();  
    }
}
