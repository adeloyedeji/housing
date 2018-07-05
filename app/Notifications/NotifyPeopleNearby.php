<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyPeopleNearby extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $ad;
    public $user_near_by;
    public function __construct($ad, $user_near_by)
    {
        $this->ad = $ad;
        $this->user_near_by;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting("Hello " . $this->user_near_by->fname . ' ' . $this->user_near_by->lname)
                    ->subject("New Ad On HouseMait")
                    ->line('A new advert matching your location was recently posted on housemait flat share.')
                    ->line('Click the button below to view')
                    ->action('View ad', url('ads/result/' . $this->ad->slug));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function toArray($notifiable) {
        return [
            'type'      => 'New ad.',
            'message'   => 'A new ad matching your location axis was just posted on HouseMait',
            'url'       =>  url('ads/result/' . $this->ad->slug)
        ];
    }
}
