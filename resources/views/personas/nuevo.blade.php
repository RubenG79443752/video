@extends('master')
@section('cuerpo')
<h3>Nueva persona</h3>
{{ Form::open(['url'=>url('persona/guarda'), 'method'=>'post']) }}
	C.I.: {{ Form::number('ci', '', ['placeholder'=>'Ingrese el C.I.']) }}<br>
	Nombres: {{ Form::text('nombres', '', ['placeholder'=>'Ingrese nombres', 'required'=>true]) }}<br>
	Apellidos: {{ Form::text('apellidos', '')  }}<br>
	Direccion: {{ Form::text('direccion', '') }}<br>
	Fecha de nacimiento: {{ Form::date('fec_nac', date('Y-m-d')) }}<br>
	Correo electronico: {{ Form::email('email', '', ['required'=>true]) }}<br>
	Contraseña: {{ Form::password('password') }}<br>
	{{ Form::submit(' .: Guardar :. ') }}
	{{ Form::reset(' .: Borrar :. ') }}
{{ Form::close() }}
@stop