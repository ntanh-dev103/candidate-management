@extends('layouts.app')

@section('title', 'Edit Skill')

@section('content')

<div class="container">

    <div class="card shadow-sm">

        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit Skill</h5>
        </div>

        <div class="card-body">

            <form
                action="{{ route('skills.update', $skill) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                @include('skills.form')

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-save"></i>
                        Update
                    </button>

                    <a
                        href="{{ route('skills.index') }}"
                        class="btn btn-secondary"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
