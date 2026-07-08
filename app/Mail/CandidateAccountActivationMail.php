<?php

namespace App\Mail;

use App\Models\Candidate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidateAccountActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Candidate $candidate,
        public string $activationUrl,
        public string $expiresAt
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Kích hoạt tài khoản ứng viên - ' . config('app.name')
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.candidate-account-activation',
            with: [
                'candidate' => $this->candidate,
                'activationUrl' => $this->activationUrl,
                'expiresAt' => $this->expiresAt,
            ],
        );
    }
}
