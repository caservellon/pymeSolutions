@extends('layouts.scaffold')

@section('main')

	<?php
		$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');
		$SolicitudCotizacion = Helpers::InformacionSolicitudCotizacion($CodigoSolicitudCotizacion);
		$FormasPago = Helpers::InformacionFormasPago();
		$ProductosSolicitudCotizacion = Helpers::InformacionProductosSolicitudCotizacion($CodigoSolicitudCotizacion);
		$CamposLocalesSolicitudCotizacion = Helpers::InformacionCamposLocalesSolicitudCotizacion($CodigoSolicitudCotizacion);
		$CamposLocalesCotizaciones = Helpers::InformacionCamposLocalesCotizaciones();
		$HayErrores = false;
	?>
	
	<div class="row">
		<div class="page-header clearfix">
			<h3 class="pull-left">&nbsp;Cotizaciones &gt; Capturar Cotizaci&oacute;n &gt; Capturar</h3>
			<div class="pull-right">
				<a href="/Compras/Cotizaciones/CapturarCotizacion" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atr&aacute;s</a>
			</div>
		</div>
	</div>
	
	<ul type="none">
		@foreach($errors -> all() as $mensaje)
			<li class="alert alert-danger">{{ $mensaje }}</li>
			<?php $HayErrores = true; ?>
		@endforeach
    </ul>
	
	{{ Form::open(array('route' => 'CotizacionesCapturarCotizacionCapturar')) }}
		{{ Form::text('CodigoSolicitudCotizacion', $CodigoSolicitudCotizacion, array('class' => 'hidden')) }}

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
							<th>Precio Unitario</th>
							<th>Total</th>
						</tr>
					<thead>
					
					<tbody>
						@foreach($ProductosSolicitudCotizacion as $ProductoSolicitudCotizacion)
							@if($HayErrores)
								<tr>
									<td>{{ $ProductoSolicitudCotizacion -> Codigo }}</td>
									<td>{{ $ProductoSolicitudCotizacion -> Nombre }}</td>
									<td>{{ $ProductoSolicitudCotizacion -> Descripcion }}</td>
									<td>{{ $ProductoSolicitudCotizacion -> Cantidad }}</td>
									<td>{{ $ProductoSolicitudCotizacion -> Unidad }}</td>
									
									<?php
										$Input = Session::get('_old_input');
										$PrecioUnitario['COM_DetalleCotizacion_PrecioUnitario'] = $Input[$ProductoSolicitudCotizacion -> Codigo];
										$Validacion = Validator::make($PrecioUnitario, COM_DetalleCotizacion::$rules);
									?>
									
									<td>
										@if($Validacion -> fails())
											<div class="form-group has-error has-feedback">
												{{ Form::text($ProductoSolicitudCotizacion -> Codigo, null, array('class' => 'form-control', 'onChange' => 'AsignarTotales("' . $ProductoSolicitudCotizacion -> Codigo . '",' . $ProductoSolicitudCotizacion -> Cantidad . ')')) }}
												<span class="glyphicon glyphicon-remove form-control-feedback"></span>
											</div>
										@else
											<div class="form-group has-success has-feedback">
												{{ Form::text($ProductoSolicitudCotizacion -> Codigo, null, array('class' => 'form-control', 'onChange' => 'AsignarTotales("' . $ProductoSolicitudCotizacion -> Codigo . '",' . $ProductoSolicitudCotizacion -> Cantidad . ')')) }}
												<span class="glyphicon glyphicon-ok form-control-feedback"></span>
											</div>
										@endif
									</td>
									
									<td>{{ Form::text('Total' . $ProductoSolicitudCotizacion -> Codigo, null, array('class' => 'form-control', 'readonly' => 'readonly', 'disabled')) }}</td>
								</tr>
							@else
								<tr>
									<td>{{ $ProductoSolicitudCotizacion -> Codigo }}</td>
									<td>{{ $ProductoSolicitudCotizacion -> Nombre }}</td>
									<td>{{ $ProductoSolicitudCotizacion -> Descripcion }}</td>
									<td>{{ $ProductoSolicitudCotizacion -> Cantidad }}</td>
									<td>{{ $ProductoSolicitudCotizacion -> Unidad }}</td>
									<td>{{ Form::text($ProductoSolicitudCotizacion -> Codigo, null, array('class' => 'form-control', 'onChange' => 'AsignarTotales("' . $ProductoSolicitudCotizacion -> Codigo . '",' . $ProductoSolicitudCotizacion -> Cantidad . ')')) }}</td>
									<td>{{ Form::text('Total' . $ProductoSolicitudCotizacion -> Codigo, null, array('class' => 'form-control', 'readonly' => 'readonly', 'disabled')) }}</td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				@foreach($FormasPago as $FormaPago)
					<?php $FormasPago2[$FormaPago -> IdFormaPago] = $FormaPago -> Nombre; ?>
				@endforeach
				{{ Form::label('FormaPago', 'Forma de Pago:') }}
				{{ $SolicitudCotizacion[0] -> FormaPago }}
				
				<br><br>
				
				{{ Form::label('CantidadPagos', 'Cantidad de Pagos:') }}
				{{ $SolicitudCotizacion[0] -> CantidadPagos }}
				
				<br><br>
				
				{{ Form::label('PeriodoGracia', 'Per&iacute;odo de Gracia:') }}
				{{ $SolicitudCotizacion[0] -> PeriodoGracia }}
				
				<br><br>
				
				{{ Form::label('FechaVigencia', 'Fecha de Vigencia') }}
				{{ Form::text('VigenciaCotizacion', null, array('id' => 'VigenciaCotizacion', 'class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => 'Hacer clic para agregar fecha')) }}
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
				
				
				{{ Form::submit('Guardar', array('class' => 'btn btn-success')) }}
			</div>
			
			<div class="col-md-5">
			</div>
			
			<div class="col-md-3 align-right">
				{{ Form::label('Impuesto', 'Impuesto') }}
			
				@if($HayErrores)
					<?php
						$Input2 = Session::get('_old_input');
						$Impuesto2['COM_Cotizacion_ISV'] = $Input2['ImpuestoCotizacion'];
						$Validacion2 = Validator::make($Impuesto2, Cotizacion::$rules, Cotizacion::$messages);
					?>
					
					@if($Validacion2 -> fails())
						<div class="form-group has-error has-feedback">
							{{ Form::text('ImpuestoCotizacion', null, array('class' => 'form-control', 'onChange' => 'AsignarTotales("ImpuestoCotizacion", 0)')) }}
							<span class="glyphicon glyphicon-remove form-control-feedback"></span>
						</div>
					@else
						<div class="form-group has-success has-feedback">
							{{ Form::text('ImpuestoCotizacion', null, array('class' => 'form-control', 'onChange' => 'AsignarTotales("ImpuestoCotizacion", 0)')) }}
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
					@endif
				@else
					{{ Form::text('ImpuestoCotizacion', null, array('class' => 'form-control', 'onChange' => 'AsignarTotales("ImpuestoCotizacion", 0)')) }}
				@endif
				
				<br><br>
			
				{{ Form::label('Total', 'Total:') }}
				{{ Form::text('TotalFinal', null, array('class' => 'form-control', 'readonly' => 'readonly', 'disabled')) }}
			</div>
			
			<br><br>
			
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
					<br><br>
				
					@if(count($CamposLocalesCotizaciones) != 0)
						<h4 class="text-center">Campos de Cotizaci&oacute;n</h4>
					@endif
					
					@foreach($CamposLocalesCotizaciones as $CampoLocalCotizaciones)
						<br>
						<label class="pull-left">{{{ $CampoLocalCotizaciones -> Nombre }}}</label>
						
						@if($CampoLocalCotizaciones -> Requerido)
							<label class="pull-left">&nbsp; *</label>
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
							<?php $ElementosCampoLocalListaCotizaciones = Helpers::InformacionCampoLocalListaCotizaciones($CampoLocalCotizaciones -> Id);?>
							
							@foreach($ElementosCampoLocalListaCotizaciones as $ElementoCampoLocalListaCotizaciones)
								<?php $ElementosCampoLocalListaCotizaciones2[$ElementoCampoLocalListaCotizaciones -> Valor] = $ElementoCampoLocalListaCotizaciones -> Valor ?>
							@endforeach
							{{ Form::select($CampoLocalCotizaciones -> Codigo, $ElementosCampoLocalListaCotizaciones2, null, array('class' => 'form-control')) }}
						@endif
					@endforeach
				</div>
			</div>
		</div>
	{{Form::close()}}
	
@stop
