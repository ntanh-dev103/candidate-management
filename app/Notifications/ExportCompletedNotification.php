<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ExportCompletedNotification extends Notification
{
    use Queueable;

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'title' => 'Export completed',
            'message' => 'Candidate Excel export completed successfully.',
            'file' => 'storage/exports/candidates.xlsx',
        ];
    }
}
