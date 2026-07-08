<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class CandidateAccountCreated
{
    use Dispatchable;

    public function __construct(public int $candidateId)
    {
    }
}
