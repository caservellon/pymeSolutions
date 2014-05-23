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
	
	<div class="row">
		<div class="page-header clearfix">
			<h3 class="pull-left">&nbsp;Cotizaciones &gt; Habilitar/Inhabilitar</h3>
			<div class="pull-right">
				<a href="/Compras/Cotizaciones" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atr&aacute;s</a>
			</div>
		</div>
	</div>

	{{ Form::open(array('route' => 'CotizacionesHabilitarInhabilitar')) }}
		<div class="row">
			<div class="col-md-1">
				{{ Form::label('Busqueda', 'Busqueda:', array('class' => 'control-label')) }}
			</div>
			<div class="col-md-6">
				{{ Form::text('Busqueda', null, array('class' => 'form-control', 'placeholder'=>'')) }}
			</div>
			<div class="col-md-2">
				{{ Form::submit('Buscar', array('name' => 'Buscar', 'class' => 'btn btn-success btn-sm')) }}
			</div>
			
			@if(Input::has('Busqueda'))
				<div class="col-md-2">
					{{ Form::submit('Restablecer', array('name' => 'Restablecer', 'class' => 'btn btn-info btn-sm')) }}
				</div>
			@endif
		</div>		
	{{ Form::close() }}
	
	<br>
	
	@if(Input::has('Busqueda') && count($Cotizaciones) == 0)
		<li class="alert alert-danger">No se encontraron cotizaciones bajo ese criterio de b&uacute;squeda</li>
	
	@elseif(!Input::has('Busqueda') && count($Cotizaciones) == 0)
		<li class="alert alert-danger">No hay cotizaciones disponibles para capturar</li>
	
	@else
		{{ Form::open(array('route' => 'CotizacionesHabilitarInhabilitar')) }}
		
			{{ Form::hidden('Cotizaciones', $Cotizaciones[0] -> Codigo) }}
			
			<div class="row">
				<div class=" col-lg-12">
					<div  class="col-md-9" >
						<div class="col-xs-5 col-sm-6 col-md-12">
						</div>              
					</div>
					
					<div class="col-md-3">
						{{ Form::submit('Actualizar', array('class' => 'btn btn-default btn-block col-md-6', 'name' => 'Actualizar')) }}
					</div>
				</div>
			
				<div class="col-md-9" style="overflow:auto; height: 350px">
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