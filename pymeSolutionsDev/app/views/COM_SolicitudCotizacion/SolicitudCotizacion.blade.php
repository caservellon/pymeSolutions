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
		
		{{ Form::label('nombre', 'Nombre: *') }}
		{{ Form::text('GEN_CampoLocal_Nombre') }}
		{{ $errors -> first('GEN_CampoLocal_Nombre', '<span class="error">:message</span>') }}
		
		{{ Form::label('tipo', 'Tipo: *') }}
		{{ Form::select('GEN_CampoLocal_Tipo', array('texto' => 'Texto', 'entero' => 'Entero', 'decimal' => 'Decimal', 'lista_de_valores' => 'Lista de valores', )) }}
		{{ $errors -> first('GEN_CampoLocal_Tipo', '<span class="error">:message</span>') }}
		
		{{ Form::checkbox('requerido', 1) }}
		{{ Form::label('requerido', 'Requerido') }}
		
		{{ Form::checkbox('parametro_de_busqueda', 1, true) }}
		{{ Form::label('parametro_de_busqueda', 'Parámetro de búsqueda') }}
		
		{{ Form::checkbox('activo', 1, true) }}
		{{ Form::label('activo', 'Activo') }}
		
		{{ Form::submit('-') }}
	{{ Form::close() }}
	
    {{HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js')}}
    {{HTML::script('assets/js/bootstrap.min.js')}}
	
  </body>
  
</html>