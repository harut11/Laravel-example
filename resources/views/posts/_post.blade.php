<div class="card" style="width: 18rem; float: left;">
	<a href="{{ route('posts.show', $post->id) }}">
		<img class="card-img-top img-fluid" src="{{ asset('/uploads/' . $post->image) }}" alt="">
		<div class="card-body">
	  		<h4 class="card-title">{{$post->title}}</h4>
	  		<p class="">{{ str_limit($post->body, 70) }}</p>
		</div>
	</a>
	@auth
	<div class="clearfix">
		<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning" style="float: left;">Edit</a>
		<form method="post" action="{{ route('posts.delete', $post->id) }}">
			@csrf
			@method('delete')
			<input type="submit" value="Delete" class="btn btn-danger" style="float: right;">
		</form>
	</div>
	@endauth
</div>