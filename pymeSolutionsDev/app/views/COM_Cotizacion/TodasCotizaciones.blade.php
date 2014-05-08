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
					<input type="submit" value="Buscar" class="btn btn-default btn-block col-md-6">
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