@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Periodo Contable</small></h2>
<div class="pull-right">
	<a href="{{{ URL::to('contabilidad/configuracion') }}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
</div>
<div class="btn-agregar">
	<a type="button" href="{{ URL::to('contabilidad/configuracion/periodocontable/create') }}" class="btn btn-success">
	  <i class="glyphicon glyphicon-plus"></i> Agregar Periodo Contable
	</a>
</div>

<div class="table-responsive">
	<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nombre del Periodo Contable</th>
						<th>Cantidad Dias del Periodo</th>
						<th>Accion</th>
					</tr>
				</thead>

			
			<tbody>
		@foreach ($ClasificacionPeriodo as $Clasificacion)
			<tr>
				<td>{{ $Clasificacion->CON_ClasificacionPeriodo_Nombre  }}</td>
				<td>{{ $Clasificacion->CON_ClasificacionPeriodo_CatidadDias  }}</td>
				<td><a class="btn btn-info" href="{{ URL::to('contabilidad/configuracion/periodocontable/'.$Clasificacion->CON_ClasificacionPeriodo_ID.'/edit') }}"><i class='glyphicon glyphicon-pencil'></i> Editar</a>
			</tr>
		@endforeach	
		</tbody>
	</table>
</div>
@stop