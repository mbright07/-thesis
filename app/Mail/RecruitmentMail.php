<?php

namespace App\Mail;

use App\Models\Recruitment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecruitmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public Recruitment $recruitment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recruitment)
    {
        $this->recruitment = $recruitment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Recruitment Confirmation')->view('mails.recruitment-mail');
    }
}
