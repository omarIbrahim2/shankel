<?php

namespace App\Listeners;

use App\Events\UserRegisterEvent;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;

class UserRegisterListener
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
    public function handle(UserRegisterEvent $event)
    {
       $Admins = User::select('notifications','id')->get();

       foreach($Admins as $admin){

        $admin->notifications++;

        $admin->save();
        $admin->notifications()->create([
            "user_id" => $admin->id,
            'info' => $event->user->name()."has been registered to the shankel",
        ]);

       }

    }
}
