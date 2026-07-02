<!DOCTYPE html>
<html>
<head>
    <title>Candidate Detail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Candidate Detail</h2>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <td>{{ $candidate->id }}</td>
        </tr>

        <tr>
            <th>Full Name</th>
            <td>{{ $candidate->full_name }}</td>
        </tr>

        <tr>
            <th>Email</th>
            <td>{{ $candidate->email }}</td>
        </tr>

        <tr>
            <th>Phone</th>
            <td>{{ $candidate->phone }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <td>{{ $candidate->status }}</td>
        </tr>

    </table>

    <a href="{{ route('candidates.index') }}" class="btn btn-secondary">
        Back
    </a>

</div>

</body>
</html>