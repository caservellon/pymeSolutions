@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listado de Campos Locales</h2>
<div class="btn-agregar">
	@if(Seguridad::crearCampoLocal())
	<a type="button" href="{{ URL::route('Inventario.CampoLocals.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Campo Local
	</a>
	@endif
</div>

@if ($CampoPersonas->count())
	<h3>Campos de Productos</h3>
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
							<td>Activo</td>
						@else
							<td>Inactivo</td>
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
						@if(Seguridad::editarCampoLocal())		
						<td>
							{{ link_to_route('Inventario.CampoLocals.edit', 'Editar', array($CampoLocal->GEN_CampoLocal_ID), array('class' => 'btn btn-info')) }}
						</td>
						@endif
						@if(Seguridad::eliminarCampoLocal())
						<td>
							{{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.CampoLocals.destroy', $CampoLocal->GEN_CampoLocal_ID))) }}
								{{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
							{{ Form::close() }}
						</td>
						@endif
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endif

@if ($CampoEmpresas->count())
	<h3>Campos de Proveedores</h3>
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
					<td>
					@if($CampoLocal->GEN_CampoLocal_Tipo == 'INT')
						Entero
					@elseif($CampoLocal->GEN_CampoLocal_Tipo == 'FLOAT')
						Decimal
					@elseif($CampoLocal->GEN_CampoLocal_Tipo == 'LIST')
						Lista de Valores
					@elseif($CampoLocal->GEN_CampoLocal_Tipo == 'CHKBOX')
						Selección Multiple
					@elseif($CampoLocal->GEN_CampoLocal_Tipo == 'RADIOBTN')
						Selección Única
					@else 
						Texto
					@endif 

					</td>
					
					@if($CampoLocal->GEN_CampoLocal_Activo == 1)
						<td>Activo</td>
					@else
						<td>Inactivo</td>
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
					<td>{{ link_to_route('Inventario.CampoLocals.edit', 'Editar', array($CampoLocal->GEN_CampoLocal_ID), array('class' => 'btn btn-info')) }}</td>
					<td>
						{{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.CampoLocals.destroy', $CampoLocal->GEN_CampoLocal_ID))) }}
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