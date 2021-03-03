@extends('master')

@section('cuerpo')
<h3>Lista de actores</h3>
@if (session('mensaje'))
	{{ session('mensaje') }}
@endif
@if (session('eliminado'))
	{{ session('eliminado') }}
@endif
<table width="95%" border="1" align="center">
	<thead>
	<tr>
		<th>Nro.</th>
		<th>Nombres y apellidos</th>
		<th>C.I.</th>
		<th>Direccion</th>
		<th>Fecha de nacimiento</th>
		<th>Opciones</th>
	</tr>
	</thead>
	<tbody>
	<?php $i=0; ?>
	@foreach ($personas as $persona)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $persona->nombres.' '.$persona->apellidos }} </td>
		<td>{{ $persona->ci }} </td>
		<td>{{ $persona->direccion}} </td>
		<td>{{ $persona->fec_nac }} </td>
		<td>
			{{ Html::link(url('persona/mostrar/'.$persona->id), 'Mostrar') }} |
			{{ Html::link(url('persona/'.$persona->id.'/editar'), 'Editar') }} |
			{{ Html::link(url('persona/eliminar/'.$persona->id), 'Eliminar') }}
		</td>
	</tr>
	@endforeach
	</tbody>
</table>
@stop

@section('titulo')
- Persona
@stop

@section('pie')
	@parent
	Ediciones MARVEL
@stop

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('style/index.css') }}">
@stop