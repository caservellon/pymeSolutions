@extends('layouts.scaffold')

@section('main')

<div class="page-header">
<h2 class='sub-header'><i class="glyphicon glyphicon-cog"></i>Configuracion <small> Unidades Monetarias</small>
<a class='btn btn-sm btn-primary pull-right ' href="{{URL::to('contabilidad/configuracion')}}">
    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
</h2>
</div>
@if(Seguridad::AgregarUnidadesMonetarias())
<div class="btn-agregar">
<a class="btn btn-success" href="{{ URL::to('contabilidad/configuracion/unidadmonetaria/create') }}">
<i class="glyphicon glyphicon-plus"></i> Agregar Moneda</a>
</div>
@endif
@if (isset($unidadmonetarias) && $unidadmonetarias->count())

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Tasa</th>
				<th>Observacion</th>
				@if(Seguridad::EditarUnidadesMonetarias())
				<th>Acciones</th>
				@endif
			</tr>

		</thead>
		<tbody>
			@foreach ($unidadmonetarias as $unidad)
				<tr>
					<td>{{{ $unidad->CON_UnidadMonetaria_Nombre }}}</td>
					<td>{{{ $unidad->CON_UnidadMonetaria_TasaConversion }}}</td>
					<td>{{{ $unidad->CON_UnidadMonetaria_Observacion }}}</td>
					@if(Seguridad::EditarUnidadesMonetarias())
					<td><a class="btn btn-info" href="{{ URL::to('contabilidad/configuracion/unidadmonetaria/'.$unidad->CON_UnidadMonetaria_ID.'/edit') }}">
					<i class="glyphicon glyphicon-pencil"></i>	Editar</a></td>
					@endif
				</tr>
				@endforeach
		</tbody>
		

	</table>

@endif
@stop