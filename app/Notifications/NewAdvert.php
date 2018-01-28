<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewAdvert extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $ad;
    public function __construct($ad)
    {
        //
        $this->ad = $ad;
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
                    ->subject('New Advert Post')
                    ->greeting('Hello ' . \Auth::user()->fname . ' ' . \Auth::user()->lname)
                    ->line('Your ad titled: ' . $this->ad->title . ' has been successfully posted.')
                    ->line('This ad will be available for the next 14 days after which it will be marked as inactive.')
                    ->action('View ad', url('ads/result/' . $this->ad->slug))
                    ->line('Thank you for using ' . env('APP_NAME'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function toDatabase($notifiable) {
        return [
            'type'      => 'You created a new ad',
            'message'   => 'Your ad has been successfully posted. You can view it anytime in your profile or just click the link below to view it now.',
            'url'       =>  url('ads/result/' . $this->ad->slug)
        ];
    }

    public function toArray($notifiable) {
        return [
            'type'      => 'New ad.',
            'message'   => 'Your ad has been successfully posted',
            'url'       =>  url('ads/result/' . $this->ad->slug)
        ];
    }
}
