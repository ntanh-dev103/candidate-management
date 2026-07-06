@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">

                <h3 class="mb-0">
                    Candidate Profile
                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    <!-- Avatar -->

                    <div class="col-md-3 text-center">

                        @if ($candidate->avatar_url)
                            <div class="border rounded-circle d-inline-flex align-items-center justify-content-center bg-light shadow" style="width:180px;height:180px;">
                                <span class="fw-bold text-uppercase fs-3">
                                    {{ pathinfo($candidate->avatar_url, PATHINFO_EXTENSION) }}
                                </span>
                            </div>
                        @else
                            <div class="border rounded-circle d-inline-flex align-items-center justify-content-center bg-light" style="width:180px;height:180px;">
                                <span class="text-muted">No Avatar</span>
                            </div>
                        @endif

                        <h4 class="mt-3">
                            {{ $candidate->full_name }}
                        </h4>

                        @if ($candidate->is_profile_complete)
                            <span class="badge bg-success">
                                Profile Completed
                            </span>
                        @else
                            <span class="badge bg-danger">
                                Profile Incomplete
                            </span>
                        @endif

                        <div class="mb-3 mt-2">

                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $candidate->rating)
                                    ⭐
                                @else
                                    ☆
                                @endif
                            @endfor

                        </div>

                        <p class="text-muted">
                            {{ $candidate->headline }}
                        </p>

                        @switch($candidate->status)
                            @case('Applied')
                                <span class="badge bg-secondary">
                                    Applied
                                </span>
                                @break

                            @case('Interview')
                                <span class="badge bg-warning text-dark">
                                    Interview
                                </span>
                                @break

                            @case('Hired')
                                <span class="badge bg-success">
                                    Hired
                                </span>
                                @break

                            @default
                                <span class="badge bg-danger">
                                    Rejected
                                </span>
                        @endswitch

                    </div>

                    <!-- Profile -->

                    <div class="col-md-9">

                        <h4>
                            Personal Information
                        </h4>
                        <table class="table table-bordered">

                            <tr>
                                <th width="30%">Last Active</th>
                                <td>
                                    {{ $candidate->last_active_at ? \Carbon\Carbon::parse($candidate->last_active_at)->diffForHumans() : 'Never' }}
                                </td>
                            </tr>

                            <tr>
                                <th width="30%">Email</th>
                                <td>{{ $candidate->email }}</td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td>{{ $candidate->phone }}</td>
                            </tr>

                            <tr>
                                <th>Date of Birth</th>
                                <td>{{ $candidate->date_of_birth }}</td>
                            </tr>

                            <tr>
                                <th>Gender</th>
                                <td>{{ ucfirst($candidate->gender) }}</td>
                            </tr>

                            <tr>
                                <th>Address</th>
                                <td>{{ $candidate->address }}</td>
                            </tr>

                            <tr>
                                <th>Current Country</th>
                                <td>{{ $candidate->current_country }}</td>
                            </tr>

                        </table>

                        <h4 class="mt-4">
                            Professional Information
                        </h4>

                        <table class="table table-bordered">

                            <tr>
                                <th width="30%">Experience</th>
                                <td>

                                    {{ $candidate->experience_years }}

                                    years

                                </td>
                            </tr>

                            <tr>
                                <th>Education</th>
                                <td>

                                    {{ $candidate->education_level }}

                                </td>
                            </tr>

                            <tr>
                                <th>Current Job</th>
                                <td>

                                    {{ $candidate->current_job_title }}

                                </td>
                            </tr>

                        </table>

                        <h4 class="mt-4">

                            Career Goal

                        </h4>
                        <hr>

                        <div class="mb-3">
                            <h5 class="mb-2">
                                Skills
                            </h5>

                            @if ($candidate->skills)
                                @foreach (explode(',', $candidate->skills) as $skill)
                                    <span class="badge bg-primary me-1 mb-1">
                                        {{ trim($skill) }}
                                    </span>
                                @endforeach
                            @else
                                <span class="text-muted">
                                    No Skills
                                </span>
                            @endif
                        </div>

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

                        <table class="table table-bordered">

                            <tr>
                                <th width="30%">Desired Country</th>
                                <td>

                                    {{ $candidate->desired_country }}

                                </td>
                            </tr>

                            <tr>
                                <th>Job Type</th>
                                <td>

                                    {{ $candidate->desired_job_type }}

                                </td>
                            </tr>

                            <tr>
                                <th>Salary</th>
                                <td>

                                    {{ number_format($candidate->desired_salary_min) }}

                                    {{ $candidate->desired_salary_currency }}

                                </td>
                            </tr>

                        </table>

                        <h4 class="mt-4">

                            CV

                        </h4>

                        @if ($candidate->cv_url)
                            <a href="{{ asset('storage/' . $candidate->cv_url) }}" target="_blank" class="btn btn-success">

                                View CV

                            </a>

                            <a href="{{ asset('storage/' . $candidate->cv_url) }}" download class="btn btn-primary">

                                Download CV

                            </a>
                        @else
                            <span class="text-muted">

                                No CV uploaded

                            </span>
                        @endif

                        <hr>

                        <a href="{{ route('candidates.index') }}" class="btn btn-secondary">

                            Back

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
