<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [

        'full_name',
        'email',
        'phone',
        'status',

        'date_of_birth',
        'gender',
        'avatar_url',
        'address',
        'current_country',

        'headline',
        'experience_years',
        'education_level',
        'current_job_title',
        'cv_url',

        'desired_country',
        'desired_job_type',
        'desired_salary_min',
        'desired_salary_currency',

        'is_profile_complete',
        'last_active_at',
        'rating',
        'skills',

        'languages',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'experience_years' => 'integer',
        'desired_salary_min' => 'decimal:2',
        'is_profile_complete' => 'boolean',
        'last_active_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::deleting(function (Candidate $candidate) {
            if ($candidate->avatar_url) {
                Storage::disk('public')->delete($candidate->avatar_url);
            }

            if ($candidate->cv_url) {
                Storage::disk('public')->delete($candidate->cv_url);
            }
        });
    }
}
