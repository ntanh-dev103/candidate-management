<?php

namespace App\Mail;

use App\Models\Candidate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidateReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public Candidate $candidate;

    public function __construct(Candidate $candidate)
    {
        $this->candidate = $candidate;
    }

    public function build()
    {
        return $this
            ->subject('Reminder: Please update your CV')
            ->view('emails.remind-update-cv');
    }
}
