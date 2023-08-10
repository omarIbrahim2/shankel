<?php

namespace App\Jobs;

use App\Mail\cancelSubscriptionMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CancelSubscribtion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $Users;
    
    public $event;
    
     public $tries = 3;
    /**
     * Create a new job instance.
     *
     * @return void
     * 
     * 
     */
    public function __construct($Users , $event)
    {
        
        $this->Users = $Users;
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    { 
    
        foreach($this->Users as $user){
               
            Mail::later(now()->addSeconds(20) ,new cancelSubscriptionMail($user,  $event));
        }
         
 
    }
}
