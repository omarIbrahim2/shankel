<?php

namespace App\Http\Controllers;

use App\Events\ClearNotification;
use Illuminate\Http\Request;
use Shankl\Factories\AuthUserFactory;

class NotificationController extends Controller
{
    public function index(){

        event(new ClearNotification(AuthUserFactory::getAuthUser()));
        return view('admin.notifications.notifications');
    }
}
