@extends('blog')

@section('title')
	Admin Laravel Blog
@stop


@section('content')
	<h1>Editar Post: {{$post->titulo}}</h1>
	
	@if($errors->any())
		<ul class="alert alert-danger">
			@foreach($errors->all() AS $erro)
				<li>{{ $erro }}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::model($post, ['route' => ['admin.posts.atualizar', $post->id], 'method'=>'put']) !!}

	@include("admin/posts/_form")

	<div class="form-group">
		{!! Form::label('tags', 'Tags:') !!}
		{!! Form::text('tags', $post->tagList, ['class'=>'form-control']); !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Inserir', ['class'=> 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}
	
@stop