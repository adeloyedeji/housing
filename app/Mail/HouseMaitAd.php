<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class HouseMaitAd extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $slug;
    public $title;
    public $description;
    public function __construct($data)
    {
        //
        $this->slug = $data['slug'];
        $this->title = $data['title'];
        $this->description = $data['description'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("noreply@housemait.com", "HouseMait")->view('emails.new-ad-mail');
    }
}
