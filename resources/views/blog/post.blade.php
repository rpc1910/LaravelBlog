@extends('blog')

@section('title')
    {{$post['titulo']}} - Laravel Blog
@stop


@section('content')
    <h1>{{$post['titulo']}}</h1>
    <p>{{ $post['conteudo'] }}</p>
@stop