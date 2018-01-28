<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewAccount extends Notification implements ShouldQueue
{
    use Queueable;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->subject('HouseMait - New Account')
                    ->greeting('Hi ' . $this->user->fname . ' ' . $this->user->lname)
                    ->line('Welcome to' . env("APP_NAME") . ". Your account has been successfully created.")
                    ->line('Click on the button below to activate your account.')
                    ->action('Activate Account', route('profile', ['username' => $this->user->username]))
                    ->line('Thank you for using ' . env("APP_NAME"));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        return [
            //
            'name'      =>  $this->user->fname . " " . $this->user->lname,
            'message'   =>  'Your account successfully was created. \nE-mail: ' . $this->user->email . '\nUsername: ' . $this->user->username,
        ];
    }

    public function toDatabase($notifiable) {
        return [
            'type'      =>  'New Account',
            'message'   =>  'Your account successfully was created on ' .env('APP_NAME') .'. E-mail: ' . $this->user->email . ' Username: ' . $this->user->username,
        ];
    }

    /*
    public function toNexmo($notifiable) {
        return (new NexmoMessage)
                    ->content('Hello ' . $this->user->fname . ' ' . $this->user->lname . ' welcome to ' . env('APP_NAME'));
    }
    */
}
