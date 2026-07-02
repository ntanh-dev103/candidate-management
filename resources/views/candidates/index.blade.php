<!DOCTYPE html>
<html>
<head>
    <title>Candidate Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h3 class="mb-0">Candidate Management</h3>

        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Search + Filter + Add -->
            <div class="row mb-3">

                <div class="col-md-9">

                    <form action="{{ route('candidates.index') }}" method="GET">

                        <div class="row">

                            <div class="col-md-5">

                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="Search by name..."
                                    value="{{ request('search') }}">

                            </div>

                            <div class="col-md-3">

                                <select name="status" class="form-select">

                                    <option value="">All Status</option>

                                    <option value="Applied"
                                        {{ request('status')=='Applied' ? 'selected' : '' }}>
                                        Applied
                                    </option>

                                    <option value="Interview"
                                        {{ request('status')=='Interview' ? 'selected' : '' }}>
                                        Interview
                                    </option>

                                    <option value="Hired"
                                        {{ request('status')=='Hired' ? 'selected' : '' }}>
                                        Hired
                                    </option>

                                    <option value="Rejected"
                                        {{ request('status')=='Rejected' ? 'selected' : '' }}>
                                        Rejected
                                    </option>

                                </select>

                            </div>

                            <div class="col-md-2">

                                <button class="btn btn-primary w-100">
                                    Search
                                </button>

                            </div>

                            <div class="col-md-2">

                                <a href="{{ route('candidates.index') }}"
                                   class="btn btn-secondary w-100">
                                    Reset
                                </a>

                            </div>

                        </div>

                    </form>

                </div>

                <div class="col-md-3 text-end">

                    <a href="{{ route('candidates.create') }}"
                       class="btn btn-success">
                        + Add Candidate
                    </a>

                </div>

            </div>

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th width="220">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($candidates as $candidate)

                    <tr>

                        <td>{{ $candidate->id }}</td>

                        <td>{{ $candidate->full_name }}</td>

                        <td>{{ $candidate->email }}</td>

                        <td>{{ $candidate->phone }}</td>

                        <td>

                            @if($candidate->status=='Applied')
                                <span class="badge bg-secondary">Applied</span>

                            @elseif($candidate->status=='Interview')
                                <span class="badge bg-warning text-dark">Interview</span>

                            @elseif($candidate->status=='Hired')
                                <span class="badge bg-success">Hired</span>

                            @else
                                <span class="badge bg-danger">Rejected</span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('candidates.show',$candidate) }}"
                               class="btn btn-info btn-sm">
                                View
                            </a>

                            <a href="{{ route('candidates.edit',$candidate) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form
                                action="{{ route('candidates.destroy',$candidate) }}"
                                method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this candidate?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            No candidates found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">

                {{ $candidates->links() }}

            </div>

        </div>

    </div>

</div>

</body>
</html>