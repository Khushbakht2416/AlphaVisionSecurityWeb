<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectText;
    public $bodyText;

    public function __construct($subjectText, $bodyText)
    {
        $this->subjectText = $subjectText;
        $this->bodyText = $bodyText;
    }

    public function build()
    {
        $email = $this->subject($this->subjectText)
                      ->markdown('emails.custom')
                      ->with([
                          'bodyText' => $this->bodyText,
                      ]);

        if (request()->hasFile('attachment')) {
            $email->attach(request()->file('attachment')->getRealPath(), [
                'as' => request()->file('attachment')->getClientOriginalName(),
                'mime' => request()->file('attachment')->getMimeType(),
            ]);
        }

        return $email;
    }
}
