@extends('blog')

@section('title')
    {{$post->titulo}} - Laravel Blog
@stop


@section('content')
    <h1>{{$post->titulo}}</h1>
    <p>{{ $post->conteudo }}</p>

    <hr>
    <h3>Comentários</h3>
    @foreach($post->comentarios as $comentario)
    	<div class="alert alert-warning">
    		<h4>{{$comentario->nome}}</h4>
    		<p>{{$comentario->comentario}}</p>
    	</div>
    @endforeach
@stop