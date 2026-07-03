<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    protected $model = \App\Models\Candidate::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

    'full_name'=>fake()->name(),

    'email'=>fake()->unique()->safeEmail(),

    'phone'=>fake()->numerify('09########'),

    'status'=>fake()->randomElement([
        'Applied',
        'Interview',
        'Hired',
        'Rejected'
    ]),

    'date_of_birth'=>fake()->date(),

    'gender'=>fake()->randomElement([
        'male',
        'female',
        'other'
    ]),

    'avatar_url'=>null,

    'address'=>fake()->address(),

    'current_country'=>fake()->randomElement([
        'VN',
        'JP',
        'KR',
        'TW'
    ]),

    'headline'=>fake()->sentence(),

    'experience_years'=>fake()->numberBetween(0,10),

    'education_level'=>fake()->randomElement([
        'high_school',
        'college',
        'bachelor',
        'master'
    ]),

    'current_job_title'=>fake()->jobTitle(),

    'cv_url'=>null,

    'desired_country'=>fake()->randomElement([
        'JP',
        'KR',
        'DE',
        'TW'
    ]),

    'desired_job_type'=>fake()->randomElement([
        'full_time',
        'part_time',
        'contract'
    ]),

    'desired_salary_min'=>fake()->numberBetween(
        800,
        5000
    ),

    'desired_salary_currency'=>fake()->randomElement([
        'JPY',
        'USD',
        'VND'
    ]),

    'is_profile_complete'=>fake()->boolean(),

    'last_active_at'=>now()

];
    }
}
