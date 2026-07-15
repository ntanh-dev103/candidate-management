<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCandidateRequest extends FormRequest
{
    /**
     * Chuẩn hóa dữ liệu trước khi validate
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'email' => $this->filled('email')
                ? strtolower(trim((string) $this->input('email')))
                : null,

            'skill_ids' => $this->input('skill_ids', []),
        ]);
    }

    /**
     * Cho phép request được thực thi
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        $candidate = $this->route('candidate');

        return [

            // ==========================================
            // BASIC INFORMATION
            // ==========================================

            'full_name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('candidates', 'email')
                    ->ignore($candidate),
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Applied',
                    'Interview',
                    'Hired',
                    'Rejected',
                ]),
            ],

            // ==========================================
            // PERSONAL INFORMATION
            // ==========================================

            'date_of_birth' => [
                'nullable',
                'date',
            ],

            'gender' => [
                'nullable',
                Rule::in([
                    'male',
                    'female',
                    'other',
                ]),
            ],

            'avatar_base64' => [
                'nullable',
                'string',
            ],

            'address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'current_country' => [
                'nullable',
                Rule::in([
                    'VN',
                    'JP',
                    'KR',
                    'TW',
                    'DE',
                ]),
            ],

            // ==========================================
            // PROFESSIONAL PROFILE
            // ==========================================

            'headline' => [
                'nullable',
                'string',
                'max:255',
            ],

            'experience_years' => [
                'nullable',
                'integer',
                'min:0',
                'max:50',
            ],

            'education_level' => [
                'nullable',
                Rule::in([
                    'high_school',
                    'college',
                    'bachelor',
                    'master',
                ]),
            ],

            'current_job_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            // ==========================================
            // SKILLS
            // ==========================================
            // Cho phép:
            // skill_ids[] = 1       -> Skill đã có
            // skill_ids[] = Laravel -> Skill mới từ Tom Select

            'skill_ids' => [
                'nullable',
                'array',
            ],

            'skill_ids.*' => [
                'nullable',
                'string',
                'max:255',
            ],

            // ==========================================
            // LANGUAGES
            // ==========================================

            'languages' => [
                'nullable',
                'string',
                'max:255',
            ],

            // ==========================================
            // CV
            // ==========================================

            'cv_url' => [
                'nullable',
                'string',
                'max:255',
            ],

            // ==========================================
            // CAREER GOAL
            // ==========================================

            'desired_country' => [
                'nullable',
                Rule::in([
                    'JP',
                    'KR',
                    'DE',
                    'TW',
                ]),
            ],

            'desired_job_type' => [
                'nullable',
                Rule::in([
                    'full_time',
                    'part_time',
                    'contract',
                ]),
            ],

            'desired_salary_min' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'desired_salary_currency' => [
                'nullable',
                Rule::in([
                    'JPY',
                    'VND',
                    'USD',
                ]),
            ],

            // ==========================================
            // ACCOUNT
            // ==========================================

            'is_profile_complete' => [
                'nullable',
                'boolean',
            ],
        ];
    }
}
