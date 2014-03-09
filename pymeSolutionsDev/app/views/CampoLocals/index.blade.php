@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listado de Campos Locales</h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('CampoLocals.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Caja
	</a>
</div>

@if ($CampoPersonasEmpresas->CampoPersonas->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				
				<th>Código</th>
				<th>Nombre</th>
				<th>Tipo de Campo</th>
				<th>Estado</th>
				<th>Requerido</th>
				<th>Parámetro de Busqueda</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($CampoPersonasEmpresas->CampoPersonas as $CampoLocal)
				<tr>
					
					<td>{{{ $CampoLocal->GEN_CampoLocal_Codigo }}}</td>
					<td>{{{ $CampoLocal->GEN_CampoLocal_Nombre }}}</td>
					<td>{{{ $CampoLocal->GEN_CampoLocal_Tipo }}}</td>
					@if($CampoLocal->GEN_CampoLocal_Activo == 1)
						<td>Activo</td>
					@else
						<td>Inactivo</td>
					@endif	
					
					@if($CampoLocal->GEN_CampoLocal_Requerido == 1)
						<td>Requerido</td>
					@else
						<td>No Requerido</td>
					@endif
					@if($CampoLocal->GEN_CampoLocal_ParametroBusqueda == 1)
						<td>Parámetro de Busqueda</td>
					@else
						<td></td>
					@endif		
					<td>{{ link_to_route('CampoLocals.edit', 'Edit', array($CampoLocal->GEN_CampoLocal_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('CampoLocals.destroy', $CampoLocal->GEN_CampoLocal_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

@if ($CampoPersonasEmpresas->CampoEmpresas->count())
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					
					<th>Código</th>
					<th>Nombre</th>
					<th>Tipo de Campo</th>
					<th>Estado</th>
					<th>Requerido</th>
					<th>Parámetro de Busqueda</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($CampoPersonasEmpresas->CampoEmpresas as $CampoLocal)
					<tr>
					
					<td>{{{ $CampoLocal->GEN_CampoLocal_Codigo }}}</td>
					<td>{{{ $CampoLocal->GEN_CampoLocal_Nombre }}}</td>
					<td>{{{ $CampoLocal->GEN_CampoLocal_Tipo }}}</td>
					@if($CampoLocal->GEN_CampoLocal_Activo == 1)
						<td>Activo</td>
					@else
						<td>Inactivo</td>
					@endif	
					
					@if($CampoLocal->GEN_CampoLocal_Requerido == 1)
						<td>Requerido</td>
					@else
						<td>No Requerido</td>
					@endif
					@if($CampoLocal->GEN_CampoLocal_ParametroBusqueda == 1)
						<td>Parámetro de Busqueda</td>
					@else
						<td></td>
					@endif		
					<td>{{ link_to_route('CampoLocals.edit', 'Edit', array($CampoLocal->GEN_CampoLocal_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('CampoLocals.destroy', $CampoLocal->GEN_CampoLocal_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
				@endforeach
			</tbody>
		</table>
@endif

@stop
