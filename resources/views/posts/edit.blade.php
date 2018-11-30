@extends('layout')

@section('title')
Edit Post!
@endsection

@section('content')
	<form method="post" action="/posts/update{{ $post->id }}" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="post_title">Title</label>
			<input type="text" class="form-control {{ $errors->has('post_title') ? 'is-invalid' : '' }}" id="post_title2" name="post_title" placeholder="Title heare!" value="{{ $post->title }}">
			<div class="invalid-feedback">{{ $errors->first('post_title') }}</div>
		</div>
		<div class="form-group">
			<label for="post_thumbnail">Thumbnail</label>
			<input type="file" class="form-control {{ $errors->has('post_thumbnail') ? 'is-invalid' : '' }}" id="post_thumbnail2" name="post_thumbnail">
			<div class="invalid-feedback">{{ $errors->first('post_thumbnail') }}</div>
		</div>
		<div class="form-group">
			<label for="post_body">body</label>
			<textarea class="form-control {{ $errors->has('post_body') ? 'is-invalid' : '' }}" rows="10" id="post_body" name="post_body" placeholder="Post content here!">{{ $post->body}}</textarea>
			<div class="invalid-feedback">{{ $errors->first('post_body') }}</div>
		</div>
		<div class="form-group">
			<input type="submit" class="form-control btn btn-success" name="submit" value="Edit Post!">
		</div>
	</form>
@endsection