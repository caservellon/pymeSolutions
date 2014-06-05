@extends('layouts.scaffold')

@section('main')
	
	@if(Input::has('Busqueda'))
		<?php $Cotizaciones = Helpers::BusquedaCotizaciones(Input::get('Busqueda')); ?>
	@else
		<?php $Cotizaciones = Helpers::InformacionCotizaciones(); ?>
	@endif
	
	<?php $CamposLocalesCotizaciones = Helpers::InformacionCamposLocalesCotizaciones(); ?>
	
	
	<div class="row">
		<div class="page-header clearfix">
			<h3 class="pull-left">&nbsp;Cotizaciones &gt; Todas las Cotizaciones</h3>
			<div class="pull-right">
				<a href="/Compras/Cotizaciones" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atr&aacute;s</a>
			</div>
		</div>
	</div>
	
	
	{{ Form::open(array('route' => 'CotizacionesTodasCotizaciones', 'class' => 'form-inline')) }}
		{{ Form::label('Busqueda', 'Busqueda:', array('class' => 'control-label')) }}
		{{ Form::text('Busqueda', null, array('class' => 'form-control', 'placeholder'=>'')) }}
		{{ Form::submit('Buscar', array('name' => 'Buscar', 'class' => 'btn btn-info btn-sm')) }}
		
		@if(Input::has('Busqueda'))
			{{ Form::submit('Restablecer', array('name' => 'Restablecer', 'class' => 'btn btn-warning btn-sm')) }}
		@endif
	{{ Form::close() }}
	
	
	@if (Input::has('Error'))
		<?php $Error = Input::get('Error') ?>
		
		<br>
		
		@if ($Error == 'Sin Seleccion')
			<div class="alert alert-danger">Debe seleccionar al menos una cotizaci&oacute;n para poder ver el detalle</div>
		@endif
	@endif
	
	
	@if(Input::has('Busqueda') && count($Cotizaciones) == 0)
		<br>
		<div class="alert alert-danger">No se encontraron cotizaciones bajo ese criterio de b&uacute;squeda</div>
	
	@elseif(!Input::has('Busqueda') && count($Cotizaciones) == 0)
		<br>
		<div class="alert alert-danger">No hay cotizaciones disponibles para capturar</div>
	
	@else
		{{ Form::open(array('route' => 'CotizacionesTodasCotizaciones')) }}
			<div class="row">
				<div class="col-md-2 pull-right">
					{{ Form::submit('Detalle', array('name' => 'Detalle', 'class' => 'btn btn-success btn-block')) }}
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
									<th>Vigencia</th>
									
									@foreach($CamposLocalesCotizaciones as $CampoLocalCotizaciones)
										<th>{{ $CampoLocalCotizaciones -> Nombre }}
									@endforeach
									
									<th>Estado</th>
									<th>Estado Vigencia</th>
								</tr>
							</thead>
							
							<tbody >
								@foreach($Cotizaciones as $Cotizacion)
									<tr>
										<td>{{ Form::checkbox($Cotizacion -> Codigo, $Cotizacion -> Codigo) }}</td>
										<td>{{ $Cotizacion -> Codigo }}</td>
										<td>{{ $Cotizacion -> NombreProveedor }}</td>
										<td>{{ $Cotizacion -> FechaCreacion }}</td>
										<td>{{ $Cotizacion -> Vigencia }}</td>
										
										@foreach($CamposLocalesCotizaciones as $CampoLocalCotizaciones)
											<?php $ValorCampoLocalCotizacion = Helpers::InformacionCampoLocalCotizacion($CampoLocalCotizaciones -> Codigo, $Cotizacion -> Codigo) ?> 
											
											@if(count($ValorCampoLocalCotizacion) != 0)
												<td>{{ $ValorCampoLocalCotizacion[0] -> Valor }}</td>
											@else
												<td></td>
											@endif
										@endforeach
										
										@if($Cotizacion -> Activo == 1)
											<td>Activa</td>
										@else
											<td>Inactiva</td>
										@endif
										
										@if($Cotizacion -> Vigente)
											<td>Vigente</td>
										@else
											<td>Vencida</td>
										@endif
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			@if(!Input::has('Busqueda'))
				<label>{{ $Cotizaciones -> links() }}</label>
			@endif
		{{ Form::close() }}
	@endif
@stop