<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shankl\Interfaces\EventRepoInterface;

class EventsController extends Controller
{
    private $eventRepo;
    public function __construct(EventRepoInterface $eventRepo)
    {
        $this->eventRepo = $eventRepo;
    }


    public function index(){



        return view("web.events.events");
    }

    public function oo(){


    }
}
