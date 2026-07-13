@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="card shadow">

        {{-- ================= HEADER ================= --}}
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Candidate Profile</h3>
        </div>

        <div class="card-body">

            <div class="row">

                {{-- ================= LEFT: AVATAR ================= --}}
                <div class="col-md-3 text-center">

                    @if ($candidate->avatar_url)
                        <img
                            src="{{ asset('storage/' . $candidate->avatar_url) }}"
                            alt="{{ $candidate->full_name }}"
                            class="rounded-circle shadow border"
                            width="180"
                            height="180"
                            style="object-fit: cover;"
                        >
                    @else
                        <div
                            class="border rounded-circle d-inline-flex
                                   align-items-center justify-content-center bg-light"
                            style="width:180px;height:180px;"
                        >
                            <span class="text-muted">No Avatar</span>
                        </div>
                    @endif

                    {{-- Candidate Name --}}
                    <h4 class="mt-3">
                        {{ $candidate->full_name }}
                    </h4>

                    {{-- Profile Status --}}
                    @if ($candidate->is_profile_complete)
                        <span class="badge bg-success">
                            Profile Completed
                        </span>
                    @else
                        <span class="badge bg-danger">
                            Profile Incomplete
                        </span>
                    @endif

                    {{-- Rating --}}
                    <div class="mb-3 mt-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= ($candidate->rating ?? 0))
                                ⭐
                            @else
                                ☆
                            @endif
                        @endfor
                    </div>

                    {{-- Headline --}}
                    <p class="text-muted">
                        {{ $candidate->headline ?? 'No headline' }}
                    </p>

                    {{-- Candidate Status --}}
                    @switch($candidate->status)

                        @case('Applied')
                            <span class="badge bg-secondary">Applied</span>
                            @break

                        @case('Interview')
                            <span class="badge bg-warning text-dark">
                                Interview
                            </span>
                            @break

                        @case('Hired')
                            <span class="badge bg-success">Hired</span>
                            @break

                        @case('Rejected')
                            <span class="badge bg-danger">Rejected</span>
                            @break

                        @default
                            <span class="badge bg-secondary">
                                {{ $candidate->status ?? 'Unknown' }}
                            </span>

                    @endswitch

                </div>

                {{-- ================= RIGHT: PROFILE ================= --}}
                <div class="col-md-9">

                    {{-- ================= PERSONAL INFORMATION ================= --}}
                    <h4>Personal Information</h4>

                    <table class="table table-bordered">

                        <tr>
                            <th width="30%">Last Active</th>
                            <td>
                                {{ $candidate->last_active_at
                                    ? \Carbon\Carbon::parse($candidate->last_active_at)->diffForHumans()
                                    : 'Never'
                                }}
                            </td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $candidate->email ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>Phone</th>
                            <td>{{ $candidate->phone ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>Date of Birth</th>
                            <td>
                                {{ $candidate->date_of_birth ?? 'N/A' }}
                            </td>
                        </tr>

                        <tr>
                            <th>Gender</th>
                            <td>
                                {{ $candidate->gender
                                    ? ucfirst($candidate->gender)
                                    : 'N/A'
                                }}
                            </td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{ $candidate->address ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>Current Country</th>
                            <td>
                                {{ $candidate->current_country ?? 'N/A' }}
                            </td>
                        </tr>

                    </table>


                    {{-- ================= EXPERIENCE ================= --}}
                    <h4 class="mt-4">
                        Work Experience
                    </h4>

                    <div class="card mb-4">
                        <div class="card-body">

                            @forelse ($candidate->experiences as $experience)

                                <div class="mb-3">

                                    <h5 class="mb-1">
                                        {{ $experience->job_title ?? 'No Job Title' }}
                                    </h5>

                                    <div>
                                        <strong>Company:</strong>
                                        {{ $experience->company_name ?? 'N/A' }}
                                    </div>

                                    <div class="text-muted">

                                        {{ $experience->start_date ?? 'N/A' }}

                                        -

                                        {{ $experience->end_date ?? 'Present' }}

                                    </div>

                                    @if ($experience->description)
                                        <p class="mt-2 mb-0">
                                            {{ $experience->description }}
                                        </p>
                                    @endif

                                </div>

                                @unless ($loop->last)
                                    <hr>
                                @endunless

                            @empty

                                <span class="text-muted">
                                    No Experience
                                </span>

                            @endforelse

                        </div>
                    </div>


                    {{-- ================= EDUCATION ================= --}}
                    <h4 class="mt-4">
                        Education
                    </h4>

                    <div class="card mb-4">
                        <div class="card-body">

                            @forelse ($candidate->educations as $education)

                                <div class="mb-3">

                                    <h5 class="mb-1">
                                        {{ $education->school_name ?? 'No School Name' }}
                                    </h5>

                                    <div>
                                        <strong>Degree:</strong>
                                        {{ $education->degree ?? 'N/A' }}
                                    </div>

                                    @if ($education->field_of_study)
                                        <div>
                                            <strong>Field of Study:</strong>
                                            {{ $education->field_of_study }}
                                        </div>
                                    @endif

                                    <div class="text-muted">

                                        {{ $education->start_date ?? 'N/A' }}

                                        -

                                        {{ $education->end_date ?? 'Present' }}

                                    </div>

                                </div>

                                @unless ($loop->last)
                                    <hr>
                                @endunless

                            @empty

                                <span class="text-muted">
                                    No Education
                                </span>

                            @endforelse

                        </div>
                    </div>


                    {{-- ================= CURRENT JOB ================= --}}
                    <h4 class="mt-4">
                        Professional Information
                    </h4>

                    <table class="table table-bordered">

                        <tr>
                            <th width="30%">Current Job</th>
                            <td>
                                {{ $candidate->current_job_title ?? 'N/A' }}
                            </td>
                        </tr>

                    </table>


                    {{-- ================= SKILLS ================= --}}
                    <h4 class="mt-4">
                        Career Goal
                    </h4>

                    <hr>

                    <div class="mb-3">

                        <h5 class="mb-2">
                            Skills
                        </h5>

                        @forelse ($candidate->skills as $skill)

                            <span class="badge bg-primary me-1 mb-1">
                                {{ $skill->name }}
                            </span>

                        @empty

                            <span class="text-muted">
                                No Skills
                            </span>

                        @endforelse

                    </div>


                    {{-- ================= LANGUAGES ================= --}}
                    <div class="mb-3">

                        <h5 class="mb-2">
                            Languages
                        </h5>

                        @if ($candidate->languages)

                            @foreach (explode(',', $candidate->languages) as $language)

                                <span class="badge bg-success me-1 mb-1">
                                    {{ trim($language) }}
                                </span>

                            @endforeach

                        @else

                            <span class="text-muted">
                                No Languages
                            </span>

                        @endif

                    </div>


                    {{-- ================= CAREER GOAL ================= --}}
                    <table class="table table-bordered">

                        <tr>
                            <th width="30%">
                                Desired Country
                            </th>

                            <td>
                                {{ $candidate->desired_country ?? 'N/A' }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Job Type
                            </th>

                            <td>
                                {{ $candidate->desired_job_type ?? 'N/A' }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Salary
                            </th>

                            <td>

                                @if ($candidate->desired_salary_min)

                                    {{ number_format($candidate->desired_salary_min) }}

                                    {{ $candidate->desired_salary_currency }}

                                @else

                                    N/A

                                @endif

                            </td>
                        </tr>

                    </table>


                    {{-- ================= CV ================= --}}
                    <h4 class="mt-4">
                        CV
                    </h4>

                    @if ($candidate->cv_url)

                        <a
                            href="{{ asset('storage/' . $candidate->cv_url) }}"
                            target="_blank"
                            class="btn btn-success"
                        >
                            View CV
                        </a>

                        <a
                            href="{{ asset('storage/' . $candidate->cv_url) }}"
                            download
                            class="btn btn-primary"
                        >
                            Download CV
                        </a>

                    @else

                        <span class="text-muted">
                            No CV uploaded
                        </span>

                    @endif


                    <hr>

                    {{-- ================= ACTION BUTTONS ================= --}}
                    <a
                        href="{{ route('candidates.index') }}"
                        class="btn btn-secondary"
                    >
                        Back
                    </a>

                    <a
                        href="{{ route('candidates.edit', $candidate) }}"
                        class="btn btn-warning"
                    >
                        Edit
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection 
