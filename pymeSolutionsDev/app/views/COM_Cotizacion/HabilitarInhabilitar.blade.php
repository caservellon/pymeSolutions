@extends('layouts.scaffold')

@section('main')
	
	@if(Input::has('Busqueda'))
		<?php
		$Cotizaciones = Helpers::BusquedaCotizaciones(Input::get('Busqueda'));
		//$Cotizaciones = Session::get('CotizacionesBusqueda');
		//return var_dump($Cotizaciones);
		?>
	@else
		<?php $Cotizaciones = Helpers::InformacionCotizaciones(); ?>
	@endif
	
	<?php $Cot = 3; ?>
	<div class="row">
		<div class="page-header clearfix">
			<h3 class="pull-left">&nbsp;Cotizaciones &gt; Habilitar/Inhabilitar</h3>
			<div class="pull-right">
				<a href="/Compras/Cotizaciones" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atr&aacute;s</a>
			</div>
		</div>
	</div>

	
	{{ Form::open(array('route' => 'CotizacionesHabilitarInhabilitar', 'class' => 'form-inline')) }}
		{{ Form::label('Busqueda', 'Busqueda:', array('class' => 'control-label')) }}
		{{ Form::text('Busqueda', null, array('class' => 'form-control', 'placeholder'=>'')) }}
		{{ Form::submit('Buscar', array('name' => 'Buscar', 'class' => 'btn btn-info btn-sm')) }}
		
		@if(Input::has('Busqueda'))
			{{ Form::submit('Restablecer', array('name' => 'Restablecer', 'class' => 'btn btn-warning btn-sm')) }}
		@endif
	{{ Form::close() }}
	
	
	@if(Input::has('Busqueda') && count($Cotizaciones) == 0)
		<br>
		<li class="alert alert-danger">No se encontraron cotizaciones bajo ese criterio de b&uacute;squeda</li>
	
	@elseif(!Input::has('Busqueda') && count($Cotizaciones) == 0)
		<br>
		<li class="alert alert-danger">No hay cotizaciones disponibles para capturar</li>
	
	@else
		{{ Form::open(array('action' => array('CotizacionController@HabilitarInhabilitar', $Cot))) }}
			<div class="row">
				<div class="col-md-2 pull-right">
					{{ Form::submit('Actualizar', array('name' => 'Actualizar', 'class' => 'btn btn-success btn-block')) }}
				</div>
			</div>
			
			<br>
		
			<div class="row">
				<div class="col-md-12" style="overflow:auto; height: 350px">
					<div class="table-responsive">
						<table class="table table-striped table-bordered" >
							<thead>
								<tr>
									<th>C&oacute;digo</th>
									<th>Proveedor</th>
									<th>Fecha de creaci&oacute;n</th>
									<th>Vigencia</th>
									<th>Activa / Inactiva</th>
								</tr>
							</thead>
							
							<tbody >
								@foreach($Cotizaciones as $Cotizacion)
									<tr>
										<td>{{ $Cotizacion -> Codigo }}</td>
										<td>{{ $Cotizacion -> NombreProveedor }}</td>
										<td>{{ $Cotizacion -> FechaCreacion }}</td>
										<td>{{ $Cotizacion -> Vigencia }}</td>
										{{--<td>{{ $Cotizacion -> Activo }}</td>--}}
										<td>{{ Form::checkbox($Cotizacion -> Codigo, $Cotizacion -> Codigo, $Cotizacion -> Activo) }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		{{ Form::close() }}
	@endif
@stop