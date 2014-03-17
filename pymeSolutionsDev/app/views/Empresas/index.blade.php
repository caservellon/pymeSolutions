@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listado de Empresas</h2>
<div class="btn-agregar">
	@if (DB::table('CRM_Personas')->get())
		<a type="button" href="{{ URL::route('Empresas.create') }}" class="btn btn-default">
		  <span class="glyphicon glyphicon-user"></span> Agregar Empresa
		</a>
	@else
		<div class="alert alert-danger">
	     	<strong>Oh no!</strong> No hay clientes disponibles, por esta razón aún no puede crear una empresa :(
	    </div>
	@endif
</div>

@if ($Empresas->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>CRM_Empresas_ID</th>
				<th>CRM_Empresas_Codigo</th>
				<th>CRM_Empresas_Nombre</th>
				<th>CRM_Empresas_Direccion</th>
				<th>CRM_Empresas_Logo</th>
				<th>CRM_Empresas_Descuento</th>
				<th>CRM_Personas_CRM_Personas_ID</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Empresas as $Empresa)
				<tr>
					<td>{{{ $Empresa->CRM_Empresas_ID }}}</td>
					<td>{{{ $Empresa->CRM_Empresas_Codigo }}}</td>
					<td>{{{ $Empresa->CRM_Empresas_Nombre }}}</td>
					<td>{{{ $Empresa->CRM_Empresas_Direccion }}}</td>
					<td>{{{ $Empresa->CRM_Empresas_Logo }}}</td>
					<td>{{{ $Empresa->CRM_Empresas_Descuento }}}</td>
					<td>{{{ $Empresa->CRM_Personas_CRM_Personas_ID }}}</td>
                    <td>{{ link_to_route('Empresas.edit', 'Edit', array($Empresa->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Empresas.destroy', $Empresa->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	<div class="alert alert-danger">
     	<strong>Oh no!</strong> No hay empresas disponibles :(
    </div>
@endif

@stop
