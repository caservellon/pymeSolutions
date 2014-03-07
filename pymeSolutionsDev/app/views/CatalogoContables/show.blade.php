@extends('layouts.layout')

@section('main')

<h1>Show CatalogoContable</h1>


<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Usuario Creacion</th>
			<th>Naturaleza Saldo</th>
			<th>Estado</th>
			<th>Clasificacion de la Cuenta</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $CatalogoContable->CON_CatalogoContable_ID }}}</td>
					<td>{{{ $CatalogoContable->CON_CatalogoContable_Codigo }}}</td>
					<td>{{{ $CatalogoContable->CON_CatalogoContable_Nombre }}}</td>
					<td>{{{ $CatalogoContable->CON_CatalogoContable_UsuarioCreacion }}}</td>
					@if ($CatalogoContable->CON_CatalogoContable_NaturalezaSaldo == 1)
					<td>Acreedor</td>
					@else
					<td>Deudor</td>
					@endif
					@if ($CatalogoContable->CON_CatalogoContable_Estado == 1)
					<td ><input id="{{{ $CatalogoContable->CON_CatalogoContable_ID }}}" type="checkbox" checked></td>
					@else 
					<td><input id="{{{ $CatalogoContable->CON_CatalogoContable_ID }}}" type="checkbox" ></td>
					@endif
					<td>{{{ $CatalogoContable->CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID }}}</td>
		</tr>
	</tbody>
</table>

@stop
