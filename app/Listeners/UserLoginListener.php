<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $user;
    public function __construct()
    {
        $this->user = \Auth::user();
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        \Auth::user()->profile()->update([
            'online_status'     =>  1,
        ]);

        //notify other people online that this particular user has just logged in. Broadcast notification only.
    }
}
