<?php

namespace Radoan\Memail\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Radoan\Memail\Models\EmailTemplate;

class MasterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $template;
    public $attachments;
    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailTemplate $template,$body,$attachments = null)
    {
        $this->template = $template;
        $this->attachments = $attachments;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->subject($this->template->subject)->view('master-mail::mail');
        foreach ($this->attachments as $attachment){
            $email->attach($attachment);
        }
        return $email;
    }
}
