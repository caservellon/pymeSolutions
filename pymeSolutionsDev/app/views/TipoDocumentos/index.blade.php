@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listado de Tipos de Documento</h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('CRM.TipoDocumentos.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-list-alt"></span> Agregar Tipo de Documento
	</a>
</div>

@if ($TipoDocumentos->count())
	<div class="table-responsive">
        <table class="table table-striped">
			<thead>
				<tr>
					
					<th>Código</th>
					<th>Nombre</th>
					<th>Validación</th>
					<th>Activo</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($TipoDocumentos as $TipoDocumento)
					<tr>
						<td>{{{ $TipoDocumento->CRM_TipoDocumento_Codigo }}}</td>
						<td>{{{ $TipoDocumento->CRM_TipoDocumento_Nombre }}}</td>
						<td>{{{ $TipoDocumento->CRM_TipoDocumento_Validacion }}}</td>
						@if($TipoDocumento->CRM_TipoDocumento_Eliminado == 0)
							<td><span class="glyphicon glyphicon-ok"></span></td>
						@else
							<td></td>
						@endif
						<td>{{ link_to_route('CRM.TipoDocumentos.edit', 'Editar', array($TipoDocumento->CRM_TipoDocumento_ID), array('class' => 'btn btn-info')) }}</td>
						<td>
						@if($TipoDocumento->CRM_TipoDocumento_Eliminado == 0)
							{{ Form::open(array('method' => 'DELETE', 'route' => array('CRM.TipoDocumentos.destroy', $TipoDocumento->CRM_TipoDocumento_ID))) }}
						        {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
						    {{ Form::close() }}
						@else
							{{ Form::open(array('method' => 'DELETE', 'route' => array('CRM.TipoDocumentos.destroy', $TipoDocumento->CRM_TipoDocumento_ID))) }}
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
      <strong>Oh no!</strong> No hay tipos de documentos disponibles :(
    </div>
@endif

@stop
