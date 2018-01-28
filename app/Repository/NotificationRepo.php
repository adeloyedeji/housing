<?php

namespace App\Repository;

use App\Interfaces\NotificationInterface;

class NotificationRepo implements NotificationInterface {
    public function myAdNotification($id) {
        $notifications;
        try {   
            $notifications = \App\AdNotification::where('user_id', $id)->paginate(12);
        } catch(\Exception $ex) {
            return $ex;
        }
        return $notifications;
    }
}