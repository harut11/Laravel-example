@extends('layout')

@section('title')
Welcome to posts page!
@endsection

@section('content')
	<div class="categories2">
		<ul class="list-unstyled">
			@foreach ($categories as $category)
				<li><a href="">{{ $category->title }}</a></li>
			@endforeach
		</ul>
	</div>
	
	<div id="posts" class="clearfix">
		@each('posts._post', $posts, 'post', 'posts._empty')
	</div>
	
	<div class="d-flex mt-3 justify-content-center">
		{{  $posts->links() }}
	</div>
@endsection