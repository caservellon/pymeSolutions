<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>Solicitud Cotizacion</title>
	
    {{HTML::style('assets/css/bootstrap.min.css')}}
  </head>
  
  <body>
	@if(Session::has('mensaje'))
		{{ $mensaje = Session::get('mensaje') }}
		<p>{{ '<script>alert("Datos Guardados Exitosamente")</script>' }}</p>
		{{-- <script>alert($mensaje);</script> }}</p> --}}
	@endif
    <span class="glyphicon glyphicon-cog col-md-offset-1"></span>
	<h3 class="h3" style="display:inline;">Configuración > Parametrizar > Solicitud de Cotización</h3>
	<hr style="width:90%; align:center"/>
	
	<div class="row"> 
		<div class="col-md-3 col-md-offset-1">
			<h4>Campos por Defecto</h4>
            <h5>Código del proveedor</h5>
            <h5>Nombre del proveedor</label>
            <h5>Codigo del producto</h5>
            <h5>Nombre del producto</h5>
            <h5>Cantidad del producto</h5>
            <h5>Unidad de Medida</h5>
        </div>
        <div class="col-md-3 col-md-offset-1">   
			<h4 style="visibility: hidden">.</h4>
            <h5>Activo</h5>
            <h5>Activo</h5>
            <h5>Activo</h5>
            <h5>Activo</h5>
            <h5>Activo</h5>
            <h5>Activo</h5>
         </div>
	</div>
	<br/>
	<div class="row">
		<div class="col-md-3 col-md-offset-1">
			<h4>Campos Locales</h4>
		</div>
	</div>
	<br/>
	<div class="row"> 
		<div class="col-md-3 col-md-offset-1">
			<h4>Crear Campo Local</h4>
		</div>
	</div>
	
	{{ Form::open(array('url' => '/Compras/Parametrizar/SolicitudCotizacion')) }}
	{{ Form::submit('+') }}
	{{ Form::close() }}
	
	{{ Form::open(array('url' => '/Compras/Parametrizar/SolicitudCotizacion')) }}
		{{ Form::submit('Guardar', array('class' => 'col-md-offset-11')) }}
		
		<ul class="errors">
			@foreach($errors->all('<li>:message</li>') as $mensaje)
				{{ $mensaje }}
			@endforeach
		</ul>
		
		{{ Form::label('Nombre', 'Nombre: *') }}
		{{ Form::text('GEN_CampoLocal_Nombre') }}
		
		{{ Form::label('Tipo', 'Tipo: *') }}
		{{ Form::select('GEN_CampoLocal_Tipo', array('Texto' => 'Texto', 'Entero' => 'Entero', 'Decimal' => 'Decimal', 'Lista' => 'Lista')) }}
		
		{{ Form::checkbox('GEN_CampoLocal_Requerido', 1) }}
		{{ Form::label('Requerido', 'Requerido') }}
		
		{{ Form::checkbox('GEN_CampoLocal_ParametroBusqueda', 1, true) }}
		{{ Form::label('ParametroBusqueda', 'Parámetro de búsqueda') }}
		
		{{ Form::checkbox('GEN_CampoLocal_Activo', 1, true) }}
		{{ Form::label('Activo', 'Activo') }}
		
		{{ Form::submit('-') }}
	{{ Form::close() }}
	
    {{HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js')}}
    {{HTML::script('assets/js/bootstrap.min.js')}}
	
  </body>
  
</html>