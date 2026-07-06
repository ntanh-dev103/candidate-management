@extends('layouts.app')

@section('content')

<div class="container mt-4">

<h2>Edit Candidate</h2>

@if ($errors->any())
	<div class="alert alert-danger">
		<strong>Vui lòng kiểm tra lại thông tin!</strong>
		<ul class="mb-0 mt-2">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

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
