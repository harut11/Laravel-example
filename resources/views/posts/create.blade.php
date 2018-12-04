@extends('layout')

@section('title')
Create a new post!
@endsection

@section('content')
	<form method="post" action="/posts" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="post_title">Title</label>
			<input type="text" class="form-control {{ $errors->has('post_title') ? 'is-invalid' : '' }}" id="post_title" name="post_title" placeholder="Title heare!">
			<div class="invalid-feedback">{{ $errors->first('post_title') }}</div>
		</div>
		<div class="form-group">
			<label for="post_category">Category</label>
			<select class="form-control {{ $errors->has('post_category') ? 'is-invalid' : '' }}" id="post_category" name="post_category">
				@foreach(\App\PostCategories::get()->pluck('title', 'id') as $id => $title)
				<option value="{{ $id }}">{{ $title }}</option>
				@endforeach
			</select>
			<div class="invalid-feedback">{{ $errors->first('post_category') }}</div>
		</div>
		<div class="form-group">
			<label for="post_thumbnail">Thumbnail</label>
			<input type="file" class="form-control {{ $errors->has('post_thumbnail') ? 'is-invalid' : '' }}" id="post_thumbnail" name="post_thumbnail">
			<div class="invalid-feedback">{{ $errors->first('post_thumbnail') }}</div>
		</div>
		<div class="form-group">
			<label for="post_body">body</label>
			<textarea class="form-control {{ $errors->has('post_body') ? 'is-invalid' : '' }}" rows="10" id="post_body" name="post_body" placeholder="Post content here!"></textarea>
			<div class="invalid-feedback">{{ $errors->first('post_body') }}</div>
		</div>
		<div class="form-group">
			<input type="submit" class="form-control btn btn-success" name="submit" value="Create Post!">
		</div>
	</form>
@endsection