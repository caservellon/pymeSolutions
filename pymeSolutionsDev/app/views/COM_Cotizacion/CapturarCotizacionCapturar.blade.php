@extends('layouts.scaffold')

@section('main')

	<?php
		$CodigoSolicitudCotizacion = Input::get('CodigoSolicitudCotizacion');
		$SolicitudCotizacion = Helpers::InformacionSolicitudCotizacion($CodigoSolicitudCotizacion);
		$ProductosSolicitudCotizacion = Helpers::InformacionProductosSolicitudCotizacion($CodigoSolicitudCotizacion);
		$CamposLocalesSolicitudCotizacion = Helpers::InformacionCamposLocalesSolicitudCotizacion($CodigoSolicitudCotizacion);
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
		@foreach($errors->all() as $mensaje)
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
							
							@foreach ($CamposLocalesSolicitudCotizacion as $CampoLocalSolicitudCotizacion)
								<th>{{ $CampoLocalSolicitudCotizacion -> Nombre }}</th>
							@endforeach
							
							<th>Precio Unitario</th>
							<th>Total</th>
						</tr>
					<thead>
					
					<tbody>
						@foreach ($ProductosSolicitudCotizacion as $ProductoSolicitudCotizacion)
							<tr>
								<td>{{ $ProductoSolicitudCotizacion -> Codigo }}</td>
								<td>{{ $ProductoSolicitudCotizacion -> Nombre }}</td>
								<td>{{ $ProductoSolicitudCotizacion -> Descripcion }}</td>
								<td>{{ $ProductoSolicitudCotizacion -> Cantidad }}</td>
								<td></td>
								
								@foreach ($CamposLocalesSolicitudCotizacion as $CampoLocalSolicitudCotizacion)
									<th>{{ $CampoLocalSolicitudCotizacion -> Valor }}</th>
								@endforeach
								
								<td>Lps. {{ Form::text($ProductoSolicitudCotizacion -> Codigo) }}</td>
								<td>Lps.</td>
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
				{{Form::custom('datetime-local','VigenciaCotizacion', date('Y/m/d H:i:s'))}}
				
				<br><br>
				
				{{-- <div class="row"> --}}
					{{ Form::submit('Guardar', array('class' => 'btn btn-sm btn-primary')) }}
				{{-- </div> --}}
			</div>
			
			<div class="col-md-8" style="text-align: right">
				<label>Total: </label>
			</div>
			
			<div class="col-md-3 pull-right" style="text-align: right">
				<div class="form-group" id="campos Locales">
					@foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_COT%')->get() as $campo)
						<br>
						<label >{{{ $campo->GEN_CampoLocal_Nombre }}}</label> 
						<br>      
						@if ($campo->GEN_CampoLocal_Requerido)											 
							@if ($campo->GEN_CampoLocal_Tipo == 'TXT')
								<td>*{{  Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}</td>
							@endif
							@if ($campo->GEN_CampoLocal_Tipo == 'INT')
								<td>*{{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}</td>
							@endif
							@if ($campo->GEN_CampoLocal_Tipo == 'FLOAT')
								<td>*{{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}</td>
							@endif
							@if ($campo->GEN_CampoLocal_Tipo == 'LIST')
							   <td>* {{ Form::select($campo->GEN_CampoLocal_Codigo, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_Valor')) }}</td>
							@endif
							@else
								@if ($campo->GEN_CampoLocal_Tipo == 'TXT')
								<td>{{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}</td>
							@endif
							@if ($campo->GEN_CampoLocal_Tipo == 'INT')
								<td>{{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}</td>
							@endif
							@if ($campo->GEN_CampoLocal_Tipo == 'FLOAT')
								<td>{{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}</td>
							@endif
							@if ($campo->GEN_CampoLocal_Tipo == 'LIST')
							   <td> {{ Form::select($campo->GEN_CampoLocal_Codigo, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_Valor')) }}</td>
							@endif
						@endif
					@endforeach
				</div>
			</div>
		</div>
		
		<br><br>
			
		
	{{Form::close()}}
	
@stop
