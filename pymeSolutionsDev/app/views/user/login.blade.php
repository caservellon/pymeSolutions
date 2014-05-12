@extends('layouts.scaffold')

@section("main")
<br>

  	@if ($errors->any())
	  	<div class="alert alert-danger">
		<h4>Error!</h4>
		<p>{{ implode('', $errors->all('<li class="error">:message</li>')) }}</p>
		</div>
	@endif

<div class="container-fluid">
  	<div class="form-group">
		{{ Form::open() }}
		<div class="form-group">
		    {{ Form::label("SEG_Usuarios_Email", "Correo Electrónico") }}
		    {{ Form::text("SEG_Usuarios_Email", null, array('class' => 'form-control', 'placeholder' => 'usuario@organizacion.com')) }}
		</div>
		<div class="form-group">
		    {{ Form::label("password", "Contraseña") }}
		    {{ Form::password("password", array('class' => 'form-control', 'placeholder' => 'Contraseña')) }}
		</div>
		    {{ Form::submit("Acceder", array('class' => 'btn btn-default')) }}
		{{ Form::close() }}
	
  	</div>
</div>
@stop
@stop