@extends('layout')

@section('title')
Welcome to posts page!
@endsection

@section('content')
	<div id="posts" class="clearfix">
		@foreach($posts as $post)
			<div class="card" style="width: 18rem; float: left;">
				<a href="posts/{{ $post->id }}">
					<img class="card-img-top img-fluid" src="/uploads/{{$post->image}}" alt="">
					<div class="card-body">
				  		<h4 class="card-title">{{$post->title}}</h4>
				  		<p class="">{{ str_limit($post->body, 70) }}</p>
					</div>
				</a>
				@auth
				<div class="clearfix">
					<a href="posts/edit/{{ $post->id }}" class="btn btn-warning" style="float: left;">Edit</a>
					<a href="posts/destroy/{{ $post->id }}" class="btn btn-danger" style="float: right;">Delete</a>
				</div>
				@endauth
			</div>
		@endforeach
	</div>
@endsection