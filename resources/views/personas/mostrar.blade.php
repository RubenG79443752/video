@extends('master')

@section('cuerpo')
Nombres: {{ $persona->nombres }}<br>
Apellidos: {{ $persona->apellidos }}<br>
Fecha de nacimiento: {{ $persona->fec_nac }}<br>
Direccion: {{ $persona->direccion }}<br>
C.I.: {{ $persona->ci }}<br>
E-mail: {{ $persona->user->email }}
@stop