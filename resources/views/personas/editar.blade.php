@extends('master')
@section('cuerpo')
<h3>Nueva persona</h3>
{{ Form::open(['url'=>url('persona/actualizar'), 'method'=>'post']) }}
	C.I.: {{ Form::number('ci', $persona->ci, ['disabled'=>true]) }}<br>
	Nombres: {{ Form::text('nombres', $persona->nombres, ['readonly'=>true]) }}<br>
	Apellidos: {{ Form::text('apellidos', $persona->apellidos, ['readonly'=>true])  }}<br>
	Direccion: {{ Form::text('direccion', $persona->direccion) }}<br>
	Fecha de nacimiento: {{ Form::date('fec_nac', $persona->fec_nac, ['readonly'=>true]) }}<br>
	Correo electronico: {{ Form::email('email', $persona->user->email, ['required'=>true]) }}<br>
	{{ Form::hidden('id', $persona->id) }}
	{{ Form::submit(' .: Guardar :. ') }}
	{{ Form::reset(' .: Borrar :. ') }}
{{ Form::close() }}
@stop