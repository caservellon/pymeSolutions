@extends('layouts.scaffold')

@section('main')


	<?php $CodigosCotizacion = Input::get('CodigosCotizacion'); ?>

	<?php
		$CodigoCotizacion = Input::get('CodigoCotizacion');
		$Cotizacion = Helpers::InformacionCotizacion($CodigoCotizacion);
		$ProductosCotizacion = Helpers::InformacionProductosCotizacion($CodigoCotizacion);
	?>
	

	
	<div class="row">
		<div class="page-header clearfix">
			<h3 class="pull-left">&nbsp;Cotizaciones &gt; Detalles de la Cotizaci&oacute;n</h3>
			<div class="pull-right">
				<a href="/Compras/Cotizaciones/TodasCotizaciones" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atr&aacute;s</a>
			</div>
		</div>
	</div>
	

	@foreach ($CodigosCotizacion as $CodigoCotizacion)
		<?php
			$Cotizacion = Helpers::InformacionCotizacion($CodigoCotizacion);
			$ProductosCotizacion = Helpers::InformacionProductosCotizacion($CodigoCotizacion);
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
				<div class="table-responsive">
					<table class="table table-striped table-bordered" >
						<thead>
							<tr>
								<th>Codigo</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Cantidad</th>
								<th>Unidad</th>
								<th>Precio Unitario</th>
								<th>Total</th>
							</tr>
						<thead>
						
						<tbody>
							@foreach ($ProductosCotizacion as $ProductoCotizacion)
								<tr>
									<td>{{ $ProductoCotizacion -> Codigo }}</td>
									<td>{{ $ProductoCotizacion -> Nombre }}</td>
									<td>{{ $ProductoCotizacion -> Descripcion }}</td>
									<td>{{ $ProductoCotizacion -> Cantidad }}</td>
									<td></td>
									<td>Lps. {{ $ProductoCotizacion -> Precio }}</td>
									<td>Lps. {{ $ProductoCotizacion -> Cantidad * $ProductoCotizacion -> Precio }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<label>Forma de Pago: </label>
					{{ "Efectivo" }}
					
					<br><br>
					
					<label>Fecha de Vigencia: </label>
					{{ $Cotizacion[0] -> Vigencia }}
				</div>
				
				<div class="col-md-8" style="text-align: right">
					<label>Total: </label>
					{{ $Cotizacion[0] -> Total }}
				</div>
			</div>
		{{ Form::close() }}
	@endforeach

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
			<div class="table-responsive">
				<table class="table table-striped table-bordered" >
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Cantidad</th>
							<th>Unidad</th>
							<th>Precio Unitario</th>
							<th>Total</th>
						</tr>
					<thead>
					
					<tbody>
						@foreach($ProductosCotizacion as $ProductoCotizacion)
							<tr>
								<td>{{ $ProductoCotizacion -> Codigo }}</td>
								<td>{{ $ProductoCotizacion -> Nombre }}</td>
								<td>{{ $ProductoCotizacion -> Descripcion }}</td>
								<td>{{ $ProductoCotizacion -> Cantidad }}</td>
								<td></td>
								<td>Lps. {{ $ProductoCotizacion -> Precio }}</td>
								<td>Lps. {{ $ProductoCotizacion -> Cantidad * $ProductoCotizacion -> Precio }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<label>Forma de Pago: </label>
				{{ "Efectivo" }}
				
				<br><br>
				
				<label>Fecha de Vigencia: </label>
				{{ $Cotizacion[0] -> Vigencia }}
			</div>
			
			<div class="col-md-8" style="text-align: right">
				<label>Total: </label>
				{{ $Cotizacion[0] -> Total }}
			</div>
		</div>
	{{ Form::close() }}

	
@stop
