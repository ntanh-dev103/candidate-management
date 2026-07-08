<?php

namespace App\Listeners;

use App\Events\CandidateAccountCreated;
use App\Mail\CandidateAccountActivationMail;
use App\Models\Candidate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SendAccountActivationMail implements ShouldQueue
{
    use Queueable;

    public function handle(CandidateAccountCreated $event): void
    {
        $candidate = Candidate::query()->find($event->candidateId);

        if (! $candidate) {
            return;
        }

        $expiresAt = now()->addMinutes(5);
        $activationUrl = URL::temporarySignedRoute(
            'candidates.activate',
            $expiresAt,
            ['candidate' => $candidate->id]
        );

        $candidate->forceFill([
            'activation_sent_at' => now(),
        ])->save();

        Mail::to($candidate->email)->send(
            new CandidateAccountActivationMail(
                candidate: $candidate,
                activationUrl: $activationUrl,
                expiresAt: $expiresAt->format('d/m/Y H:i:s')
            )
        );
    }
}
