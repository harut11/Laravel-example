@extends('layout')

@section('title')
Welcome to posts page!
@endsection

@section('content')
	<div id="posts" class="clearfix">
		@foreach($posts as $post)
			<div class="card" style="width: 18rem; float: left;">
				<a href="posts/{{ $post->id }}">
					<img class="card-img-top" src="/images/{{$post->image}}" alt="">
					<div class="card-body">
				  		<h4 class="card-title">{{$post->title}}</h4>
					</div>
				</a>
			</div>
		@endforeach
	</div>
@endsection