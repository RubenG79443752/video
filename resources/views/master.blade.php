<!DOCTYPE html>
<html>
<head>
	<!-- sección de hojas de estilo -->
	<title>SIP @section('titulo') @show </title>
	<link rel="stylesheet" type="text/css" href="{{ asset('style/estilo.css') }}">
	{{ Html::style(asset('style/body.css')) }}
	@section('styles') @show
	<!-- Fin de sección -->
	<!-- Sección de javascript -->
	{{ Html::script(asset('script/saludo.js')) }}
	@section('script') @show
	<!-- Fin de sección -->
</head>
<body>
<table width="100%" border="1">
	<tr>
		<td colspan="2">@include('encabezado')</td>
	</tr>
	<tr>
		<td width="20%" valign="top">@include('enlaces')</td>
		<td>@yield('cuerpo')</td>
	</tr>
	<tr>
		<td colspan="2">
			@section('pie')
				Aqui informacion de contacto
			@show
		</td>
	</tr>
</table>
</body>
</html>
