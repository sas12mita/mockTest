<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMailNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $type;
    public $mail_message;

    public function __construct(string $name, string $type, string $message)
    {
        $this->name = $name;
        $this->type = $type;
        $this->mail_message = $message;
    }

    public function build()
    {
        return $this->subject("$this->type Notification")
                    ->view('mail')
                    ->with([
                        'name' => $this->name,
                        'type' => $this->type,
                        'mail_message' => $this->mail_message,
                    ]);
    }
}
