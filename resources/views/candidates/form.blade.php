{{-- =========================================================
    PERSONAL INFORMATION
========================================================== --}}
<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Personal Information</h5>
    </div>

    <div class="card-body">

        <div class="row">

            {{-- Full Name --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Full Name
                    <span class="text-danger">*</span>
                </label>

                <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror"
                    value="{{ old('full_name', $candidate->full_name ?? '') }}">

                @error('full_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Email --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Email
                    <span class="text-danger">*</span>
                </label>

                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $candidate->email ?? '') }}">

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Phone --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Phone
                    <span class="text-danger">*</span>
                </label>

                <input type="text" name="phone" class="form-control"
                    value="{{ old('phone', $candidate->phone ?? '') }}">

            </div>


            {{-- Date Of Birth --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Date Of Birth
                </label>

                <input id="date_of_birth" type="text" name="date_of_birth" class="form-control"
                    value="{{ old(
                        'date_of_birth',
                        isset($candidate) && $candidate->date_of_birth ? $candidate->date_of_birth->format('Y-m-d') : '',
                    ) }}"
                    placeholder="YYYY-MM-DD">

            </div>


            {{-- Gender --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Gender
                </label>

                <select name="gender" class="form-select js-tom-select">

                    <option value="">
                        Choose
                    </option>

                    <option value="male" @selected(old('gender', $candidate->gender ?? '') === 'male')>
                        Male
                    </option>

                    <option value="female" @selected(old('gender', $candidate->gender ?? '') === 'female')>
                        Female
                    </option>

                    <option value="other" @selected(old('gender', $candidate->gender ?? '') === 'other')>
                        Other
                    </option>

                </select>

            </div>


            {{-- Current Country --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Current Country
                </label>

                <select name="current_country" class="form-select js-tom-select">

                    <option value="">
                        Choose
                    </option>

                    <option value="VN" @selected(old('current_country', $candidate->current_country ?? '') === 'VN')>
                        Vietnam
                    </option>

                    <option value="JP" @selected(old('current_country', $candidate->current_country ?? '') === 'JP')>
                        Japan
                    </option>

                    <option value="KR" @selected(old('current_country', $candidate->current_country ?? '') === 'KR')>
                        Korea
                    </option>

                    <option value="TW" @selected(old('current_country', $candidate->current_country ?? '') === 'TW')>
                        Taiwan
                    </option>

                    <option value="DE" @selected(old('current_country', $candidate->current_country ?? '') === 'DE')>
                        Germany
                    </option>

                </select>

            </div>


            {{-- Address --}}
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Address
                </label>

                <textarea name="address" class="form-control" rows="3">{{ old('address', $candidate->address ?? '') }}</textarea>

            </div>


            {{-- Avatar --}}
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Avatar
                </label>

                <input id="avatarInput" type="file" accept="image/*" class="form-control">

                <input id="avatarBase64" type="hidden" name="avatar_base64" value="{{ old('avatar_base64', '') }}">


                <div class="mt-3 d-flex align-items-center gap-3 flex-wrap">

                    <img id="avatarPreview"
                        src="{{ old('avatar_base64')
                            ? old('avatar_base64')
                            : (!empty($candidate->avatar_url)
                                ? Storage::url($candidate->avatar_url)
                                : '') }}"
                        alt="Avatar preview"
                        style="
                            width: 96px;
                            height: 96px;
                            object-fit: cover;
                            border-radius: 50%;
                            border: 1px solid #ddd;
                            {{ old('avatar_base64') || !empty($candidate->avatar_url) ? '' : 'display: none;' }}
                        ">

                    <small class="text-muted" id="avatarHint">
                        {{ !empty($candidate->avatar_url)
                            ? 'Dang hien thi avatar hien tai. Chon anh moi de crop va thay the.'
                            : 'Chua co avatar.' }}
                    </small>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
    PROFESSIONAL PROFILE
========================================================== --}}
<div class="card shadow-sm mb-4">

    <div class="card-header bg-success text-white">
        <h5 class="mb-0">
            Professional Profile
        </h5>
    </div>


    <div class="card-body">

        <div class="row">

            {{-- Headline --}}
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    Headline
                </label>

                <input type="text" name="headline" class="form-control"
                    value="{{ old('headline', $candidate->headline ?? '') }}">

            </div>


            {{-- Experience --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Experience (Years)
                </label>

                <input type="number" min="0" max="50" name="experience_years" class="form-control"
                    value="{{ old('experience_years', $candidate->experience_years ?? 0) }}">

            </div>


            {{-- Education --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Education
                </label>

                <select name="education_level" class="form-select js-tom-select">

                    <option value="">
                        Choose
                    </option>

                    <option value="high_school" @selected(old('education_level', $candidate->education_level ?? '') === 'high_school')>
                        High School
                    </option>

                    <option value="college" @selected(old('education_level', $candidate->education_level ?? '') === 'college')>
                        College
                    </option>

                    <option value="bachelor" @selected(old('education_level', $candidate->education_level ?? '') === 'bachelor')>
                        Bachelor
                    </option>

                    <option value="master" @selected(old('education_level', $candidate->education_level ?? '') === 'master')>
                        Master
                    </option>

                </select>

            </div>


            {{-- Current Job Title --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Current Job Title
                </label>

                <input type="text" name="current_job_title" class="form-control"
                    value="{{ old('current_job_title', $candidate->current_job_title ?? '') }}">

            </div>


            {{-- =================================================
                SKILLS - TOM SELECT MULTIPLE
            ================================================== --}}
            <div class="col-md-6 mb-3">

                <label for="skillsInput" class="form-label">
                    Skills
                </label>

                @php
                    /*
        |--------------------------------------------------------------------------
        | Lấy danh sách skill đã chọn
        |--------------------------------------------------------------------------
        | Create:
        | - Lấy từ old('skills')
        |
        | Edit:
        | - Lấy tên skill hiện tại của Candidate
        */
                    $selectedSkills = old(
                        'skills',
                        isset($candidate) && $candidate->exists ? $candidate->skills->pluck('name')->toArray() : [],
                    );
                @endphp

                <select id="skillsInput" name="skills[]" multiple autocomplete="off"
                    placeholder="Select or create skills...">

                    {{-- Danh sách skill đã có trong database --}}
                    @foreach ($skills as $skill)
                        <option value="{{ $skill->name }}" @selected(in_array($skill->name, $selectedSkills, true))>
                            {{ $skill->name }}
                        </option>
                    @endforeach

                </select>


                {{-- Validation lỗi của mảng skills --}}
                @error('skills')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror


                {{-- Validation lỗi từng skill --}}
                @error('skills.*')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Languages --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Languages
                </label>

                <input id="languagesInput" type="text" name="languages" class="form-control"
                    value="{{ old('languages', $candidate->languages ?? '') }}"
                    placeholder="Vietnamese, English">

            </div>


            {{-- CV --}}
            <div class="col-md-12 mb-3">

                <label class="form-label">
                    CV (PDF, max 5MB)
                </label>

                <input id="cvFilepond" name="file" type="file" class="form-control">

                <input id="cvPath" type="hidden" name="cv_url"
                    value="{{ old('cv_url', $candidate->cv_url ?? '') }}">

                <small id="cvUploadHint" class="text-muted d-block mt-2">
                    {{ !empty($candidate->cv_url) ? 'CV hien tai: ' . basename($candidate->cv_url) : 'Chua co CV.' }}
                </small>


                @if (!empty($candidate->cv_url))
                    <a class="d-inline-block mt-1" href="{{ Storage::url($candidate->cv_url) }}" target="_blank"
                        rel="noopener">
                        Xem CV da upload
                    </a>
                @endif

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
    CAREER GOAL
========================================================== --}}
<div class="card shadow-sm mb-4">

    <div class="card-header bg-warning">
        <h5 class="mb-0">
            Career Goal
        </h5>
    </div>


    <div class="card-body">

        <div class="row">

            {{-- Desired Country --}}
            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Desired Country
                </label>

                <select name="desired_country" class="form-select js-tom-select">

                    <option value="">
                        Choose
                    </option>

                    <option value="JP" @selected(old('desired_country', $candidate->desired_country ?? '') === 'JP')>
                        Japan
                    </option>

                    <option value="KR" @selected(old('desired_country', $candidate->desired_country ?? '') === 'KR')>
                        Korea
                    </option>

                    <option value="DE" @selected(old('desired_country', $candidate->desired_country ?? '') === 'DE')>
                        Germany
                    </option>

                    <option value="TW" @selected(old('desired_country', $candidate->desired_country ?? '') === 'TW')>
                        Taiwan
                    </option>

                </select>

            </div>


            {{-- Job Type --}}
            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Job Type
                </label>

                <select name="desired_job_type" class="form-select js-tom-select">

                    <option value="">
                        Choose
                    </option>

                    <option value="full_time" @selected(old('desired_job_type', $candidate->desired_job_type ?? '') === 'full_time')>
                        Full Time
                    </option>

                    <option value="part_time" @selected(old('desired_job_type', $candidate->desired_job_type ?? '') === 'part_time')>
                        Part Time
                    </option>

                    <option value="contract" @selected(old('desired_job_type', $candidate->desired_job_type ?? '') === 'contract')>
                        Contract
                    </option>

                </select>

            </div>


            {{-- Salary --}}
            <div class="col-md-2 mb-3">

                <label class="form-label">
                    Salary
                </label>

                <input type="number" name="desired_salary_min" class="form-control"
                    value="{{ old('desired_salary_min', $candidate->desired_salary_min ?? '') }}">

            </div>


            {{-- Currency --}}
            <div class="col-md-2 mb-3">

                <label class="form-label">
                    Currency
                </label>

                <select name="desired_salary_currency" class="form-select js-tom-select">

                    <option value="JPY" @selected(old('desired_salary_currency', $candidate->desired_salary_currency ?? 'JPY') === 'JPY')>
                        JPY
                    </option>

                    <option value="USD" @selected(old('desired_salary_currency', $candidate->desired_salary_currency ?? '') === 'USD')>
                        USD
                    </option>

                    <option value="VND" @selected(old('desired_salary_currency', $candidate->desired_salary_currency ?? '') === 'VND')>
                        VND
                    </option>

                </select>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
    ACCOUNT
========================================================== --}}
<div class="card shadow-sm mb-4">

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">
            Account
        </h5>
    </div>


    <div class="card-body">

        <div class="row">

            {{-- Status --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Status
                    <span class="text-danger">*</span>
                </label>

                <select name="status" class="form-select js-tom-select">

                    <option value="Applied" @selected(old('status', $candidate->status ?? '') === 'Applied')>
                        Applied
                    </option>

                    <option value="Interview" @selected(old('status', $candidate->status ?? '') === 'Interview')>
                        Interview
                    </option>

                    <option value="Hired" @selected(old('status', $candidate->status ?? '') === 'Hired')>
                        Hired
                    </option>

                    <option value="Rejected" @selected(old('status', $candidate->status ?? '') === 'Rejected')>
                        Rejected
                    </option>

                </select>

            </div>


            {{-- Profile Complete --}}
            <div class="col-md-6 d-flex align-items-end mb-3">

                <div class="form-check">

                    <input type="hidden" name="is_profile_complete" value="0">

                    <input id="is_profile_complete" type="checkbox" class="form-check-input"
                        name="is_profile_complete" value="1" @checked(old('is_profile_complete', $candidate->is_profile_complete ?? false))>

                    <label for="is_profile_complete" class="form-check-label">
                        Profile Completed
                    </label>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
    AVATAR CROP MODAL
========================================================== --}}
<div class="modal fade" id="avatarCropModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable"
        style="max-width: 1400px; width: 96vw;">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Crop Avatar
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

            </div>


            <div class="modal-body"
                style="
                    max-height: 82vh;
                    background: #f8f9fa;
                ">

                <div
                    style="
                        width: 100%;
                        height: min(72vh, 680px);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        overflow: hidden;
                        background: #ffffff;
                        border: 1px solid #dee2e6;
                        border-radius: 16px;
                        padding: 12px;
                    ">

                    <img id="cropperImage" src="" alt="Crop source"
                        style="
                            max-width: 100%;
                            max-height: 100%;
                            display: block;
                        ">

                </div>


                <div class="mt-3 px-1">

                    <label for="avatarZoomRange" class="form-label mb-2">
                        Zoom
                    </label>

                    <input id="avatarZoomRange" type="range" class="form-range" min="0.5" max="4"
                        step="0.01" value="1">

                </div>

            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>

                <button type="button" id="cropAvatarButton" class="btn btn-primary">
                    Crop & Use
                </button>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
    FORM JAVASCRIPT
========================================================== --}}
@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                // =================================================
                // FLATPICKR
                // =================================================
                if (window.flatpickr) {

                    flatpickr('#date_of_birth', {
                        dateFormat: 'Y-m-d',
                        allowInput: true
                    });

                }


                // =================================================
                // TOM SELECT - SKILLS
                // =================================================
                const skillsInput = document.getElementById('skillsInput');

                if (skillsInput && window.TomSelect && !skillsInput.tomselect) {

                    new TomSelect(skillsInput, {

                        // Hiển thị nút X để xóa skill
                        plugins: ['remove_button'],

                        // Cho phép nhập skill mới chưa có trong database
                        create: true,

                        // Không lưu option mới sau khi remove
                        persist: false,

                        // Không giới hạn số skill
                        maxItems: null,

                        // Có thể chọn nhiều skill
                        closeAfterSelect: false,

                        // Placeholder
                        placeholder: 'Select or create skills...',

                        // Xóa khoảng trắng khi tạo skill mới
                        createFilter: function(input) {
                            return input.trim().length > 0;
                        }
                    });

                }

                // =================================================
                // TAGIFY - LANGUAGES
                // =================================================
                if (window.Tagify) {

                    const languagesInput =
                        document.getElementById(
                            'languagesInput'
                        );

                    if (languagesInput) {

                        const toCsv =
                            function(valuesArr) {

                                return valuesArr
                                    .map(
                                        function(item) {
                                            return item.value;
                                        }
                                    )
                                    .join(', ');

                            };


                        new Tagify(
                            languagesInput, {

                                originalInputValueFormat: toCsv,

                                dropdown: {
                                    enabled: 0
                                }

                            }
                        );

                    }

                }


                // =================================================
                // AVATAR CROPPER
                // =================================================
                const avatarInput =
                    document.getElementById(
                        'avatarInput'
                    );

                const avatarBase64 =
                    document.getElementById(
                        'avatarBase64'
                    );

                const avatarPreview =
                    document.getElementById(
                        'avatarPreview'
                    );

                const avatarHint =
                    document.getElementById(
                        'avatarHint'
                    );

                const cropperImage =
                    document.getElementById(
                        'cropperImage'
                    );

                const avatarZoomRange =
                    document.getElementById(
                        'avatarZoomRange'
                    );

                const cropModalEl =
                    document.getElementById(
                        'avatarCropModal'
                    );


                const cropModal =
                    cropModalEl ?
                    new bootstrap.Modal(
                        cropModalEl
                    ) :
                    null;


                let cropperInstance = null;


                if (avatarInput) {

                    avatarInput.addEventListener(
                        'change',
                        function(event) {

                            const file =
                                event.target.files[0];

                            if (!file) {
                                return;
                            }


                            const reader =
                                new FileReader();


                            reader.onload =
                                function(e) {

                                    cropperImage.src =
                                        e.target.result;


                                    if (cropModal) {
                                        cropModal.show();
                                    }


                                    if (
                                        cropperInstance
                                    ) {

                                        cropperInstance
                                            .destroy();

                                    }


                                    cropperImage.onload =
                                        function() {

                                            cropperInstance =
                                                new Cropper(
                                                    cropperImage, {

                                                        aspectRatio: 1,

                                                        viewMode: 1,

                                                        dragMode: 'move',

                                                        autoCropArea: 0.8,

                                                        responsive: true,

                                                        ready: function() {

                                                            avatarZoomRange
                                                                .value =
                                                                '1';

                                                        }

                                                    }
                                                );

                                        };

                                };


                            reader.readAsDataURL(
                                file
                            );

                        }
                    );

                }


                // =================================================
                // CROP AVATAR BUTTON
                // =================================================
                const cropAvatarButton =
                    document.getElementById(
                        'cropAvatarButton'
                    );


                if (cropAvatarButton) {

                    cropAvatarButton
                        .addEventListener(
                            'click',
                            function() {

                                if (
                                    !cropperInstance
                                ) {
                                    return;
                                }


                                const canvas =
                                    cropperInstance
                                    .getCroppedCanvas({

                                        width: 512,

                                        height: 512,

                                        imageSmoothingQuality: 'high'

                                    });


                                const base64 =
                                    canvas.toDataURL(
                                        'image/jpeg',
                                        0.9
                                    );


                                avatarBase64.value =
                                    base64;

                                avatarPreview.src =
                                    base64;

                                avatarPreview.style
                                    .display =
                                    'block';

                                avatarHint
                                    .textContent =
                                    'Avatar moi da duoc crop va se duoc luu khi submit form.';


                                if (cropModal) {
                                    cropModal.hide();
                                }


                                cropperInstance
                                    .destroy();

                                cropperInstance =
                                    null;

                            }
                        );

                }


                // =================================================
                // AVATAR ZOOM
                // =================================================
                if (avatarZoomRange) {

                    avatarZoomRange
                        .addEventListener(
                            'input',
                            function() {

                                if (
                                    !cropperInstance
                                ) {
                                    return;
                                }


                                cropperInstance
                                    .zoomTo(
                                        parseFloat(
                                            this.value
                                        )
                                    );

                            }
                        );

                }


                // =================================================
                // RESET CROPPER
                // =================================================
                if (cropModalEl) {

                    cropModalEl
                        .addEventListener(
                            'hidden.bs.modal',
                            function() {

                                if (
                                    cropperInstance
                                ) {

                                    cropperInstance
                                        .destroy();

                                    cropperInstance =
                                        null;

                                }


                                if (avatarInput) {
                                    avatarInput.value =
                                        '';
                                }


                                if (
                                    avatarZoomRange
                                ) {

                                    avatarZoomRange
                                        .value =
                                        '1';

                                }

                            }
                        );

                }


                // =================================================
                // FILEPOND - CV
                // =================================================
                if (window.FilePond) {

                    FilePond.registerPlugin(
                        FilePondPluginFileValidateType,
                        FilePondPluginFileValidateSize
                    );


                    const cvInput =
                        document.getElementById(
                            'cvFilepond'
                        );

                    const cvPath =
                        document.getElementById(
                            'cvPath'
                        );

                    const cvUploadHint =
                        document.getElementById(
                            'cvUploadHint'
                        );


                    if (cvInput) {

                        FilePond.create(
                            cvInput, {

                                instantUpload: true,

                                allowMultiple: false,

                                allowRevert: false,

                                acceptedFileTypes: [
                                    'application/pdf'
                                ],

                                fileValidateTypeLabelExpectedTypes: 'Chi chap nhan file PDF',

                                maxFileSize: '5MB',

                                labelMaxFileSizeExceeded: 'File qua lon',

                                labelMaxFileSize: 'Kich thuoc toi da: {filesize}',


                                server: {

                                    process: {

                                        url: '{{ route('candidates.upload-cv') }}',

                                        method: 'POST',

                                        headers: {

                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',

                                            'Accept': 'application/json'

                                        },


                                        onload: function(
                                            response
                                        ) {

                                            const data =
                                                JSON.parse(
                                                    response
                                                );

                                            cvPath.value =
                                                data.path;

                                            cvUploadHint
                                                .textContent =
                                                'Da upload: ' +
                                                (data.original_name ||
                                                    data.path);

                                            return data.path;

                                        },


                                        onerror: function(
                                            response
                                        ) {

                                            try {

                                                const data =
                                                    JSON.parse(
                                                        response
                                                    );

                                                return (
                                                    data.message ||
                                                    'Upload CV that bai'
                                                );

                                            } catch (
                                                error
                                            ) {

                                                return 'Upload CV that bai';

                                            }

                                        }

                                    }

                                },


                                onremovefile: function() {

                                    cvPath.value =
                                        '';

                                    cvUploadHint
                                        .textContent =
                                        'Chua co CV.';

                                }

                            }
                        );

                    }

                }

            });
        </script>
    @endpush
@endonce
