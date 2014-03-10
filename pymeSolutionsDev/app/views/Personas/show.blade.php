@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Persona &gt; <small>{{{ $Persona->CRM_Personas_ID }}}</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Personas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Código</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Dirección</th>
			<th>Email</th>
			<th>Celular</th>
			<th>Teléfono Fijo</th>
			<th>Descuento</th>
			<th>Foto</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Persona->CRM_Personas_ID }}}</td>
					<td>{{{ $Persona->CRM_Personas_codigo }}}</td>
					<td>{{{ $Persona->CRM_Personas_Nombres }}}</td>
					<td>{{{ $Persona->CRM_Personas_Apellidos }}}</td>
					<td>{{{ $Persona->CRM_Personas_Direccion }}}</td>
					<td>{{{ $Persona->CRM_Personas_Email }}}</td>
					<td>{{{ $Persona->CRM_Personas_Celular }}}</td>
					<td>{{{ $Persona->CRM_Personas_Fijo }}}</td>
					<td>{{{ $Persona->CRM_Personas_Descuento }}}</td>
					<td>{{{ $Persona->CRM_Personas_Foto }}}</td>
                    <td>{{ link_to_route('Personas.edit', 'Edit', array($Persona->CRM_Personas_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Personas.destroy', $Persona->CRM_Personas_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
