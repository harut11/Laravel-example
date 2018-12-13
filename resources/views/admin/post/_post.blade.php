<tr>
	<td>{{ $post->id }}</td>
	<td>{{ $post->title }}</td>
	<td>{{ str_limit($post->content, 100) }}</td>
	<td>{{ $post->owner->name }}</td>
	<td>{{ $post->category->name }}</td>
	<td>
		<a href="{{ route('admin.posts.show', $post->id) }}">
			<i class="fa fa-eye"></i>
		</a>
		<a href="{{ route('admin.posts.edit', $post->id) }}">
			<i class="fa fa-pencil"></i>
		</a>
		<a href="{{ route('admin.posts.delete', $post->id) }}" data-method="delete" data-confirm="Are You sure You want to delete this shit?">
			<i class="fa fa-trash"></i>
		</a>
	</td>
</tr>