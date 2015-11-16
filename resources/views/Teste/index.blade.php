@extends('template')

@section('title')
	Título da página
@stop


@section('content')
	
	<h1>{{ $nome }}</h1>

	<ul>
	@foreach($notas as $nota)
		<li>{{$nota}}</li>
	@endforeach
	</ul>
@stop