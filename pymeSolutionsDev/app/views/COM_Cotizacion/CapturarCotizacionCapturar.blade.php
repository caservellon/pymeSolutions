@extends('layouts.scaffold')

@section('main')

	<script type="text/javascript" src="/assets/javascript/jquery.simple-dtpicker.js"></script>
    <link type="text/css" href="/assets/javascript/jquery.simple-dtpicker.css" rel="stylesheet" />
    <script type="text/javascript" src="/assets/javascript/datetimepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery.simple-dtpicker.css">

	<?php
		$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');
		$SolicitudCotizacion = Helpers::InformacionSolicitudCotizacion($CodigoSolicitudCotizacion);
		$FormasPago = Helpers::InformacionFormasPago();
		$ProductosSolicitudCotizacion = Helpers::InformacionProductosSolicitudCotizacion($CodigoSolicitudCotizacion);
		$CamposLocalesCotizaciones = Helpers::InformacionCamposLocalesCotizaciones();
		
		$Input = Session::get('_old_input');
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
		@if(Input::has('Errores'))
			<?php
				$Errores = Session::get('Errores');
				$HayErrores = true;
			?>
			
			@foreach($Errores as $Error)
				<li class="alert alert-danger">{{ $Error }}</li>
			@endforeach
		@endif
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
										$PrecioUnitario = $Input[$ProductoSolicitudCotizacion -> Codigo];
										
										$HayError = false;
										
										if($PrecioUnitario == '' || !Helpers::EsDecimalMayorCero($PrecioUnitario)){
											$HayError = true;
										}
									?>
									
									<td>
										@if($HayError)
											<div class="form-group has-error has-feedback">
												<label class="control-label" for="inputError2">.</label>
												{{ Form::text($ProductoSolicitudCotizacion -> Codigo, null, array('class' => 'form-control', 'onChange' => 'AsignarTotales("' . $ProductoSolicitudCotizacion -> Codigo . '",' . $ProductoSolicitudCotizacion -> Cantidad . ')')) }}
												<span class="glyphicon glyphicon-remove form-control-feedback"></span>
											</div>
										@else
											<div class="form-group has-success has-feedback">
												<label class="control-label" for="inputSuccess2">.</label>
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
				@if($HayErrores)
					<?php
						$Fecha = $Input['VigenciaCotizacion'];
						
						$HayError = false;
										
						if($Fecha == '' ){
							$HayError = true;
						}
					?>
					
					@if($HayError)
						<div class="form-group has-error has-feedback">
							<label class="control-label" for="inputError2">Fecha de Vigencia</label>
							{{ Form::text('VigenciaCotizacion', null, array('id' => 'VigenciaCotizacion', 'class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => 'Hacer clic para agregar fecha')) }}
							<span class="glyphicon glyphicon-remove form-control-feedback"></span>
						</div>
					@else
						<div class="form-group has-success has-feedback">
							<label class="control-label" for="inputSuccess2">Fecha de Vigencia</label>
							{{ Form::text('VigenciaCotizacion', null, array('id' => 'VigenciaCotizacion', 'class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => 'Hacer clic para agregar fecha')) }}
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
					@endif
				@else
					{{ Form::label('FechaVigencia', 'Fecha de Vigencia') }}
					{{ Form::text('VigenciaCotizacion', null, array('id' => 'VigenciaCotizacion', 'class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => 'Hacer clic para agregar fecha')) }}
				@endif
				
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
				@if($HayErrores)
					<?php
						$Impuesto = $Input['ImpuestoCotizacion'];
						
						$HayError = false;
										
						if($Impuesto == '' || !Helpers::EsDecimalMayorCero($Impuesto)){
							$HayError = true;
						}
					?>
					
					@if($HayError)
						<div class="form-group has-error has-feedback">
							<label class="control-label" for="inputError2">Impuesto(%)</label>
							{{ Form::text('ImpuestoCotizacion', null, array('class' => 'form-control', 'onChange' => 'AsignarTotales("ImpuestoCotizacion", 0)')) }}
							<span class="glyphicon glyphicon-remove form-control-feedback"></span>
						</div>
					@else
						<div class="form-group has-success has-feedback">
							<label class="control-label" for="inputSuccess2">Impuesto(%)</label>
							{{ Form::text('ImpuestoCotizacion', null, array('class' => 'form-control', 'onChange' => 'AsignarTotales("ImpuestoCotizacion", 0)')) }}
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
					@endif
				@else
					{{ Form::label('Impuesto', 'Impuesto(%)') }}
					{{ Form::text('ImpuestoCotizacion', '15', array('class' => 'form-control', 'onChange' => 'AsignarTotales("ImpuestoCotizacion", 0)')) }}
				@endif
				
				<br><br>
				
				{{ Form::label('Total', 'Total:') }}
				{{ Form::text('TotalFinal', null, array('class' => 'form-control', 'readonly' => 'readonly', 'disabled')) }}
			</div>
			
			<br><br>
			
			<div class="col-md-5 pull-right" style="text-align: right">
				<div class="form-group" id="campos Locales">
					<br><br>
					
					@if(Helpers::ExistenCamposLocalesCotizaciones())
						<h4 class="text-center">Campos Locales</h4>
						
						@foreach($CamposLocalesCotizaciones as $CampoLocalCotizaciones)
							<br>
							
							@if($HayErrores)
								<?php
									$ValorCampoLocal = $Input[$CampoLocalCotizaciones -> Codigo];
									
									$HayError = false;
													
									if($ValorCampoLocal == ''){
										if($CampoLocalCotizaciones -> Requerido){
											$HayError = true;
										}
									}else{
										switch($CampoLocalCotizaciones -> Tipo){
											case 'TXT':
												if(Helpers::EsAlfaEspacio($ValorCampoLocal)){
													$HayError = true;
												}
											break;
											
											case 'INT':
												if(!Helpers::EsEntero($ValorCampoLocal)){
													$HayError = true;
												}
											break;
												
											case 'FLOAT':
												if(!Helpers::EsDecimal($ValorCampoLocal)){
													$HayError = true;
												}
											break;
											
											default:
											break;
										}
									}
								?>
								
								@if($HayError)
									@if($CampoLocalCotizaciones -> Tipo == 'TXT' || $CampoLocalCotizaciones -> Tipo == 'INT' || $CampoLocalCotizaciones -> Tipo == 'FLOAT')
										<div class="form-group has-error has-feedback">
											<label class="control-label pull-left" for="inputError2">{{ $CampoLocalCotizaciones -> Nombre }}</label>
											{{ Form::text($CampoLocalCotizaciones -> Codigo, null, array('class' => 'form-control', 'id' => $CampoLocalCotizaciones -> Codigo)) }}
											<span class="glyphicon glyphicon-remove form-control-feedback"></span>
										</div>
									@endif
								@else
									@if($CampoLocalCotizaciones -> Tipo == 'TXT' || $CampoLocalCotizaciones -> Tipo == 'INT' || $CampoLocalCotizaciones -> Tipo == 'FLOAT')
										<div class="form-group has-success has-feedback">
											<label class="control-label pull-left" for="inputSuccess2">{{ $CampoLocalCotizaciones -> Nombre }}</label>
											{{ Form::text($CampoLocalCotizaciones -> Codigo, null, array('class' => 'form-control', 'id' => $CampoLocalCotizaciones -> Codigo)) }}
											<span class="glyphicon glyphicon-ok form-control-feedback"></span>
										</div>
									@endif
								@endif
								
								@if($CampoLocalCotizaciones -> Tipo == 'LIST')
									<?php $ElementosCampoLocalListaCotizaciones = Helpers::InformacionCampoLocalListaCotizaciones($CampoLocalCotizaciones -> Id);?>
									
									@foreach($ElementosCampoLocalListaCotizaciones as $ElementoCampoLocalListaCotizaciones)
										<?php $ElementosCampoLocalListaCotizaciones2[$ElementoCampoLocalListaCotizaciones -> Valor] = $ElementoCampoLocalListaCotizaciones -> Valor ?>
									@endforeach
									
									<div class="form-group has-success has-feedback">
										<label class="control-label pull-left" for="inputSuccess2">{{ $CampoLocalCotizaciones -> Nombre }}</label>
										{{ Form::select($CampoLocalCotizaciones -> Codigo, $ElementosCampoLocalListaCotizaciones2, null, array('class' => 'form-control')) }}
										<span class="glyphicon glyphicon-ok form-control-feedback"></span>
									</div>
								@endif
								
							@else
								<label class="pull-left">{{{ $CampoLocalCotizaciones -> Nombre }}}</label>
								
								@if($CampoLocalCotizaciones -> Requerido)
									<label class="pull-left">&nbsp; *</label>
								@endif
								
								@if($CampoLocalCotizaciones -> Tipo == 'TXT' || $CampoLocalCotizaciones -> Tipo == 'INT' || $CampoLocalCotizaciones -> Tipo == 'FLOAT')
									{{ Form::text($CampoLocalCotizaciones -> Codigo, null, array('class' => 'form-control', 'id' => $CampoLocalCotizaciones -> Codigo)) }}
								@endif
								
								@if($CampoLocalCotizaciones -> Tipo == 'LIST')
									<?php $ElementosCampoLocalListaCotizaciones = Helpers::InformacionCampoLocalListaCotizaciones($CampoLocalCotizaciones -> Id);?>
									
									@foreach($ElementosCampoLocalListaCotizaciones as $ElementoCampoLocalListaCotizaciones)
										<?php $ElementosCampoLocalListaCotizaciones2[$ElementoCampoLocalListaCotizaciones -> Valor] = $ElementoCampoLocalListaCotizaciones -> Valor ?>
									@endforeach
									
									{{ Form::select($CampoLocalCotizaciones -> Codigo, $ElementosCampoLocalListaCotizaciones2, null, array('class' => 'form-control')) }}
								@endif
							@endif
						@endforeach
					@endif
				</div>
			</div>
		</div>
	{{Form::close()}}
	
@stop
