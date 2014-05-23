@extends('layouts.scaffold')

@section('main')
	
	@if(Input::has('Busqueda'))
		<?php $SolicitudesCotizacion = Helpers::BusquedaSolicitudesCotizacion(Input::get('Busqueda')); ?>
	@else
		<?php $SolicitudesCotizacion = Helpers::InformacionSolicitudesCotizacion(); ?>
	@endif
	
	<div class="row">
		<div class="page-header clearfix">
			<h3 class="pull-left">&nbsp;Cotizaciones &gt; Capturar Cotizaci&oacute;n</h3>
			<div class="pull-right">
				<a href="/Compras/Cotizaciones" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atr&aacute;s</a>
			</div>
		</div>
	</div>
	
	{{ Form::open(array('route' => 'CotizacionesCapturarCotizacion')) }}
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
	
	@if(Input::has('Error'))
		<?php $Error = Input::get('Error') ?>
		
		<ul>
			@if($Error == 'Sin Seleccion')
				<li class="alert alert-danger">Debe seleccionar una solicitud de cotizaci&oacute;n para poder capturar</li>
			@elseif($Error == 'Ya Capturada')
				<li class="alert alert-danger">La solicitud de cotizaci&oacute;n seleccionada ya ha sido capturada</li>
			@endif
		</ul>
	@endif
	
	@if(Input::has('Busqueda') && count($SolicitudesCotizacion) == 0)
		<li class="alert alert-danger">No se encontraron solicitudes de cotizaci&oacute;n bajo ese criterio de b&uacute;squeda</li>
	
	@elseif(!Input::has('Busqueda') && count($SolicitudesCotizacion) == 0)
		<li class="alert alert-danger">No hay solicitudes de cotizaci&oacute;n disponibles para capturar</li>
	
	@else
		{{ Form::open(array('route' => 'CotizacionesCapturarCotizacion')) }}
			<div class="row">
				<div class=" col-lg-12">
					<div  class="col-md-9">
						<div class="col-xs-5 col-sm-6 col-md-12">
						</div>
					</div>
					
					<div class="col-md-3">
						{{ Form::submit('Capturar', array('name' => 'Capturar', 'class' => 'btn btn-default btn-block col-md-6')) }}
					</div>
				</div>
			
				<div class="col-md-9" style="overflow:auto; height: 350px">
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th></th>
									<th>C&oacute;digo</th>
									<th>Proveedor</th>
									<th>Fecha de creaci&oacute;n</th>
									<th>Usuario</th>
									<th>Estado</th>
								</tr>
							</thead>
							
							<tbody >
								@foreach($SolicitudesCotizacion as $SolicitudCotizacion)
									<tr>
										<td>{{ Form::radio('Solicitud de Cotizacion', $SolicitudCotizacion -> Codigo) }}</td>
										<td>{{ $SolicitudCotizacion -> Codigo }}</td>
										<td>{{ $SolicitudCotizacion -> NombreProveedor }}</td>
										<td>{{ $SolicitudCotizacion -> FechaCreacion }}</td>
										<td>{{ $SolicitudCotizacion -> IdUsuarioCreo }}</td>
										
										@if(Helpers::CotizacionCapturada($SolicitudCotizacion -> Codigo))
											<td>Capturada</td>
										@else
											<td>En Espera</td>
										@endif
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		{{Form::close()}}
	@endif

@stop