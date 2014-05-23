@extends('layouts.scaffold')

@section('main')

	<?php 
		$CodigosCotizacion = Input::get('CodigosCotizacion');
		$FormasPago = Helpers::InformacionFormasPago();
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
			$SolicitudCotizacionDeCotizacion = Helpers::InformacionSolicitudCotizacionDeCotizacion($CodigoCotizacion);
			$CamposLocalesSolicitudCotizacion = Helpers::InformacionCamposLocalesSolicitudCotizacion($SolicitudCotizacionDeCotizacion[0] -> Codigo);
			$CamposLocalesCotizaciones = Helpers::InformacionCamposLocalesCotizaciones();
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
								
								@foreach($CamposLocalesSolicitudCotizacion as $CampoLocalSolicitudCotizacion)
									<th>{{ $CampoLocalSolicitudCotizacion -> Nombre }}</th>
								@endforeach
								
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
									<td>{{ number_format($ProductoCotizacion -> Cantidad) }}</td>
									<td>{{ $ProductoCotizacion -> Unidad }}</td>
									
									@foreach($CamposLocalesSolicitudCotizacion as $CampoLocalSolicitudCotizacion)
										<td>{{ $CampoLocalSolicitudCotizacion -> Valor }}</td>
									@endforeach
									
									<td>{{ number_format($ProductoCotizacion -> Precio, 2) }}</td>
									<td>{{ number_format($ProductoCotizacion -> Cantidad * $ProductoCotizacion -> Precio, 2) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5">
					<label>Forma de Pago:</label>
					{{ $Cotizacion[0] -> FormaPago }}
				
					<br><br>
					
					<label>Cantidad de Pagos:</label>
					{{ $Cotizacion[0] -> CantidadPagos }}
					
					<br><br>
					
					<label>Per&iacute;odo de Gracia:</label>
					{{ $Cotizacion[0] -> PeriodoGracia }}
					
					<br><br>
					
					<label>Fecha de Vigencia: </label>
					{{ $Cotizacion[0] -> Vigencia }}
				</div>
				
				<div class="col-md-7" style="text-align: right">
					<label>Total: </label>
					{{ number_format($Cotizacion[0] -> Total, 2) }}
				</div>
				
				<br>
				<br>
				
				<div class="col-md-5 pull-right" style="text-align: right">
					<div class="form-group" id="campos Locales">
						{{--
						<h4 class="text-center">Campos de Solicitud de Cotizaci&oacute;n</h4>
						
						@foreach($CamposLocalesSolicitudCotizacion as $CampoLocalSolicitudCotizacion)
							<br>
							<label class="pull-left">{{ $CampoLocalSolicitudCotizacion -> Nombre }}</label>
							{{ Form::text($CampoLocalSolicitudCotizacion -> Valor, $CampoLocalSolicitudCotizacion -> Valor, array('class' => 'form-control', 'disabled')) }}
						@endforeach
						--}}
						<br>
						<br>
						
						@if(Helpers::TieneCamposLocalesCotizacion($CodigoCotizacion))
							<h4 class="text-center">Campos de Cotizaci&oacute;n</h4>
						
							@foreach($CamposLocalesCotizaciones as $CampoLocalCotizaciones)
								<?php $ValorCampoLocalCotizacion = Helpers::InformacionCampoLocalCotizacion($CampoLocalCotizaciones -> Codigo, $CodigoCotizacion) ?> 
								
								@if(count($ValorCampoLocalCotizacion) != 0)
									<br>
									<label class="pull-left">{{{ $CampoLocalCotizaciones -> Nombre }}}</label>
									
									{{ Form::text($CampoLocalCotizaciones -> Codigo, $ValorCampoLocalCotizacion[0] -> Valor, array('class' => 'form-control', 'id' => $CampoLocalCotizaciones -> Codigo, 'disabled')) }}
								@endif
							@endforeach
						@endif
					</div>
				</div>
			</div>
			
			<br>
			<br>
		{{ Form::close() }}
	@endforeach

@stop
