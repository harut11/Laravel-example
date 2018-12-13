@extends('admin.layouts.app')

@section('content')
	<table class="table table-condensed table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Content</th>
				<th>Owner</th>
				<th>Category</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@each('admin.post._item', $posts, 'post', 'admin.post._empty')
		</tbody>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Content</th>
				<th>Owner</th>
				<th>Category</th>
				<th>Actions</th>
			</tr>
		</tfoot>
	</table>

@endsection