@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listado de Campos Locales</h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('CRM.CampoLocals.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Campo Local
	</a>
</div>

@if ($CampoPersonas->count())
	<h3>Campos de Personas</h3>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
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
				@foreach ($CampoPersonas as $CampoLocal)
					<tr>

						<td>{{{ $CampoLocal->GEN_CampoLocal_Codigo }}}</td>
						<td>{{{ $CampoLocal->GEN_CampoLocal_Nombre }}}</td>
						@if($CampoLocal->GEN_CampoLocal_Tipo == "TXT")
							<td>Texto</td>
						@elseif($CampoLocal->GEN_CampoLocal_Tipo == "FLOAT") 
							<td>Decimal</td>
						@elseif($CampoLocal->GEN_CampoLocal_Tipo == "LIST" )
							<td>Lista</td>
						@elseif($CampoLocal->GEN_CampoLocal_Tipo == "INT")
							<td>Entero</td>
						@endif

						@if($CampoLocal->GEN_CampoLocal_Activo == 1)
							<td><span class="glyphicon glyphicon-ok"></span></td>
						@else
							<td></td>
						@endif	

						@if($CampoLocal->GEN_CampoLocal_Requerido == 1)
							<td><span class="glyphicon glyphicon-ok"></span></td>
						@else
							<td></td>
						@endif

						@if($CampoLocal->GEN_CampoLocal_ParametroBusqueda == 1)
							<td><span class="glyphicon glyphicon-ok"></span></td>
						@else
							<td></td>
						@endif

						<td>{{ link_to_route('CRM.CampoLocals.edit', 'Editar', array($CampoLocal->GEN_CampoLocal_ID), array('class' => 'btn btn-info')) }}</td>
						<td>
							{{ Form::open(array('method' => 'DELETE', 'route' => array('CRM.CampoLocals.destroy', $CampoLocal->GEN_CampoLocal_ID))) }}
								{{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endif

@if ($CampoEmpresas->count())
	<h3>Campos de Empresas</h3>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
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
				@foreach ($CampoEmpresas as $CampoLocal)
					<tr>
					<td>{{{ $CampoLocal->GEN_CampoLocal_Codigo }}}</td>
					<td>{{{ $CampoLocal->GEN_CampoLocal_Nombre }}}</td>
					@if($CampoLocal->GEN_CampoLocal_Tipo == "TXT")
						<td>Texto</td>
					@elseif($CampoLocal->GEN_CampoLocal_Tipo == "FLOAT") 
						<td>Decimal</td>
					@elseif($CampoLocal->GEN_CampoLocal_Tipo == "LIST" )
						<td>Lista</td>
					@elseif($CampoLocal->GEN_CampoLocal_Tipo == "INT")
						<td>Entero</td>
					@endif

					@if($CampoLocal->GEN_CampoLocal_Activo == 1)
							<td><span class="glyphicon glyphicon-ok"></span></td>
						@else
							<td></td>
						@endif		

					@if($CampoLocal->GEN_CampoLocal_Requerido == 1)
						<td><span class="glyphicon glyphicon-ok"></span></td>
					@else
						<td></td>
					@endif
					@if($CampoLocal->GEN_CampoLocal_ParametroBusqueda == 1)
						<td><span class="glyphicon glyphicon-ok"></span></td>
					@else
						<td></td>
					@endif		
					<td>{{ link_to_route('CRM.CampoLocals.edit', 'Editar', array($CampoLocal->GEN_CampoLocal_ID), array('class' => 'btn btn-info')) }}</td>
					<td>
						{{ Form::open(array('method' => 'DELETE', 'route' => array('CRM.CampoLocals.destroy', $CampoLocal->GEN_CampoLocal_ID))) }}
							{{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endif

@if(!$CampoEmpresas->count() && !$CampoPersonas->count())
	<div class="alert alert-danger">
      <strong>Oh no!</strong> No hay campos locales disponibles :(
    </div>
@endif

@stop