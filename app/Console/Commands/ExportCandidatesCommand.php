<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CandidateExport;
use App\Models\User;
use App\Notifications\ExportCompletedNotification;

class ExportCandidatesCommand extends Command
{
    /**
     * Command name
     */
    protected $signature = 'candidates:export';

    /**
     * Command description
     */
    protected $description = 'Export all candidates to Excel';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Excel::store(
            new CandidateExport(),
            'exports/candidates.xlsx',
            'public'
        );
        $user = User::first();

        if ($user) {
            $user->notify(new ExportCompletedNotification());
        }

        $this->info('Candidate export completed.');

        return self::SUCCESS;
    }
}
