<?php

namespace App\Jobs;

use App\Models\Candidate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GenerateCandidateAvatarJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected Candidate $candidate;

    public function __construct(Candidate $candidate)
    {
        $this->candidate = $candidate;
    }

    public function handle(): void
    {
        // Nếu đã có avatar thì không làm gì
        if (!empty($this->candidate->avatar_url)) {
            return;
        }

        // Link DiceBear
        $url = 'https://api.dicebear.com/9.x/initials/png?seed='
            . urlencode($this->candidate->full_name);

        // Download ảnh
        $response = Http::get($url);

        if (!$response->successful()) {
            return;
        }

        // Tên file
        $filename = 'avatars/' . Str::uuid() . '.png';

        // Lưu storage
        Storage::disk('public')->put(
            $filename,
            $response->body()
        );

        // Update database
        $this->candidate->update([
            'avatar_url' => $filename,
        ]);
    }
}
