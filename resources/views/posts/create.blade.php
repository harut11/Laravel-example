@extends('layout')

@section('title')
Create a new post!
@endsection

@section('content')
	<form>
		<div class="form-group">
			<label for="post_title">Title</label>
			<input type="text" class="form-control" id="post_titile" name="post_titile" placeholder="Title heare!">
		</div>
		<div class="form-group">
			<label for="post_thumbnail">Thumbnail</label>
			<input type="file" class="form-control" id="post_thumbnail" name="post_thumbnail">
		</div>
		<div class="form-group">
			<label for="post_body">body</label>
			<textarea class="form-control" rows="10" id="post_body" name="post_body" placeholder="Post content here!"></textarea>
		</div>
		<div class="form-group">
			<input type="submit" class="form-control btn btn-success" name="submit" value="Create Post!">
		</div>
	</form>
@endsection