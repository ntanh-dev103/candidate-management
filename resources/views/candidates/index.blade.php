@extends('layouts.app')

@section('content')

    <div class="container mt-4">

        <!-- Tiêu đề -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">
                Candidate Management
            </h2>

            <a href="{{ route('candidates.create') }}" class="btn btn-success">
                + Add Candidate
            </a>

        </div>
        <!-- Success -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search -->
        <div class="card shadow-sm mb-4">

            <div class="card-header bg-primary text-white">
                Search Candidate
            </div>

            <div class="card-body">

                <form action="{{ route('candidates.index') }}" method="GET">

                    <div class="row g-3">

                        <!-- Search -->
                        <div class="col-md-3">

                            <input type="text" name="search" class="form-control" placeholder="Search phone or email..."
                                value="{{ request('search') }}">

                        </div>

                        <!-- Status -->
                        <div class="col-md-2">

                            <select name="status" class="form-select js-tom-select">

                                <option value="">Status</option>

                                @foreach (['Applied', 'Interview', 'Hired', 'Rejected'] as $status)
                                    <option value="{{ $status }}"
                                        {{ request('status') == $status ? 'selected' : '' }}>

                                        {{ $status }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <!-- Gender -->
                        <div class="col-md-2">

                            <select name="gender" class="form-select js-tom-select">

                                <option value="">Gender</option>

                                <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>
                                    Male
                                </option>

                                <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>
                                    Female
                                </option>

                                <option value="other" {{ request('gender') == 'other' ? 'selected' : '' }}>
                                    Other
                                </option>

                            </select>

                        </div>

                        <!-- Current Country -->
                        <div class="col-md-2">

                            <select name="country" class="form-select js-tom-select">

                                <option value="">Current Country</option>

                                @foreach (['VN', 'JP', 'KR', 'TW'] as $country)
                                    <option value="{{ $country }}"
                                        {{ request('country') == $country ? 'selected' : '' }}>

                                        {{ $country }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <!-- Desired Country -->
                        <div class="col-md-3">

                            <select name="desired_country" class="form-select js-tom-select">

                                <option value="">Desired Country</option>

                                @foreach (['JP', 'KR', 'DE', 'TW'] as $country)
                                    <option value="{{ $country }}"
                                        {{ request('desired_country') == $country ? 'selected' : '' }}>

                                        {{ $country }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <!-- Education -->
                        <div class="col-md-2">

                            <select name="education" class="form-select js-tom-select">

                                <option value="">Education</option>

                                <option value="high_school" {{ request('education') == 'high_school' ? 'selected' : '' }}>
                                    High School
                                </option>

                                <option value="college" {{ request('education') == 'college' ? 'selected' : '' }}>
                                    College
                                </option>

                                <option value="bachelor" {{ request('education') == 'bachelor' ? 'selected' : '' }}>
                                    Bachelor
                                </option>

                                <option value="master" {{ request('education') == 'master' ? 'selected' : '' }}>
                                    Master
                                </option>

                            </select>

                        </div>

                        <!-- Experience -->
                        <div class="col-md-2">

                            <select name="experience" class="form-select js-tom-select">

                                <option value="">Experience</option>

                                <option value="1">1+ years</option>
                                <option value="3">3+ years</option>
                                <option value="5">5+ years</option>
                                <option value="10">10+ years</option>

                            </select>

                        </div>

                        <!-- Button -->
                        <div class="col-md-2">

                            <button class="btn btn-primary w-100">

                                Search

                            </button>

                        </div>

                        <div class="row g-2">

                            <div class="col-md-2">
                                <a href="{{ route('candidates.index') }}" class="btn btn-secondary w-100">
                                    Reset
                                </a>
                            </div>

                            <div class="col-md-2">
                                <a href="{{ route('candidates.export') }}" class="btn btn-success w-100">
                                    <i class="bi bi-file-earmark-excel"></i>
                                    Export Excel
                                </a>
                            </div>

                        </div>


                    </div>

                </form>

            </div>

        </div>

        <!-- Table -->
        <div class="card shadow">

            <div class="card-header">

                Candidate List

            </div>

            <div class="card-body p-0">

                <table class="table table-bordered table-hover mb-0 align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Country</th>
                            <th>Experience</th>
                            <th>Skills</th>
                            <th>Languages</th>
                            <th>Status</th>
                            <th>CV</th>
                            <th width="220">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($candidates as $candidate)
                            <tr>

                                <td>
                                    {{ $candidate->id }}
                                </td>

                                <td>

                                    @if ($candidate->avatar_url)
                                        <img src="{{ Storage::url($candidate->avatar_url) }}"
                                            alt="{{ $candidate->full_name }}" width="60" height="60"
                                            class="rounded-circle" style="object-fit: cover;">
                                    @else
                                        <span class="badge bg-secondary">No Avatar</span>
                                    @endif

                                </td>

                                <td>
                                    {{ $candidate->full_name }}
                                </td>

                                <td>
                                    {{ $candidate->email }}
                                </td>

                                <td>
                                    {{ $candidate->phone }}
                                </td>

                                <td>
                                    {{ $candidate->current_country }}
                                </td>

                                <td>

                                    {{ $candidate->experience_years }}
                                    years

                                </td>

                                <td>

                                    @forelse($candidate->skills as $skill)
                                        <span class="badge bg-primary me-1 mb-1">
                                            {{ $skill->name }}
                                        </span>
                                    @empty
                                        <span class="text-muted">
                                            No Skills
                                        </span>
                                    @endforelse

                                </td>

                                <td>

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

                                </td>

                                <td>

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

                                </td>

                                <td>

                                    @if ($candidate->cv_url)
                                        <a href="{{ asset('storage/' . $candidate->cv_url) }}" target="_blank"
                                            class="btn btn-success btn-sm">

                                            View CV

                                        </a>
                                    @else
                                        <span class="text-muted">
                                            No CV
                                        </span>
                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('candidates.show', $candidate) }}" class="btn btn-info btn-sm">

                                        View

                                    </a>

                                    <a href="{{ route('candidates.edit', $candidate) }}" class="btn btn-warning btn-sm">

                                        Edit

                                    </a>

                                    <form action="{{ route('candidates.destroy', $candidate) }}" method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Delete this candidate?')"
                                            class="btn btn-danger btn-sm">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                            @empty

                                <tr>

                                    <td colspan="12" class="text-center">

                                        No candidates found.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- Pagination -->
            <div class="mt-4 d-flex justify-content-center">

                {{ $candidates->links() }}

            </div>

        </div>

    @endsection
