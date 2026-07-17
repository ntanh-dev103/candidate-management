@extends('layouts.app')

@section('title', 'Create Skill')

@section('content')

<div class="container">

    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Create Skill</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('skills.store') }}" method="POST">

                @csrf

                @include('skills.form')

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i>
                        Save
                    </button>

                    <a href="{{ route('skills.index') }}"
                       class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
