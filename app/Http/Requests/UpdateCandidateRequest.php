<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCandidateRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'email' => $this->filled('email') ? strtolower(trim((string) $this->input('email'))) : null,
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        $candidate = $this->route('candidate');

        return [

            // Basic
            'full_name' => 'required|max:255',

            'email' => [
                'required',
                'email',
                Rule::unique('candidates')->ignore($candidate),
            ],

            'phone' => 'required|max:20',

            'status' => 'required|in:Applied,Interview,Hired,Rejected',

            // Personal
            'date_of_birth' => 'nullable|date',

            'gender' => 'nullable|in:male,female,other',

            'avatar_base64' => 'nullable|string',

            'address' => 'nullable|string|max:255',

            'current_country' => 'nullable|in:VN,JP,KR,TW,DE',

            // Professional
            'headline' => 'nullable|string|max:255',

            'experience_years' => 'nullable|integer|min:0|max:50',

            'education_level' => 'nullable|in:high_school,college,bachelor,master',

            'current_job_title' => 'nullable|string|max:255',

            'skills' => 'nullable|string',

            'languages' => 'nullable|string|max:255',

            'cv_url' => 'nullable|string|max:255',

            // Career
            'desired_country' => 'nullable|in:JP,KR,DE,TW',

            'desired_job_type' => 'nullable|in:full_time,part_time,contract',

            'desired_salary_min' => 'nullable|numeric|min:0',

            'desired_salary_currency' => 'nullable|in:JPY,VND,USD',

            // Account
            'is_profile_complete' => 'nullable|boolean',

        ];
    }
}
