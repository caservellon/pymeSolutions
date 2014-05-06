@extends('layouts.scaffold')

@section('main')
	
	<?php $OrdenesCompra = Helpers::InformacionOrdenesCompra(); ?>
	
	
	<div class="row">
		<div class="page-header clearfix">
			<h3 class="pull-left">&nbsp;&Oacute;rdenes de Compra &gt; Todas las &Oacute;rdenes de Compra</h3>
			<div class="pull-right">
				<a href="" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atr&aacute;s</a>
			</div>
		</div>
	</div>
	
	@if (Input::has('Error'))
		<?php $Error = Input::get('Error') ?>
		
		<ul>
			@if ($Error == 'Sin Seleccion')
				<li class="alert alert-danger">Debe seleccionar una orden de compra para ver el detalle</li>
			@endif
		</ul>
	@endif
	
	{{ Form::open(array('route' => 'OrdenesCompraDetallesOrdenCompra')) }}
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
								<th>Estado</th>
								<th>Fecha</th>
							</tr>
						</thead>
						
						<tbody >
							@foreach($OrdenesCompra as $OrdenCompra)
								<tr>
									<td>{{ Form::checkbox($OrdenCompra -> Codigo, $OrdenCompra -> Codigo) }}</td>
									<td>{{ $OrdenCompra -> Codigo }}</td>
									<td>{{ $OrdenCompra -> NombreProveedor }}</td>
									
									<?php $EstadoOrdenCompra = Helpers::EstadoActualOrdenCompra($OrdenCompra -> Codigo); ?>
									
									<td>{{ $EstadoOrdenCompra[0] -> Nombre }}</td>
									
									<td>{{ $OrdenCompra -> FechaEmision }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	{{ Form::close() }}

@stop