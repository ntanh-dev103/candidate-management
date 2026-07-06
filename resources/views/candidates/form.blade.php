<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">

        <h5 class="mb-0">
            Personal Information
        </h5>

    </div>
    <div class="card shadow-sm mb-4">

        <div class="card-header bg-success text-white">

            <h5 class="mb-0">

                Professional Profile

            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <!-- Headline -->

                <div class="col-md-12 mb-3">

                    <label class="form-label">

                        Headline

                    </label>

                    <input type="text" name="headline" class="form-control"
                        value="{{ old('headline', $candidate->headline ?? '') }}">

                </div>

                <!-- Experience -->

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Experience (Years)

                    </label>

                    <input type="number" min="0" max="50" name="experience_years" class="form-control"
                        value="{{ old('experience_years', $candidate->experience_years ?? 0) }}">

                </div>

                <!-- Education -->

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Education

                    </label>

                    <select name="education_level" class="form-select">

                        <option value="">Choose</option>

                        <option value="high_school"
                            {{ old('education_level', $candidate->education_level ?? '') == 'high_school' ? 'selected' : '' }}>
                            High School
                        </option>

                        <option value="college"
                            {{ old('education_level', $candidate->education_level ?? '') == 'college' ? 'selected' : '' }}>
                            College
                        </option>

                        <option value="bachelor"
                            {{ old('education_level', $candidate->education_level ?? '') == 'bachelor' ? 'selected' : '' }}>
                            Bachelor
                        </option>

                        <option value="master"
                            {{ old('education_level', $candidate->education_level ?? '') == 'master' ? 'selected' : '' }}>
                            Master
                        </option>

                    </select>

                </div>

                <!-- Current Job -->

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Current Job Title

                    </label>

                    <input type="text" name="current_job_title" class="form-control"
                        value="{{ old('current_job_title', $candidate->current_job_title ?? '') }}">

                </div>

                <!-- Upload CV -->

                <div class="mb-3">

                    <label>CV</label>

                    <input type="file" name="cv" class="form-control">

                </div>

            </div>

        </div>

    </div>
    <div class="card shadow-sm mb-4">

        <div class="card-header bg-warning">

            <h5 class="mb-0">

                Career Goal

            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label class="form-label">

                        Desired Country

                    </label>

                    <select name="desired_country" class="form-select">

                        <option value="" {{ old('desired_country', $candidate->desired_country ?? '') == '' ? 'selected' : '' }}>Choose</option>

                        <option value="JP" {{ old('desired_country', $candidate->desired_country ?? '') == 'JP' ? 'selected' : '' }}>Japan</option>

                        <option value="KR" {{ old('desired_country', $candidate->desired_country ?? '') == 'KR' ? 'selected' : '' }}>Korea</option>

                        <option value="DE" {{ old('desired_country', $candidate->desired_country ?? '') == 'DE' ? 'selected' : '' }}>Germany</option>

                        <option value="TW" {{ old('desired_country', $candidate->desired_country ?? '') == 'TW' ? 'selected' : '' }}>Taiwan</option>

                    </select>

                </div>

                <div class="col-md-4 mb-3">

                    <label class="form-label">

                        Job Type

                    </label>

                    <select name="desired_job_type" class="form-select">

                        <option value="" {{ old('desired_job_type', $candidate->desired_job_type ?? '') == '' ? 'selected' : '' }}>Choose</option>

                        <option value="full_time" {{ old('desired_job_type', $candidate->desired_job_type ?? '') == 'full_time' ? 'selected' : '' }}>Full Time</option>

                        <option value="part_time" {{ old('desired_job_type', $candidate->desired_job_type ?? '') == 'part_time' ? 'selected' : '' }}>Part Time</option>

                        <option value="contract" {{ old('desired_job_type', $candidate->desired_job_type ?? '') == 'contract' ? 'selected' : '' }}>Contract</option>

                    </select>

                </div>

                <div class="col-md-2 mb-3">

                    <label class="form-label">

                        Salary

                    </label>

                    <input type="number" name="desired_salary_min" class="form-control"
                        value="{{ old('desired_salary_min', $candidate->desired_salary_min ?? '') }}">

                </div>

                <div class="col-md-2 mb-3">

                    <label class="form-label">

                        Currency

                    </label>

                    <select name="desired_salary_currency" class="form-select">

                        <option value="JPY" {{ old('desired_salary_currency', $candidate->desired_salary_currency ?? 'JPY') == 'JPY' ? 'selected' : '' }}>JPY</option>

                        <option value="USD" {{ old('desired_salary_currency', $candidate->desired_salary_currency ?? '') == 'USD' ? 'selected' : '' }}>USD</option>

                        <option value="VND" {{ old('desired_salary_currency', $candidate->desired_salary_currency ?? '') == 'VND' ? 'selected' : '' }}>VND</option>

                    </select>

                </div>

            </div>

        </div>

    </div>
    <div class="card shadow-sm mb-4">

        <div class="card-header bg-dark text-white">

            <h5 class="mb-0">

                Account

            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Status

                    </label>

                    <select name="status" class="form-select">

                        <option value="Applied" {{ old('status', $candidate->status ?? '') == 'Applied' ? 'selected' : '' }}>Applied</option>

                        <option value="Interview" {{ old('status', $candidate->status ?? '') == 'Interview' ? 'selected' : '' }}>Interview</option>

                        <option value="Hired" {{ old('status', $candidate->status ?? '') == 'Hired' ? 'selected' : '' }}>Hired</option>

                        <option value="Rejected" {{ old('status', $candidate->status ?? '') == 'Rejected' ? 'selected' : '' }}>Rejected</option>

                    </select>

                </div>

                <div class="col-md-6 d-flex align-items-center">

                    <div class="form-check mt-4">

                        <input type="checkbox" class="form-check-input" name="is_profile_complete" value="1" {{ old('is_profile_complete', $candidate->is_profile_complete ?? false) ? 'checked' : '' }}>

                        <label class="form-check-label">

                            Profile Completed

                        </label>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="card-body">

        <div class="row">

            <!-- Full Name -->

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Full Name
                </label>

                <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror"
                    value="{{ old('full_name', $candidate->full_name ?? '') }}">

                @error('full_name')
                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>
                @enderror

            </div>

            <!-- Email -->

            <div class="col-md-6 mb-3">

                <label class="form-label">

                    Email

                </label>

                <input type="email" name="email" class="form-control"
                    value="{{ old('email', $candidate->email ?? '') }}">

            </div>

            <!-- Phone -->

            <div class="col-md-6 mb-3">

                <label class="form-label">

                    Phone

                </label>

                <input type="text" name="phone" class="form-control"
                    value="{{ old('phone', $candidate->phone ?? '') }}">

            </div>

            <!-- Birthday -->

            <div class="col-md-6 mb-3">

                <label class="form-label">

                    Date Of Birth

                </label>

                <input type="date" name="date_of_birth" class="form-control"
                    value="{{ old('date_of_birth', $candidate->date_of_birth ?? '') }}">

            </div>

            <!-- Gender -->

            <div class="col-md-6 mb-3">

                <label class="form-label">

                    Gender

                </label>

                <select name="gender" class="form-select">

                    <option value="" {{ old('gender', $candidate->gender ?? '') == '' ? 'selected' : '' }}>Choose</option>

                    <option value="male" {{ old('gender', $candidate->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>

                    <option value="female" {{ old('gender', $candidate->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>

                    <option value="other" {{ old('gender', $candidate->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>

                </select>

            </div>

            <!-- Avatar -->

            <div class="mb-3">

                <label>Avatar</label>

                <input type="file" name="avatar" class="form-control">

            </div>
            <!-- Address -->

            <div class="col-md-6 mb-3">

                <label class="form-label">

                    Address

                </label>

                <textarea name="address" class="form-control" rows="3">{{ old('address', $candidate->address ?? '') }}</textarea>

            </div>

            <!-- Current Country -->

            <div class="col-md-6 mb-3">

                <label class="form-label">

                    Current Country

                </label>

                <select name="current_country" class="form-select">

                    <option value="VN" {{ old('current_country', $candidate->current_country ?? '') == 'VN' ? 'selected' : '' }}>Vietnam</option>
                    <option value="JP" {{ old('current_country', $candidate->current_country ?? '') == 'JP' ? 'selected' : '' }}>Japan</option>
                    <option value="KR" {{ old('current_country', $candidate->current_country ?? '') == 'KR' ? 'selected' : '' }}>Korea</option>
                    <option value="TW" {{ old('current_country', $candidate->current_country ?? '') == 'TW' ? 'selected' : '' }}>Taiwan</option>
                    <option value="DE" {{ old('current_country', $candidate->current_country ?? '') == 'DE' ? 'selected' : '' }}>Germany</option>

                </select>

            </div>
            <div class="mb-3">

                <label class="form-label">

                    Skills

                </label>

                <textarea name="skills" class="form-control" rows="2" placeholder="Java, Laravel, Docker">{{ old('skills', $candidate->skills ?? '') }}</textarea>

                <small class="text-muted">
                    Nhập các kỹ năng, ngăn cách bằng dấu phẩy.
                </small>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Languages

                </label>

                <input type="text" name="languages" class="form-control"
                    value="{{ old('languages', $candidate->languages ?? '') }}" placeholder="Vietnamese, English">

            </div>
        </div>

    </div>

</div>
