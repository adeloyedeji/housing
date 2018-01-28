<?php

namespace App\Listeners;

use App\Events\NewAdEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewAdEventListener
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
     * @param  NewAdEvent  $event
     * @return void
     */
    public function handle(NewAdEvent $event)
    {
        //
        $ad = $event->ads;
        $data = array(
            'slug'          =>  $ad->slug,
            'title'         =>  $ad->title,
            'description'   =>  $ad->description
        );

        try {
            \Mail::to($user->email)->send(new \App\Mail\HouseMaitAd($data));
        } catch(\Exception $ex) {
            return $ex;
        }
    }
}
