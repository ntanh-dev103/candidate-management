<?php

namespace App\Http\Controllers;

use App\Models\Candidate;

class CandidateActivationController extends Controller
{
    public function __invoke(Candidate $candidate)
    {
        if (! $candidate->activated_at) {
            $candidate->forceFill([
                'activated_at' => now(),
            ])->save();
        }

        return view('candidates.activation-success', [
            'candidate' => $candidate->fresh(),
        ]);
    }
}
