<?php
namespace App\Service;

use App\Events\notification as EventsNotification;
use App\Http\Controllers\Controller;
use App\Models\notification;

class NotificationService extends Controller{

    public function createNotification($msg,$type) {
        $notification=new notification();
        $notification->msg=$msg;
        $notification->save();

        event(new EventsNotification([
            "msg"=>$msg,
            "type"=>$type
        ]));
    }

}

/*
live notification
notifications
  new orders
  customer Notification


*/