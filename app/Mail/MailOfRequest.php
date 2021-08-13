<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailOfRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail)
    {
        $this->mail=$mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail=$this->markdown('emails.mail_of_request',[
                'mail' => $this->mail,
            ])
            ->from($this->mail->email);
        
        if($this->mail->attachment)
            $mail->attach( $this->mail->attachment->getPath(),[
                'as' => $this->mail->attachment->file_name,
                'mime' => $this->mail->attachment->mime_type
                ]);
        
        return $mail;
    }
}
