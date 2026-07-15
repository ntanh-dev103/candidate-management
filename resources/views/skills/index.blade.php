@extends('layouts.app')

@section('title', 'Skills')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Skill Management</h2>

        <a href="{{ route('skills.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Add Skill
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th width="80">ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="200">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($skills as $skill)

                        <tr>
                            <td>{{ $skill->id }}</td>

                            <td>
                                <strong>{{ $skill->name }}</strong>
                            </td>

                            <td>
                                {{ $skill->description ?? '-' }}
                            </td>

                            <td>
                                <a
                                    href="{{ route('skills.edit', $skill) }}"
                                    class="btn btn-warning btn-sm"
                                >
                                    <i class="bi bi-pencil"></i>
                                    Edit
                                </a>

                                <form
                                    action="{{ route('skills.destroy', $skill) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this skill?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                No skills found.
                            </td>
                        </tr>

                    @endforelse
                </tbody>

            </table>

            {{ $skills->links() }}

        </div>
    </div>

</div>

@endsection
