@extends('master')
@section('cuerpo')
<H3>Lista de peliculas</H3>
@if (session('mensaje'))
	{{ session('mensaje') }}
@endif
@stop