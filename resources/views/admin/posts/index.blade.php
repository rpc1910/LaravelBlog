@extends('blog')

@section('title')
	Admin Laravel Blog
@stop


@section('content')
	<h1>Admin Laravel Blog</h1>
	
	<p><a href="{{route('admin.posts.create')}}" class="btn btn-success">Inserir</a></p>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)
			<tr>
				<td>{{$post->id}}</td>
				<td>{{$post->titulo}}</td>
				<td>
					<a href="{{route('admin.posts.editar', ['id'=>$post->id])}}" class="btn btn-primary">Editar</a> 
					<a href="{{route('admin.posts.apagar', ['id'=>$post->id])}}" class="btn btn-danger">Apagar</a> 
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{!! $posts->render() !!}
@stop