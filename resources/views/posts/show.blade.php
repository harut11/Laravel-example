@extends('layout')

@section('title')
{{ $post->title }}
@endsection

@section('content')
	<div id="post_box">
		<img src="/images/{{ $post->image }}" alt="" />
	    <h1>{{ $post->title }}</h1>
	    <p class="mb-0">{{ $post->body }}</p>
	</div>
@endsection