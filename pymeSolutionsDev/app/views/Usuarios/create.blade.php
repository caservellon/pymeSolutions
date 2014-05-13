@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Usuarios <small>Nuevo Usuario</small></h3>
</div>

{{ Form::open(array('route' => 'Auth.Usuarios.store', 'class' => "form-horizontal" , 'role' => 'form')) }}

	<div class="form-group">
		<div class="form-group">
			{{ Form::label('SEG_Usuarios_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-5">
            	{{ Form::text('SEG_Usuarios_Nombre', null, array('class' => 'form-control', 'id' => 'SEG_Usuarios_Nombre', 'placeholder'=>'Nombre')) }}
        	</div>
		</div> 

		<div class="form-group">
			{{ Form::label('SEG_Usuarios_Email', 'Correo Electronico: *', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-5">
            	{{ Form::text('SEG_Usuarios_Email', null, array('class' => 'form-control', 'id' => 'SEG_Usuarios_Email', 'placeholder'=>'Correo')) }}
        	</div>
		</div> 
		
		<div class="form-group">
			{{ Form::label('SEG_Usuarios_Contrasena', 'Contraseña: *', array('class' => 'col-md-2 control-label', 'type' => 'password')) }}
			<div class="col-md-5">
            	{{ Form::text('SEG_Usuarios_Contrasena', null, array('class' => 'form-control', 'id' => 'SEG_Usuarios_Contrasena', 'placeholder'=>'Contraseña')) }}
        	</div>
		</div> 

		<div class="form-group">
			{{ Form::label('SEG_Usuarios_Username', 'Nombre de Usuario: *', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-5">
            	{{ Form::text('SEG_Usuarios_Username', null, array('class' => 'form-control', 'id' => 'SEG_Usuarios_Username', 'placeholder'=>'Usuario')) }}
        	</div>
		</div> 

	</div>

{{ Form::close() }}


@stop