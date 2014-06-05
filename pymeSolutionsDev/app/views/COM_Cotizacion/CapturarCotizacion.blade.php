@extends('layouts.scaffold')

@section('main')
	
	@if(Input::has('Busqueda'))
		<?php $SolicitudesCotizacion = Helpers::BusquedaSolicitudesCotizacion(Input::get('Busqueda')); ?>
	@else
		<?php $SolicitudesCotizacion = Helpers::InformacionSolicitudesCotizacion(); ?>
	@endif
	
	<?php $CamposLocalesSolicitudesCotizacion = Helpers::InformacionCamposLocalesSolicitudesCotizacion(); ?>
	
	
	<div class="row">
		<div class="page-header clearfix">
			<h3 class="pull-left">&nbsp;Cotizaciones &gt; Capturar Cotizaci&oacute;n</h3>
			<div class="pull-right">
				<a href="/Compras/Cotizaciones" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atr&aacute;s</a>
			</div>
		</div>
	</div>
	
	
	{{ Form::open(array('route' => 'CotizacionesCapturarCotizacion', 'class' => 'form-inline')) }}
		{{ Form::label('Busqueda', 'Busqueda:', array('class' => 'control-label')) }}
		{{ Form::text('Busqueda', null, array('class' => 'form-control', 'placeholder'=>'')) }}
		{{ Form::submit('Buscar', array('name' => 'Buscar', 'class' => 'btn btn-info btn-sm')) }}
		
		@if(Input::has('Busqueda'))
			{{ Form::submit('Restablecer', array('name' => 'Restablecer', 'class' => 'btn btn-warning btn-sm')) }}
		@endif
	{{ Form::close() }}
	
	
	@if(Input::has('Error'))
		<?php $Error = Input::get('Error'); ?>
		
		<br>
		
		@if($Error == 'Sin Seleccion')
			<div class="alert alert-danger">Debe seleccionar una solicitud de cotizaci&oacute;n para poder capturar</div>
		@endif
		
	@endif
	
	
	@if(Input::has('Busqueda') && count($SolicitudesCotizacion) == 0)
		<br>
		<div class="alert alert-danger">No se encontraron solicitudes de cotizaci&oacute;n bajo ese criterio de b&uacute;squeda</div>
	
	@elseif(!Input::has('Busqueda') && count($SolicitudesCotizacion) == 0)
		<br>
		<div class="alert alert-danger">No hay solicitudes de cotizaci&oacute;n disponibles para capturar</div>
	
	@else
		{{ Form::open(array('route' => 'CotizacionesCapturarCotizacion')) }}
			<div class="row">
				<div class="col-md-2 pull-right">
					{{ Form::submit('Capturar', array('name' => 'Capturar', 'class' => 'btn btn-success btn-block')) }}
				</div>
			</div>
			
			<br>
		
			<div class="row">
				<div class="col-md-12" style="overflow:auto; height: 350px">
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th></th>
									<th>C&oacute;digo</th>
									<th>Proveedor</th>
									<th>Fecha de creaci&oacute;n</th>
									
									@foreach($CamposLocalesSolicitudesCotizacion as $CampoLocalSolicitudesCotizacion)
										<th>{{ $CampoLocalSolicitudesCotizacion -> Nombre }}</th>
									@endforeach
									
									<th>Usuario</th>
								</tr>
							</thead>
							
							<tbody >
								@foreach($SolicitudesCotizacion as $SolicitudCotizacion)
									<tr>
										<td>{{ Form::radio('CodigoSolicitudCotizacion', $SolicitudCotizacion -> Codigo) }}</td>
										<td>{{ $SolicitudCotizacion -> Codigo }}</td>
										<td>{{ $SolicitudCotizacion -> NombreProveedor }}</td>
										<td>{{ $SolicitudCotizacion -> FechaCreacion }}</td>
										
										@foreach($CamposLocalesSolicitudesCotizacion as $CampoLocalSolicitudesCotizacion)
											<?php $CampoLocalSolicitudCotizacion = Helpers::InformacionCampoLocalSolicitudCotizacion($CampoLocalSolicitudesCotizacion -> Codigo, $SolicitudCotizacion -> Codigo) ?> 
											
											@if(count($CampoLocalSolicitudCotizacion) != 0)
												<td>{{ $CampoLocalSolicitudCotizacion[0] -> Valor }}</td>
											@else
												<td></td>
											@endif
										@endforeach
										
										<td>{{ $SolicitudCotizacion -> UsuarioCreo }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			@if(!Input::has('Busqueda'))
				<label>{{ $SolicitudesCotizacion -> links() }}</label>
			@endif
		{{Form::close()}}
	@endif
	
@stop