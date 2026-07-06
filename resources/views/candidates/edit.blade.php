@extends('layouts.app')

@section('content')

<div class="container mt-4">

<h2>Edit Candidate</h2>

<form

 action="{{ route('candidates.update', $candidate) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

@include('candidates.form')

<button class="btn btn-success">

Update

</button>

<a href="{{ route('candidates.index') }}"
class="btn btn-secondary">

Back

</a>

</form>

</div>

@endsection
