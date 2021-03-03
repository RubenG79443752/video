@extends('master')
@section('cuerpo')
<h3>Nuevo idioma</h3>
{{ Form::open(['url'=>url('idioma/guarda'), 'method'=>'post']) }}
	Idioma: {{ Form::text('nombre', '', ['placeholder'=>'Ingrese nombres', 'required'=>true]) }}<br>
	Sigla: {{ Form::text('sigla', '')  }}<br>
	{{ Form::submit(' .: Guardar :. ') }}
	{{ Form::reset(' .: Borrar :. ') }}
{{ Form::close() }}
@stop