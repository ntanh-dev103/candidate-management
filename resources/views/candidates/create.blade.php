<!DOCTYPE html>
<html>
<head>

    <title>Add Candidate</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Add Candidate</h2>

<form action="{{ route('candidates.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>Full Name</label>

<input
type="text"
name="full_name"
class="form-control"
value="{{ old('full_name') }}">

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
value="{{ old('email') }}">

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
value="{{ old('phone') }}">

@error('phone')
<div class="text-danger">{{ $message }}</div>
@enderror

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-control">

<option value="">Choose</option>

<option value="Applied">Applied</option>

<option value="Interview">Interview</option>

<option value="Hired">Hired</option>

<option value="Rejected">Rejected</option>

</select>

@error('status')
<div class="text-danger">{{ $message }}</div>
@enderror

</div>

<button class="btn btn-success">
Save
</button>

<a href="{{ route('candidates.index') }}"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</body>
</html>