<?php

namespace App\Listeners;

use App\Events\SchoolViews;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class increaseViews
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
    public function handle(SchoolViews $event)
    {
         $this->updateViews($event->school);
    }

    public function updateViews($school){

        $school->views = $school->views + 1;

        $school->save();
    }
}
