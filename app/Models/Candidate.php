<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [

    // Basic
    'full_name',
    'email',
    'phone',
    'status',

    // Personal
    'date_of_birth',
    'gender',
    'avatar_url',
    'address',
    'current_country',

    // Professional
    'headline',
    'experience_years',
    'education_level',
    'current_job_title',
    'cv_url',

    // Career
    'desired_country',
    'desired_job_type',
    'desired_salary_min',
    'desired_salary_currency',

    // Account
    'is_profile_complete',
    'last_active_at'

];
protected $casts = [

    'date_of_birth'=>'date',

    'last_active_at'=>'datetime',

    'is_profile_complete'=>'boolean',

];
}