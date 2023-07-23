<?php

namespace App\Http\Controllers;

use App\Events\ClearNotification;
use App\Http\Livewire\Admin\Notification;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Shankl\Factories\AuthUserFactory;

class NotificationController extends Controller
{
    public function index(){

        event(new ClearNotification(AuthUserFactory::getAuthUser()));
        return view('admin.notifications.notifications');
    }

    public function delete($notificationId){

         $Notification = Notification::findOrFail($notificationId);

         $Notification->delete();

         toastr('deleted successfully' , "success");

         return back();

    }
}
