@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Empresa</small></h2>
@if ($Config->count())

	<div class="table-responsive">
		<table class="table table-striped">
		  <thead>
			<tr>
				
				<th>Nombre</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Telefono2</th>
				<th>Dominio</th>
				<th>EmailContacto</th>
				<th>EmailCompras</th>
				<th>EmailVentas</th>
				<th>Descripcion</th>
				<th>Imagen</th>
			</tr>
		  </thead>
		  <tbody>
			@foreach ($Config as $empresa)
				<tr>
					<td>{{{ $empresa->SEG_Config_NombreEmpresa }}}</td>
					<td>{{{ $empresa->SEG_Config_Direccion }}}</td>
					<td>{{{ $empresa->SEG_Config_Telefono }}}</td>
					<td>{{{ $empresa->SEG_Config_Telefono2 }}}</td>
					<td>{{{ $empresa->SEG_Config_Dominio }}}</td>
					<td>{{{ $empresa->SEG_Config_EmailContacto }}}</td>
					<td>{{{ $empresa->SEG_Config_EmailCompras}}}</td>
					<td>{{{ $empresa->SEG_Config_EmailVentas }}}</td>
					<td>{{{ $empresa->SEG_Config_Descripcion }}}</td>
					<td><img width="75%" src="{{{ $empresa->SEG_Config_Imagen }}}"></td>
                    <td>{{ link_to_route('Auth.Configuracion.edit', 'Editar', array($empresa->SEG_Config_ID), array('class' => 'btn btn-info glyphicon glyphicon-pencil')) }}</td>
                  
				</tr>
			@endforeach
		  </tbody>
		</table>
	</div>
@else
	<div class="alert alert-danger">
      <strong>Oh no!</strong> No hay Compañia disponibles :(
    </div>
@endif

@stop
