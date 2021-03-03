@extends('master')

@section('cuerpo')
<h3>Lista de idiomas</h3>
@if (session('mensaje'))
	{{ session('mensaje') }}
@endif
<table width="75%" border="1" align="center">
	<thead>
	<tr>
		<th width="5%">Nro.</th>
		<th>Idiomas</th>
		<th>sigla</th>
		<th width="35%">Opciones</th>
	</tr>
	</thead>
	<tbody>
	<?php $i=0; ?>
	@foreach ($idiomas as $idioma)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $idioma->nombre }} </td>
		<td>{{ $idioma->sigla }} </td>
		<td align="center">
			{{ Html::link(url('idioma/mostrar/'.$idioma->id), 'Mostrar') }} |
			{{ Html::link(url('idioma/'.$idioma->id.'/editar'), 'Editar') }} |
			{{ Html::link(url('idioma/eliminar/'.Crypt::encrypt($idioma->id)), 'Eliminar') }}
		</td>
	</tr>
	@endforeach
	</tbody>
</table>
@stop

@section('titulo')
- Idiomas
@stop
