@extends('layout')

@section('content')
<form method="post" action="{{ route('user.profile') }}" enctype="multipart/form-data">
	@csrf
	@method('put')
	<div class="form-group">
		<label for="details_first_name">First Name</label>
		<input type="text" class="form-control {{ $errors->has('details_first_name') ? 'is-invalid' : '' }}" name="details_first_name" value="{{ $model->details->first_name }}">
		<div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
	</div>
	<div class="form-group">
		<label for="details_last_name">First Name</label>
		<input type="text" class="form-control {{ $errors->has('details_last_name') ? 'is-invalid' : '' }}" name="details_last_name" value="{{ $model->details->last_name }}">
		<div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
	</div>
	<div class="form-group">
		<input type="submit" class="form-control btn btn-success" name="submit" value="Update">
	</div>
</form>
@endsection