@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Cambio de <small>Contraseña</small></h3>
</div>

	@if ($error != null)
	  	<div class="alert alert-danger">
		<h4>Error!</h4>
		<p>{{ $error }}</p>
		</div>
	@endif

	@if ($ExpDate != null)
	  	<div class="alert alert-success">
		<h4>¡Felicidades!</h4>
		<p>Su contraseña ha sido cambiada correctamente. Su siguente fecha de expiración es {{$ExpDate}}.</p>
		</div>
	@endif

	<div class="cambio-view"></div>

{{ Form::open(array('route' => 'Auth.cambio', 'class' => "form-horizontal" , 'role' => 'form')) }}

	<div class="form-group">
			
		<div class="form-group">
			{{ Form::label('ContrsaenaActual', 'Contraseña Actual: *', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-5">
            	{{ Form::password('ContrsaenaActual', array('class' => 'form-control', 'id' => 'ContrsaenaActual', 'placeholder'=>'*****')) }}
        	</div>
		</div> 

		<div class="form-group">
			{{ Form::label('NuevaContrasena', 'Contraseña Nueva: *', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-5">
            	{{ Form::password('NuevaContrasena', array('class' => 'form-control', 'id' => 'NuevaContrasena', 'placeholder'=>'*****')) }}
        	</div>
		</div> 


		<div class="form-group">
			{{ Form::label('Confirmacion', 'Confirmación: *', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-5">
            	{{ Form::password('Confirmacion', array('class' => 'form-control', 'id' => 'Confirmacion', 'placeholder'=>'*****')) }}
        	</div>
		</div> 

		

		<div class="form-group">
	      	<div class="col-md-5">
	            {{ Form::submit('Cambiar', array('class' => 'btn btn-info')) }}
	      	</div>
    	</div>

	</div>

{{ Form::close() }}
@stop