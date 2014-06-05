@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listado de Roles</h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Auth.Roles.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon glyphicon-eye-open"></span> Agregar Rol
	</a>
</div>

@if ($Roles->count())
	
	<div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
					<th>Código</th>
					<th>Nombre</th>
				</tr>
			</thead>
            <tbody>
            	@foreach ($Roles as $Role)
                <tr>
					<td>{{{ $Role->SEG_Roles_ID }}}</td>
					<td>{{{ $Role->SEG_Roles_Nombre }}}</td>
                    <td>{{ link_to_route('Auth.Roles.edit', 'Editar', array($Role->SEG_Roles_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Auth.Roles.destroy', $Role->SEG_Roles_ID))) }}
                            {{ Form::submit('Desactivar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
                @endforeach
              </tbody>
            </table>
          </div>
@else
	<div class="alert alert-danger">
      <strong>Oh no!</strong> No hay Roles disponibles :(
    </div>
@endif

@stop