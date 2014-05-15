@extends('layouts.scaffold')

@section('main')

	<?php
		$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');
		$SolicitudCotizacion = Helpers::InformacionSolicitudCotizacion($CodigoSolicitudCotizacion);
		$ProductosSolicitudCotizacion = Helpers::InformacionProductosSolicitudCotizacion($CodigoSolicitudCotizacion);
		$CamposLocalesSolicitudCotizacion = Helpers::InformacionCamposLocalesSolicitudCotizacion($CodigoSolicitudCotizacion);
		$CamposLocalesCotizaciones = Helpers::InformacionCamposLocalesCotizaciones();
	?>
	
	<div class="row">
		<div class="page-header clearfix">
			<h3 class="pull-left">&nbsp;Cotizaciones &gt; Capturar Cotizaci&oacute;n &gt; Capturar</h3>
			<div class="pull-right">
				<a href="/Compras/Cotizaciones/CapturarCotizacion" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atr&aacute;s</a>
			</div>
		</div>
	</div>
	
	<ul>
		@foreach($errors -> all() as $mensaje)
			<li class="alert alert-danger">{{$mensaje}}</li>
		@endforeach
    </ul>
	
	{{ Form::open(array('route' => 'CotizacionesCapturarCotizacionCapturar')) }}
		{{Form::text('CodigoSolicitudCotizacion', $CodigoSolicitudCotizacion, array('class' => 'hidden'))}}

		<div class="row">
			<div class="col-md-4 " ></div>
			<div class="col-md-5 " style="text-align: center">
				<h2>Cotizaci&oacute;n</h2>
				<h5>Empresa X S.A.</h5>
				<h5>Colonia El &Aacute;lamo, Tegucigalpa, Francisco Moraz&aacute;n</h5>
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
							<th>C&oacute;digo</th>
							<th>Nombre</th>
							<th>Descripci&oacute;n</th>
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
						@foreach($ProductosSolicitudCotizacion as $ProductoSolicitudCotizacion)
							<tr>
								<td>{{ $ProductoSolicitudCotizacion -> Codigo }}</td>
								<td>{{ $ProductoSolicitudCotizacion -> Nombre }}</td>
								<td>{{ $ProductoSolicitudCotizacion -> Descripcion }}</td>
								<td>{{ $ProductoSolicitudCotizacion -> Cantidad }}</td>
								<td>{{ $ProductoSolicitudCotizacion -> Unidad }}</td>
								
								@foreach($CamposLocalesSolicitudCotizacion as $CampoLocalSolicitudCotizacion)
									<td>{{ $CampoLocalSolicitudCotizacion -> Valor }}</td>
								@endforeach
								
								<td>{{ Form::text($ProductoSolicitudCotizacion -> Codigo, null, array('onChange' => 'AsignarTotales("' . $ProductoSolicitudCotizacion -> Codigo . '",' . $ProductoSolicitudCotizacion -> Cantidad . ')')) }}</td>
								<td>{{ Form::text('Total' . $ProductoSolicitudCotizacion -> Codigo, null, array('readonly' => 'readonly', 'tabindex' => '-1')) }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<label>Forma de Pago: Efectivo</label>
				
				<br><br>
				
				<label>Fecha de Vigencia</label>
				{{Form::text('VigenciaCotizacion', null, array('id' => 'VigenciaCotizacion', 'readonly' => 'readonly'))}}
				<script>
					$('#VigenciaCotizacion').appendDtpicker({
						"dateFormat": "YYYY-MM-DD h:m",
						"autodateOnStart": false,
						"futureOnly": true,
						"locale":"es",
						"minTime":"08:00",
						"maxTime":"19:01",
						"minuteInterval": 15
					});
				</script>
				
				<br><br>
				
				{{-- <div class="row"> --}}
					{{ Form::submit('Guardar', array('class' => 'btn btn-sm btn-primary')) }}
				{{-- </div> --}}
			</div>
			
			<div class="col-md-8" style="text-align: right">
				<label>Total: {{ Form::text('TotalFinal', null, array('readonly' => 'readonly', 'tabindex' => '-1')) }}</label>
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
				
					<h4 class="text-center">Campos de Cotizaci&oacute;n</h4>
					
					@foreach($CamposLocalesCotizaciones as $CampoLocalCotizaciones)
						<br>
						<label class="pull-left">{{{ $CampoLocalCotizaciones -> Nombre }}}</label>
						
						@if($CampoLocalCotizaciones -> Requerido)
							<label class="pull-left">&nbsp *</label>
						@endif
						
						@if($CampoLocalCotizaciones -> Tipo == 'TXT')
							{{ Form::text($CampoLocalCotizaciones -> Codigo, null, array('class' => 'form-control', 'id' => $CampoLocalCotizaciones -> Codigo)) }}
						@endif
						
						@if($CampoLocalCotizaciones -> Tipo == 'INT')
							{{ Form::text($CampoLocalCotizaciones -> Codigo, null, array('class' => 'form-control', 'id' => $CampoLocalCotizaciones -> Codigo)) }}
						@endif
						
						@if($CampoLocalCotizaciones -> Tipo == 'FLOAT')
							{{ Form::text($CampoLocalCotizaciones -> Codigo, null, array('class' => 'form-control', 'id' => $CampoLocalCotizaciones -> Codigo)) }}
						@endif
						
						@if($CampoLocalCotizaciones -> Tipo == 'LIST')
							<?php $ValoresCampoLocalLista = Helpers::ValoresCampoLocalListaCotizacion($CampoLocalCotizaciones -> Id);?>
							
							@foreach($ValoresCampoLocalLista as $ValorCampoLocalLista)
								<?php $ValoresCampoLocalLista2[$ValorCampoLocalLista -> Valor] = $ValorCampoLocalLista -> Valor ?>
							@endforeach
							{{ Form::select($CampoLocalCotizaciones -> Codigo, $ValoresCampoLocalLista2, null, array('class' => 'form-control')) }}
						@endif
					@endforeach
				</div>
			</div>
		</div>
	{{Form::close()}}
	
@stop
