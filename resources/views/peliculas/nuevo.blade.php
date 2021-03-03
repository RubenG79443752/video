@extends('master')
@section('cuerpo')
<h3>Nueva película</h3>
<?php 
	$generos = [
		'Accion' => 'Accion',
		'Drama'		=> 'Drama',
		'Terror'	=> 'Terror',
		'Animados'	=> 'Animados',
		'Cienca ficcion' => 'Ciencia ficcion',
		'Documentales' => 'Documentales',
		'Comedias' 	=> 'Comedias'
	];
?>
{{ Form::open(['url'=>url('pelicula/guarda'), 'method'=>'post']) }}
	Título: {{ Form::text('titulo', '', ['required'=>true, 'placeholder'=>'Intro. el título']) }}<br>
	Clasificación: {{ Form::select('clasificacion', ['A'=>'Mayores de 18 años', 'B'=>'Mayores de 12 años', 'C'=>'Apto para todo público']) }}<br>
	Género: {{ Form::select('genero', $generos, 'Terror') }}<br>
	Duración (minutos): {{ Form::number('duracion', 120, ['required'=>true]) }}<br>
	Estreno (año): {{ Form::number('estreno', date('Y')) }}<br>
	Idioma: <select name="idioma_id">
	@foreach($datos['idiomas'] as $idioma)
		<option value="{{ $idioma->id }}">{{ $idioma->nombre }}</option>
	@endforeach
	</select><br>
	Actores: {{ Form::select('persona_id[]', $datos['personas'], '', ['multiple'=>true]) }}<br>
	{{ Form::submit('Guardar') }}
	{{ Form::reset('Borrar') }}
{{ Form::close() }}
@stop