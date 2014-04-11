@extends('layouts.scaffold')

@section('main')
	
	<?php $SolicitudesCotizacion = Helpers::InformacionSolicitudesCotizacion(); ?>
	
	
	<div class="row">
		<div class="page-header clearfix">
			<h3 class="pull-left">&nbsp;Cotizaciones &gt; Capturar Cotizaci&oacute;n</h3>
			<div class="pull-right">
				<a href="" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atr&aacute;s</a>
			</div>
		</div>
	</div>
	
	{{ Form::open(array('route' => 'CotizacionesCapturarCotizacion')) }}
		<div class="row">
			<div class=" col-lg-12">
				<div  class="col-md-9">
					<div class="col-xs-5 col-sm-6 col-md-12">
						<input type="Text"  style="width: 550px">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg">
							<span class="glyphicon glyphicon-filter"></span>
						</button>
					</div>
				</div>
				
				<div class="col-md-3">
					<input type="submit" value="Buscar" class="btn btn-default btn-block col-md-6">
					{{ Form::submit('Capturar', array('class' => 'btn btn-default btn-block col-md-6', 'name' => 'Capturar')) }}
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
								<th>Fecha</th>
								<th>Usuario</th>
								<th>Estado</th>
							</tr>
						</thead>
						
						<tbody >
							@foreach($SolicitudesCotizacion as $SolicitudCotizacion)
								@if ($SolicitudCotizacion -> Activo == 1 && $SolicitudCotizacion -> Recibido == 1)
									<tr>
										<td>{{ Form::checkbox($SolicitudCotizacion -> Codigo, $SolicitudCotizacion -> Codigo) }}</td>
										<td>{{ $SolicitudCotizacion -> Codigo }}</td>
										<td>{{ $SolicitudCotizacion -> NombreProveedor }}</td>
										<td>{{ $SolicitudCotizacion -> FechaEmision }}</td>
										<td>{{ $SolicitudCotizacion -> IdUsuarioCreo }}</td>
										
										@if (Helpers::CotizacionCapturada($SolicitudCotizacion -> Codigo))
											<td>Capturada</td>
										@elseif ($SolicitudCotizacion -> Recibido == 1)
											<td>Recibida</td>
										@else
											<td>En Espera</td>
										@endif
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	{{Form::close()}}
	
@stop