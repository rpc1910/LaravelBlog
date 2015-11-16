@extends('blog')

@section('title')
	Laravel Blog
@stop


@section('content')
	<h1>Laravel Blog</h1>
	<p>Projeto desenvolvido para o estudo de Laravel 5</p>

	@foreach($posts as $post)
		<article>
			<h2>{{ $post['titulo'] }}</h2>
			<p>{{ $post['conteudo'] }}</p>
			<p><a href="/post/{{ $post['id'] }}">Leia mais</a></p>
			<hr>
		</article>
	@endforeach
@stop