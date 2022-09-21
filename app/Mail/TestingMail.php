<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name,$description;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('saimon@gmail.com', 'Saimon')
                    ->subject('Greeting')
                    ->view('mail.testing');
    }
}
