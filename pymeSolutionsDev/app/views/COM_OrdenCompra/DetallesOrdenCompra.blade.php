@extends('layouts.scaffold')

@section('main')

	<?php $CodigosOrdenCompra = Input::get('CodigosOrdenCompra'); ?>
	
	<div class="row">
		<div class="page-header clearfix">
			<h3 class="pull-left">&nbsp;Cotizaciones &gt; Detalles de la &Oacute;rden de Compra</h3>
			<div class="pull-right">
				<a href="/Compras/OrdenesCompra/TodasOrdenesCompra" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atr&aacute;s</a>
			</div>
		</div>
	</div>

	@foreach ($CodigosOrdenCompra as $CodigoOrdenCompra)
		<?php
			$OrdenCompra = Helpers::InformacionOrdenCompra($CodigoOrdenCompra);
			$ProductosOrdenCompra = Helpers::InformacionProductosOrdenCompra($CodigoOrdenCompra);
		?>
		
		{{ Form::open() }}
			<div class="row">
				<div class="col-md-4 " ></div>
				<div class="col-md-5 " style="text-align: center">
					<h2>Cotizaci&oacute;n</h2>
					<h5>Empresa X S.A.</h5>
					<h5>Colonia El &Aacute;lamo, Tegicigalpa, Francisco Moraz&aacute;n</h5>
					<h5>Honduras, C.A.</h5>
				</div>
				<div class="col-md-12 " style="text-align: right">
					<h5>Tel. 2233-4455, Fax 2244-5566</h5>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-8">
					<h4>Para:</h4>
					<h5>DPTO DE VENTAS</h5>
					<h5>{{ $OrdenCompra[0] -> NombreProveedor }}</h5>
					<h5>{{ $OrdenCompra[0] -> EmailProveedor }}</h5>
					<h5>{{ $OrdenCompra[0] -> DireccionProveedor }}</h5>
					<h5>{{ $OrdenCompra[0] -> TelefonoProveedor }}</h5>
				</div>
			</div>

			<div class="row">
				<div class="table-responsive">
					<table class="table table-striped table-bordered" >
						<thead>
							<tr>
								<th>Codigo</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Cantidad</th>
								<th>Precio Unitario</th>
								<th>Total</th>
								<th>Unidad</th>
							</tr>
						<thead>
						
						<tbody>
							@foreach($ProductosOrdenCompra as $ProductoOrdenCompra)
								<tr>
									<td>{{ $ProductoOrdenCompra -> Codigo }}</td>
									<td>{{ $ProductoOrdenCompra -> Nombre }}</td>
									<td>{{ $ProductoOrdenCompra -> Descripcion }}</td>
									<td>{{ $ProductoOrdenCompra -> Cantidad }}</td>
									<td>Lps. {{ $ProductoOrdenCompra -> Precio }}</td>
									<td>Lps. {{ $ProductoOrdenCompra -> Cantidad * $ProductoOrdenCompra -> Precio }}</td>
									<td></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<label>Fecha de Emisi&oacute;n: </label>
					{{ $OrdenCompra[0] -> FechaEmision }}
					
					<br><br>
					
					<label>Fecha de Entrega: </label>
					{{ $OrdenCompra[0] -> FechaEntrega }}
					
					<br><br>
					
					<label>Forma de Pago: </label>
					{{ "Efectivo" }}
					
					<br><br>
					
					<label>Direcci&oacute;n de Entrega: </label>
					{{ $OrdenCompra[0] -> DireccionEntrega }}
					
					<br><br>
					
					<label>Estado: </label>
					@if ($OrdenCompra[0] -> Activo)
						{{ "Activa" }}
					@else
						{{ "Inactiva" }}
					@endif
					
					
				</div>
				
				<div class="col-md-6" style="text-align: right">
					<label>Total: </label>
					{{ $OrdenCompra[0] -> Total }}
				</div>
			</div>
		{{ Form::close() }}
	@endforeach
	
@stop
