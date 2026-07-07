<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Personal Information</h5>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                <input
                    type="text"
                    name="full_name"
                    class="form-control @error('full_name') is-invalid @enderror"
                    value="{{ old('full_name', $candidate->full_name ?? '') }}">
                @error('full_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $candidate->email ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Phone <span class="text-danger">*</span></label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $candidate->phone ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Date Of Birth</label>
                <input
                    id="date_of_birth"
                    type="text"
                    name="date_of_birth"
                    class="form-control"
                    value="{{ old('date_of_birth', optional($candidate->date_of_birth)->format('Y-m-d') ?? '') }}"
                    placeholder="YYYY-MM-DD">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select js-tom-select">
                    <option value="" {{ old('gender', $candidate->gender ?? '') == '' ? 'selected' : '' }}>Choose</option>
                    <option value="male" {{ old('gender', $candidate->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $candidate->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $candidate->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Current Country</label>
                <select name="current_country" class="form-select js-tom-select">
                    <option value="" {{ old('current_country', $candidate->current_country ?? '') == '' ? 'selected' : '' }}>Choose</option>
                    <option value="VN" {{ old('current_country', $candidate->current_country ?? '') == 'VN' ? 'selected' : '' }}>Vietnam</option>
                    <option value="JP" {{ old('current_country', $candidate->current_country ?? '') == 'JP' ? 'selected' : '' }}>Japan</option>
                    <option value="KR" {{ old('current_country', $candidate->current_country ?? '') == 'KR' ? 'selected' : '' }}>Korea</option>
                    <option value="TW" {{ old('current_country', $candidate->current_country ?? '') == 'TW' ? 'selected' : '' }}>Taiwan</option>
                    <option value="DE" {{ old('current_country', $candidate->current_country ?? '') == 'DE' ? 'selected' : '' }}>Germany</option>
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" rows="3">{{ old('address', $candidate->address ?? '') }}</textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label">Avatar</label>
                <input id="avatarInput" type="file" accept="image/*" class="form-control">
                <input id="avatarBase64" type="hidden" name="avatar_base64" value="{{ old('avatar_base64', '') }}">

                <div class="mt-3 d-flex align-items-center gap-3 flex-wrap">
                    <img
                        id="avatarPreview"
                        src="{{ old('avatar_base64') ? old('avatar_base64') : (($candidate->avatar_url ?? null) ? Storage::url($candidate->avatar_url) : '') }}"
                        alt="Avatar preview"
                        style="width: 96px; height: 96px; object-fit: cover; border-radius: 50%; border: 1px solid #ddd; {{ old('avatar_base64') || !empty($candidate->avatar_url) ? '' : 'display: none;' }}">
                    <small class="text-muted" id="avatarHint">
                        {{ !empty($candidate->avatar_url) ? 'Dang hien thi avatar hien tai. Chon anh moi de crop va thay the.' : 'Chua co avatar.' }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Professional Profile</h5>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label">Headline</label>
                <input type="text" name="headline" class="form-control" value="{{ old('headline', $candidate->headline ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Experience (Years)</label>
                <input type="number" min="0" max="50" name="experience_years" class="form-control" value="{{ old('experience_years', $candidate->experience_years ?? 0) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Education</label>
                <select name="education_level" class="form-select js-tom-select">
                    <option value="">Choose</option>
                    <option value="high_school" {{ old('education_level', $candidate->education_level ?? '') == 'high_school' ? 'selected' : '' }}>High School</option>
                    <option value="college" {{ old('education_level', $candidate->education_level ?? '') == 'college' ? 'selected' : '' }}>College</option>
                    <option value="bachelor" {{ old('education_level', $candidate->education_level ?? '') == 'bachelor' ? 'selected' : '' }}>Bachelor</option>
                    <option value="master" {{ old('education_level', $candidate->education_level ?? '') == 'master' ? 'selected' : '' }}>Master</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Current Job Title</label>
                <input type="text" name="current_job_title" class="form-control" value="{{ old('current_job_title', $candidate->current_job_title ?? '') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Skills</label>
                <input
                    id="skillsInput"
                    type="text"
                    name="skills"
                    class="form-control"
                    value="{{ old('skills', $candidate->skills ?? '') }}"
                    placeholder="Java, Laravel, Docker">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Languages</label>
                <input
                    id="languagesInput"
                    type="text"
                    name="languages"
                    class="form-control"
                    value="{{ old('languages', $candidate->languages ?? '') }}"
                    placeholder="Vietnamese, English">
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label">CV (PDF, max 5MB)</label>
                <input id="cvFilepond" name="file" type="file" class="form-control">
                <input id="cvPath" type="hidden" name="cv_url" value="{{ old('cv_url', $candidate->cv_url ?? '') }}">
                <small id="cvUploadHint" class="text-muted d-block mt-2">
                    {{ !empty($candidate->cv_url) ? 'CV hien tai: ' . basename($candidate->cv_url) : 'Chua co CV.' }}
                </small>
                @if (!empty($candidate->cv_url))
                    <a class="d-inline-block mt-1" href="{{ Storage::url($candidate->cv_url) }}" target="_blank" rel="noopener">Xem CV da upload</a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-warning">
        <h5 class="mb-0">Career Goal</h5>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Desired Country</label>
                <select name="desired_country" class="form-select js-tom-select">
                    <option value="" {{ old('desired_country', $candidate->desired_country ?? '') == '' ? 'selected' : '' }}>Choose</option>
                    <option value="JP" {{ old('desired_country', $candidate->desired_country ?? '') == 'JP' ? 'selected' : '' }}>Japan</option>
                    <option value="KR" {{ old('desired_country', $candidate->desired_country ?? '') == 'KR' ? 'selected' : '' }}>Korea</option>
                    <option value="DE" {{ old('desired_country', $candidate->desired_country ?? '') == 'DE' ? 'selected' : '' }}>Germany</option>
                    <option value="TW" {{ old('desired_country', $candidate->desired_country ?? '') == 'TW' ? 'selected' : '' }}>Taiwan</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Job Type</label>
                <select name="desired_job_type" class="form-select js-tom-select">
                    <option value="" {{ old('desired_job_type', $candidate->desired_job_type ?? '') == '' ? 'selected' : '' }}>Choose</option>
                    <option value="full_time" {{ old('desired_job_type', $candidate->desired_job_type ?? '') == 'full_time' ? 'selected' : '' }}>Full Time</option>
                    <option value="part_time" {{ old('desired_job_type', $candidate->desired_job_type ?? '') == 'part_time' ? 'selected' : '' }}>Part Time</option>
                    <option value="contract" {{ old('desired_job_type', $candidate->desired_job_type ?? '') == 'contract' ? 'selected' : '' }}>Contract</option>
                </select>
            </div>

            <div class="col-md-2 mb-3">
                <label class="form-label">Salary</label>
                <input type="number" name="desired_salary_min" class="form-control" value="{{ old('desired_salary_min', $candidate->desired_salary_min ?? '') }}">
            </div>

            <div class="col-md-2 mb-3">
                <label class="form-label">Currency</label>
                <select name="desired_salary_currency" class="form-select js-tom-select">
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
        <h5 class="mb-0">Account</h5>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-select js-tom-select">
                    <option value="Applied" {{ old('status', $candidate->status ?? '') == 'Applied' ? 'selected' : '' }}>Applied</option>
                    <option value="Interview" {{ old('status', $candidate->status ?? '') == 'Interview' ? 'selected' : '' }}>Interview</option>
                    <option value="Hired" {{ old('status', $candidate->status ?? '') == 'Hired' ? 'selected' : '' }}>Hired</option>
                    <option value="Rejected" {{ old('status', $candidate->status ?? '') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <div class="col-md-6 d-flex align-items-end mb-3">
                <div class="form-check">
                    <input type="hidden" name="is_profile_complete" value="0">
                    <input
                        id="is_profile_complete"
                        type="checkbox"
                        class="form-check-input"
                        name="is_profile_complete"
                        value="1"
                        {{ old('is_profile_complete', $candidate->is_profile_complete ?? false) ? 'checked' : '' }}>
                    <label for="is_profile_complete" class="form-check-label">Profile Completed</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="avatarCropModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Avatar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="max-height: 70vh; overflow: hidden;">
                    <img id="cropperImage" src="" alt="Crop source" style="max-width: 100%; display: block;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="cropAvatarButton" class="btn btn-primary">Crop & Use</button>
            </div>
        </div>
    </div>
</div>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                if (window.flatpickr) {
                    flatpickr('#date_of_birth', {
                        dateFormat: 'Y-m-d',
                        allowInput: true,
                    });
                }

                if (window.Tagify) {
                    var toCsv = function (valuesArr) {
                        return valuesArr.map(function (item) {
                            return item.value;
                        }).join(', ');
                    };

                    new Tagify(document.getElementById('skillsInput'), {
                        originalInputValueFormat: toCsv,
                        dropdown: {
                            enabled: 0,
                        }
                    });

                    new Tagify(document.getElementById('languagesInput'), {
                        originalInputValueFormat: toCsv,
                        dropdown: {
                            enabled: 0,
                        }
                    });
                }

                var avatarInput = document.getElementById('avatarInput');
                var avatarBase64 = document.getElementById('avatarBase64');
                var avatarPreview = document.getElementById('avatarPreview');
                var avatarHint = document.getElementById('avatarHint');
                var cropperImage = document.getElementById('cropperImage');
                var cropModalEl = document.getElementById('avatarCropModal');
                var cropModal = cropModalEl ? new bootstrap.Modal(cropModalEl) : null;
                var cropperInstance = null;

                avatarInput.addEventListener('change', function (event) {
                    var file = event.target.files[0];
                    if (!file) {
                        return;
                    }

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        cropperImage.src = e.target.result;
                        cropModal.show();

                        if (cropperInstance) {
                            cropperInstance.destroy();
                        }

                        cropperImage.onload = function () {
                            cropperInstance = new Cropper(cropperImage, {
                                aspectRatio: 1,
                                viewMode: 1,
                                dragMode: 'move',
                                autoCropArea: 1,
                                responsive: true,
                            });
                        };
                    };

                    reader.readAsDataURL(file);
                });

                document.getElementById('cropAvatarButton').addEventListener('click', function () {
                    if (!cropperInstance) {
                        return;
                    }

                    var canvas = cropperInstance.getCroppedCanvas({
                        width: 512,
                        height: 512,
                        imageSmoothingQuality: 'high',
                    });

                    var base64 = canvas.toDataURL('image/jpeg', 0.9);
                    avatarBase64.value = base64;
                    avatarPreview.src = base64;
                    avatarPreview.style.display = 'block';
                    avatarHint.textContent = 'Avatar moi da duoc crop va se duoc luu khi submit form.';

                    cropModal.hide();
                    cropperInstance.destroy();
                    cropperInstance = null;
                });

                cropModalEl.addEventListener('hidden.bs.modal', function () {
                    if (cropperInstance) {
                        cropperInstance.destroy();
                        cropperInstance = null;
                    }
                    avatarInput.value = '';
                });

                if (window.FilePond) {
                    FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginFileValidateSize);

                    var cvInput = document.getElementById('cvFilepond');
                    var cvPath = document.getElementById('cvPath');
                    var cvUploadHint = document.getElementById('cvUploadHint');

                    FilePond.create(cvInput, {
                        instantUpload: true,
                        allowMultiple: false,
                        allowRevert: false,
                        acceptedFileTypes: ['application/pdf'],
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
                                onload: function (response) {
                                    var data = JSON.parse(response);
                                    cvPath.value = data.path;
                                    cvUploadHint.textContent = 'Da upload: ' + (data.original_name || data.path);
                                    return data.path;
                                },
                                onerror: function (response) {
                                    try {
                                        var data = JSON.parse(response);
                                        return data.message || 'Upload CV that bai';
                                    } catch (e) {
                                        return 'Upload CV that bai';
                                    }
                                }
                            }
                        },
                        onremovefile: function () {
                            cvPath.value = '';
                            cvUploadHint.textContent = 'Chua co CV.';
                        }
                    });
                }
            });
        </script>
    @endpush
@endonce
