<?php

namespace App\Listeners;

use App\Events\AccountActivationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountActivationEventListener
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
     * @param  AccountActivationEvent  $event
     * @return void
     */
    public function handle(AccountActivationEvent $event)
    {
        //
        $user = $event->user;
        $activation_code = str_random(50);
        $data = array(
            'user_id'           =>  $user->id,
            'activation_code'   =>  $activation_code
        );
        $activation = \App\AccountActivation::firstOrCreate($data);
    }
}
