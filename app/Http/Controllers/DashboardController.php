<?php

namespace App\Http\Controllers;

use App\Models\Candidate;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Candidate::count();
        $completedProfile = Candidate::where(
            'is_profile_complete',
            true
        )->count();

        $applied = Candidate::where('status', 'Applied')->count();

        $interview = Candidate::where('status', 'Interview')->count();

        $hired = Candidate::where('status', 'Hired')->count();

        $rejected = Candidate::where('status', 'Rejected')->count();

        $latestCandidates = Candidate::latest()
            ->take(5)
            ->get();

        return view(
            'dashboard',
            compact(
                'total',
                'applied',
                'interview',
                'hired',
                'rejected',
                'latestCandidates',
                'completedProfile'
            )
        );
    }
}
