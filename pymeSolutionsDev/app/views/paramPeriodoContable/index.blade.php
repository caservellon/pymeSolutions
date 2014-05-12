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
				<td>
					<div class="row">
						<div class="col-sm-3">
			        	<a class="btn btn-info" href="{{ URL::route('con.editperiodo',$Clasificacion->CON_ClasificacionPeriodo_ID)}}">
						<i class='glyphicon glyphicon-pencil'></i> Editar</a>
						</div>
						<div class="col-sm-2">
						<?php 
							if ($Clasificacion->deleted_at==null){
							 $route=URL::route('con.deleteperiodo',$Clasificacion->CON_ClasificacionPeriodo_ID);
							 $text="Deshabilitar";
							 $class="danger";
							}else{
							 	$route=URL::route('con.enableperiodo',$Clasificacion->CON_ClasificacionPeriodo_ID);
							 	$text="Habilitar";
							 	$class="warning";
							} 
						 ?>
						

						<form method="post" action="{{{$route}}}">
					        <button type='submit' class="btn btn-{{$class}}" role="button">
					        <i class="glyphicon glyphicon-trash"></i> {{{$text}}}</button>
				        </form>
				        </div>
			        </div>

				</td>
			</tr>
		@endforeach	
		</tbody>
	</table>
</div>
@stop