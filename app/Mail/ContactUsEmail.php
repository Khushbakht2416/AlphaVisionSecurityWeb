<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $message;

    public function __construct(string $name, string $email, string $subject, string $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function build()
    {
        $email = $this->subject($this->subject)
                      ->markdown('emails.contactus')
                      ->with([
                          'name' => $this->name,
                          'email' => $this->email,
                          'subject' => $this->subject,
                          'message' => $this->message,
                          'ipaddress' => request()->ip(),
                          'userAgent' => request()->header('User-Agent'),
                      ]);

        return $email;
    }
}
