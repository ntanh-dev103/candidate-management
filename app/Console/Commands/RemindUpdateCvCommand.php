<?php

namespace App\Console\Commands;

use App\Mail\CandidateReminderMail;
use App\Models\Candidate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class RemindUpdateCvCommand extends Command
{
    protected $signature = 'candidates:remind-update-cv';

    protected $description =
        'Send reminder emails to candidates without CV';

    public function handle()
    {
        $this->info('Start reminding candidates...');

        // Đếm số email gửi thành công
        $count = 0;

        // Lấy Candidate chưa có CV
        $candidates = Candidate::query()
            ->whereNull('cv_url')
            ->get();

        // Không có Candidate phù hợp
        if ($candidates->isEmpty()) {

            $this->warn(
                'No candidates without CV found.'
            );

            return Command::SUCCESS;
        }

        // Gửi mail
        foreach ($candidates as $candidate) {

            try {

                Mail::to($candidate->email)
                    ->send(
                        new CandidateReminderMail($candidate)
                    );

                $count++;

                $this->info(
                    "✓ Sent: {$candidate->email}"
                );

            } catch (\Throwable $e) {

                $this->error(
                    "✗ Failed: {$candidate->email}"
                );

                $this->error(
                    $e->getMessage()
                );
            }
        }

        // Tổng kết
        $this->newLine();

        $this->info("--------------------------------");

        $this->info(
            "Total emails sent: {$count}"
        );

        $this->info(
            "Command completed successfully."
        );

        return Command::SUCCESS;
    }
}
