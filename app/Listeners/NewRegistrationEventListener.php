<?php

namespace App\Listeners;

use App\Events\NewRegistrationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewRegistrationEventListener
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
     * @param  NewRegistrationEvent  $event
     * @return void
     */
    public function handle(NewRegistrationEvent $event)
    {
        //
        $user = $event->user;
        $data = array(
            'id'                =>  50000 + $user->id,
            'name'              =>  $user->fname . ' ' . $user->lname,
            'activation_code'   =>  $user->activation->activation_code
        );     
        try {
            \Mail::to($user->email)->send(new \App\Mail\EmailVerificationForHouseMait($data));
        } catch(\Exception $ex) {
            return $ex;
        }
    }
}
