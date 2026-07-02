<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCandidateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $candidate = $this->route('candidate');

        return [
            'full_name' => 'required|max:255',

            'email' => [
                'required',
                'email',
                Rule::unique('candidates')->ignore($candidate),
            ],

            'phone' => 'required',

            'status' => 'required',
        ];
    }
}