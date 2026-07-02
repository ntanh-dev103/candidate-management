<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|max:255',
            'email'     => 'required|email|unique:candidates,email',
            'phone'     => 'required',
            'status'    => 'required',
        ];
    }
}