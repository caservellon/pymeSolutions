@extends('layouts.scaffold')

@section("main")

<h2 class="sub-header">Listado de Usuarios</h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Auth.Usuarios.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-user"></span> Agregar Usuario
	</a>
</div>

@if ($Usuarios->count())
	<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombres</th>
				<th>Correo</th>
				<th>Usuario</th>
				<th>Ultima IP</th>
				<th>Ultima Sesion</th>
				<th>Estado</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Usuarios as $Usuario)
				<tr>
					<td>{{{ $Usuario->SEG_Usuarios_ID }}}</td>
					<td>{{{ $Usuario->SEG_Usuarios_Nombre }}}</td>
					<td>{{{ $Usuario->SEG_Usuarios_Email }}}</td>
					<td>{{{ $Usuario->SEG_Usuarios_Username }}}</td>
					<td>{{{ $Usuario->SEG_Usuarios_IP1 }}}</td>
					<td>{{{ $Usuario->SEG_Usuarios_UltimaSesion }}}</td>
					@if($Usuario->SEG_Usuarios_Activo == 1)
						<td>Activo</td>
					@else
						<td>Desactivado</td>
					@endif

                    <td>{{ link_to_route('Auth.Usuarios.edit', 'Editar', array($Usuario->SEG_Usuarios_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                 		@if($Usuario->SEG_Usuarios_Activo == 1)
							{{ Form::open(array('method' => 'DELETE', 'route' => array('Auth.Usuarios.destroy', $Usuario->SEG_Usuarios_ID))) }}
                            	{{ Form::submit('Desactivar', array('class' => 'btn btn-danger')) }}
                        	{{ Form::close() }}
						@else
							{{ Form::open(array('method' => 'DELETE', 'route' => array('Auth.Usuarios.destroy', $Usuario->SEG_Usuarios_ID))) }}
                            	{{ Form::submit('Activar', array('class' => 'btn btn-success')) }}
                        	{{ Form::close() }}
						@endif
                        
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
@else
	<div class="alert alert-danger">
     	<strong>Oh no!</strong> No hay usuarios disponibles :(
    </div>
@endif

@stop