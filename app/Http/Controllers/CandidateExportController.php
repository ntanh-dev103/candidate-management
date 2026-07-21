<?php

namespace App\Http\Controllers;

use App\Jobs\ExportCandidatesJob;

class CandidateExportController extends Controller
{
    public function export()
    {
        ExportCandidatesJob::dispatch();

        return back()->with(
            'success',
            'Export has been added to queue.'
        );
    }
}
