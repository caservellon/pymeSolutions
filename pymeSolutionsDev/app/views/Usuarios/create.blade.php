@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Usuarios <small>Nuevo Usuario</small></h3>
</div>

@if ($errors->any())
	  	<div class="alert alert-danger">
		<h4>Error!</h4>
		<p>{{ implode('', $errors->all('<li class="error">:message</li>')) }}</p>
		</div>
	@endif

{{ Form::open(array('route' => 'Auth.Usuarios.store', 'class' => "form-horizontal" , 'role' => 'form')) }}

	<div class="form-group">
		<div class="form-group">
			{{ Form::label('SEG_Usuarios_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-5">
            	{{ Form::text('SEG_Usuarios_Nombre', null, array('class' => 'form-control', 'id' => 'SEG_Usuarios_Nombre', 'placeholder'=>'Juan Perez')) }}
        	</div>
		</div> 

		<div class="form-group">
			{{ Form::label('SEG_Usuarios_Email', 'Correo Electronico: *', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-5">
            	{{ Form::text('SEG_Usuarios_Email', null, array('class' => 'form-control', 'id' => 'SEG_Usuarios_Email', 'placeholder'=>'juan.perez@empresa.com')) }}
        	</div>
		</div> 
		
		<div class="form-group">
			{{ Form::label('SEG_Usuarios_Contrasena', 'Contraseña: *', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-5">
            	{{ Form::password('SEG_Usuarios_Contrasena', array('class' => 'form-control', 'id' => 'SEG_Usuarios_Contrasena', 'placeholder'=>'*****')) }}
        	</div>
		</div> 

		<div class="form-group">
			{{ Form::label('SEG_Usuarios_Username', 'Nombre de Usuario: *', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-5">
            	{{ Form::text('SEG_Usuarios_Username', null, array('class' => 'form-control', 'id' => 'SEG_Usuarios_Username', 'placeholder'=>'Juan.Perez')) }}
        	</div>
		</div> 

		<div class="form-group">
			{{ Form::label('SEG_Roles_SEG_Roles_ID', 'Role: *', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-5">
        	{{ Form::select('SEG_Roles_SEG_Roles_ID', $roles, null, array('class' => 'value-input form-control', 'id' => 'SEG_Roles_SEG_Roles_ID')) }}
        	</div>
		</div> 

		<div class="form-group">
	      	<div class="col-md-5">
	            {{ Form::submit('Agregar', array('class' => 'btn btn-info')) }}
	      	</div>
    	</div>

	</div>

{{ Form::close() }}

@stop