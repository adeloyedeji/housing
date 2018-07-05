<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewMessageNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $chat;
    public function __construct($chat)
    {
        $this->chat = $chat;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $user = \App\User::find($this->chat->recipient_id);

        if($user->profile->online_status):
            return ['broadcast'];
        else:
            return ['mail', 'database', 'broadcast'];
        endif;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user = \App\User::find($this->chat->recipient_id);
        $sender = \App\User::find($this->chat->sender_id);
        return (new MailMessage)
                    ->greeting('Hello ' . $user->fname . ' ' . $user->lname)
                    ->subject('New Message')
                    ->line('You have a new message from ' . $sender->fname . ' ' . $sender->lname)
                    ->action('Read message', url('/messaging/chat/' . $sender->profile->phone))
                    ->line('HouseMait...Tagline here!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $recipient  =   \App\User::find($this->chat->recipient_id);
        $sender     =   \App\User::find($this->chat->sender_id);
        return [
            'sender'    =>  $sender->fname . ' ' . $sender->lname,
            'message'   =>  ' sent you a new message.',
            'url'       =>  '/messaging/chat/' . $sender->profile->phone
        ];
    }

    public function toBroadcast($notifiable) {
        $recipient  =   \App\User::find($chat->recipient_id);
        $sender     =   \App\User::find($chat->sender_id);
        return [
            'sender_id'     =>  $chat->sender_id,
            'recipient_id'  =>  $chat->recipient_id,
            'message'       =>  $chat->message
        ];
    }
}
