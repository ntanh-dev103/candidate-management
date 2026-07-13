<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'email' => $this->filled('email') ? strtolower(trim((string) $this->input('email'))) : null,
        ]);
    }

    /**
     * Authorize the request.
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
        return [

            /*
            |--------------------------------------------------------------------------
            | Basic
            |--------------------------------------------------------------------------
            */

            'full_name' => 'required|string|max:255',

            'email' => 'required|email|unique:candidates,email',

            'phone' => 'required|string|max:20',

            'status' => 'required|in:Applied,Interview,Hired,Rejected',


            /*
            |--------------------------------------------------------------------------
            | Personal
            |--------------------------------------------------------------------------
            */

            'date_of_birth' => 'nullable|date',

            'gender' => 'nullable|in:male,female,other',

            'avatar_base64' => 'nullable|string',

            'address' => 'nullable|string|max:255',

            'current_country' => 'nullable|in:VN,JP,KR,TW,DE',


            /*
            |--------------------------------------------------------------------------
            | Professional
            |--------------------------------------------------------------------------
            */

            'headline' => 'nullable|string|max:255',

            'experience_years' => 'nullable|integer|min:0|max:50',

            'education_level' => 'nullable|in:high_school,college,bachelor,master',

            'current_job_title' => 'nullable|string|max:255',

            'skills' => 'nullable|string',

            'languages' => 'nullable|string|max:255',

            'cv_url' => 'nullable|string|max:255',


            /*
            |--------------------------------------------------------------------------
            | Career Goal
            |--------------------------------------------------------------------------
            */

            'desired_country' => 'nullable|in:JP,KR,DE,TW',

            'desired_job_type' => 'nullable|in:full_time,part_time,contract',

            'desired_salary_min' => 'nullable|numeric|min:0',

            'desired_salary_currency' => 'nullable|in:JPY,VND,USD',


            /*
            |--------------------------------------------------------------------------
            | Account
            |--------------------------------------------------------------------------
            */

            'is_profile_complete' => 'nullable|boolean',

        ];
    }
/**
 * Custom Validation Messages
 */
public function messages(): array
{
    return [
        /*
        |--------------------------------------------------------------------------
        | Basic
        |--------------------------------------------------------------------------
        */

        'full_name.required' => 'Họ và tên là bắt buộc.',
        'full_name.string' => 'Họ và tên phải là chuỗi.',
        'full_name.max' => 'Họ và tên không được vượt quá 255 ký tự.',

        'email.required' => 'Email là bắt buộc.',
        'email.email' => 'Email không đúng định dạng.',
        'email.unique' => 'Email đã tồn tại.',

        'phone.required' => 'Số điện thoại là bắt buộc.',
        'phone.string' => 'Số điện thoại phải là chuỗi.',
        'phone.max' => 'Số điện thoại không được vượt quá 20 ký tự.',

        'status.required' => 'Vui lòng chọn trạng thái.',
        'status.in' => 'Trạng thái không hợp lệ.',

        /*
        |--------------------------------------------------------------------------
        | Personal
        |--------------------------------------------------------------------------
        */

        'date_of_birth.date' => 'Ngày sinh không đúng định dạng.',

        'gender.in' => 'Giới tính không hợp lệ.',

        'avatar_base64.string' => 'Ảnh đại diện không hợp lệ.',

        'address.string' => 'Địa chỉ phải là chuỗi.',
        'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',

        'current_country.in' => 'Quốc gia hiện tại không hợp lệ.',

        /*
        |--------------------------------------------------------------------------
        | Professional
        |--------------------------------------------------------------------------
        */

        'headline.string' => 'Tiêu đề nghề nghiệp phải là chuỗi.',
        'headline.max' => 'Tiêu đề nghề nghiệp không được vượt quá 255 ký tự.',

        'experience_years.integer' => 'Số năm kinh nghiệm phải là số nguyên.',
        'experience_years.min' => 'Số năm kinh nghiệm phải lớn hơn hoặc bằng 0.',
        'experience_years.max' => 'Số năm kinh nghiệm không được vượt quá 50 năm.',

        'education_level.in' => 'Trình độ học vấn không hợp lệ.',

        'current_job_title.string' => 'Chức danh hiện tại phải là chuỗi.',
        'current_job_title.max' => 'Chức danh hiện tại không được vượt quá 255 ký tự.',

        'skills.string' => 'Kỹ năng phải là chuỗi.',

        'languages.string' => 'Ngôn ngữ phải là chuỗi.',
        'languages.max' => 'Ngôn ngữ không được vượt quá 255 ký tự.',

        'cv_url.string' => 'Đường dẫn CV không hợp lệ.',
        'cv_url.max' => 'Đường dẫn CV không được vượt quá 255 ký tự.',

        /*
        |--------------------------------------------------------------------------
        | Career Goal
        |--------------------------------------------------------------------------
        */

        'desired_country.in' => 'Quốc gia mong muốn không hợp lệ.',

        'desired_job_type.in' => 'Loại công việc mong muốn không hợp lệ.',

        'desired_salary_min.numeric' => 'Mức lương mong muốn phải là số.',
        'desired_salary_min.min' => 'Mức lương mong muốn phải lớn hơn hoặc bằng 0.',

        'desired_salary_currency.in' => 'Đơn vị tiền tệ không hợp lệ.',

        /*
        |--------------------------------------------------------------------------
        | Account
        |--------------------------------------------------------------------------
        */

        'is_profile_complete.boolean' => 'Trạng thái hoàn thành hồ sơ không hợp lệ.',
    ];
}

}
