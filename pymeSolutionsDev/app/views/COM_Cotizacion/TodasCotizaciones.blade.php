@extends('layouts.scaffold')

@section('main')
	
	<?php $Cotizaciones = Helpers::InformacionCotizaciones(); ?>
	
	
	<div class="row">
		<div class="page-header clearfix">
			<h3 class="pull-left">&nbsp;Cotizaciones &gt; Todas las Cotizaciones</h3>
			<div class="pull-right">
				<a href="" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atr&aacute;s</a>
			</div>
		</div>
	</div>
	
	@if (Input::has('Error'))
		<?php $Error = Input::get('Error') ?>
		
		<ul>
			@if ($Error == 'Sin Seleccion')
				<li class="alert alert-danger">Debe seleccionar al menos una cotizacion para ver el detalle</li>
			@endif
		</ul>
	@endif
	
	{{ Form::open(array('route' => 'search_index')) }}
		{{ Form::label('SearchLabel', 'Busqueda: ', array('class' => 'col-md-2 control-label')) }}
		{{ Form::text('search', null, array('class' => 'col-md-4', 'form-control', 'id' => 'search', 'placeholder'=>'Buscar por nombre, ciudad, codigo..')) }}
		{{ Form::submit('Buscar', array('class' => 'btn btn-success btn-sm' )) }}
	{{ Form::close() }}
	
	{{ Form::open(array('route' => 'CotizacionesDetallesCotizacion')) }}
		<div class="row">
			<div class=" col-lg-12">
				<div  class="col-md-9" >
					<div class="col-xs-5 col-sm-6 col-md-12">
						<input type="Text"  style="width: 550px">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg" >
							<span class="glyphicon glyphicon-filter"></span>
						</button>
					</div>              
				</div>
				
				<div class="col-md-3">
					{{ Form::submit('Detalle', array('class' => 'btn btn-default btn-block col-md-6', 'name' => 'Detalle')) }}
				</div>
			</div>
		
			<div class="col-md-9" style="overflow:auto; height: 350px">
				<div class="table-responsive">
					<table class="table table-striped table-bordered" >
						<thead>
							<tr>
								<th></th>
								<th>Codigo</th>
								<th>Proveedor</th>
								<th>Fecha</th>
								<th>Vigencia</th>
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
									<td>{{ $Cotizacion -> FechaEmision }}</td>
									<td>{{ $Cotizacion -> Vigencia }}</td>
									
									@if ($Cotizacion -> Activo == 1)
										<td>Activo</td>
									@else
										<td>Inactivo</td>
									@endif
									
									@if (date_diff(date_create(date("Y-m-d")), date_create($Cotizacion -> Vigencia)) -> format("%R%a") >= 0)
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
	{{ Form::close() }}

@stop