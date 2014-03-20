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
	<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Direccion</th>
				<th>Logo</th>
				<th>Descuento</th>
				<th>Contacto</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Empresas as $Empresa)
				<tr>
					<td>{{{ $Empresa->CRM_Empresas_ID }}}</td>
					<td>{{{ $Empresa->CRM_Empresas_Codigo }}}</td>
					<td>{{{ $Empresa->CRM_Empresas_Nombre }}}</td>
					<td>{{{ $Empresa->CRM_Empresas_Direccion }}}</td>
					<td><img src="{{{ $Empresa->CRM_Empresas_Logo }}}"></td>
					<td>{{{ $Empresa->CRM_Empresas_Descuento }}}</td>
					<td>{{{ $name = DB::table('CRM_Personas')->where('CRM_Personas_ID', $Empresa->CRM_Personas_CRM_Personas_ID)->pluck('CRM_Personas_Nombres') }}}</td>
                    <td>{{ link_to_route('Empresas.edit', 'Edit', array($Empresa->CRM_Empresas_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Empresas.destroy', $Empresa->CRM_Empresas_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
@else
	<div class="alert alert-danger">
     	<strong>Oh no!</strong> No hay empresas disponibles :(
    </div>
@endif

@stop