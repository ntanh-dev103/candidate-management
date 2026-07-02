<!DOCTYPE html>
<html>
<head>
    <title>Candidate Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Candidate Management</h2>

    <a href="{{ route('candidates.create') }}" class="btn btn-primary mb-3">
        Add Candidate
    </a>
    @if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif
    <table class="table table-bordered">

        <thead>

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

                <td>{{ $candidate->status }}</td>

                <td>
                    <a href="{{ route('candidates.show',$candidate) }}" class="btn btn-info btn-sm">View</a>

                    <a href="{{ route('candidates.edit',$candidate) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('candidates.destroy',$candidate) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
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

    {{ $candidates->links() }}

</div>

</body>
</html>