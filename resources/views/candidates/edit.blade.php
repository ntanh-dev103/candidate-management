<!DOCTYPE html>
<html>
<head>
    <title>Edit Candidate</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<h2>Edit Candidate</h2>

<form action="{{ route('candidates.update', $candidate) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Full Name</label>

        <input
            type="text"
            name="full_name"
            class="form-control"
            value="{{ old('full_name', $candidate->full_name) }}">

        @error('full_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror

    </div>

    <div class="mb-3">

        <label>Email</label>

        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ old('email', $candidate->email) }}">

        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror

    </div>

    <div class="mb-3">

        <label>Phone</label>

        <input
            type="text"
            name="phone"
            class="form-control"
            value="{{ old('phone', $candidate->phone) }}">

        @error('phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror

    </div>

    <div class="mb-3">

        <label>Status</label>

        <select name="status" class="form-control">

            <option value="Applied" {{ $candidate->status == 'Applied' ? 'selected' : '' }}>
                Applied
            </option>

            <option value="Interview" {{ $candidate->status == 'Interview' ? 'selected' : '' }}>
                Interview
            </option>

            <option value="Hired" {{ $candidate->status == 'Hired' ? 'selected' : '' }}>
                Hired
            </option>

            <option value="Rejected" {{ $candidate->status == 'Rejected' ? 'selected' : '' }}>
                Rejected
            </option>

        </select>

    </div>

    <button class="btn btn-success">
        Update
    </button>

    <a href="{{ route('candidates.index') }}" class="btn btn-secondary">
        Back
    </a>

</form>

</div>

</body>
</html>