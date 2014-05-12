@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listado de Personas</h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('CRM.Personas.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-user"></span> Agregar Persona
	</a>
</div>

@if ($Personas->count())
	<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				
				<th>Código</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Dirección</th>
				<th>Email</th>
				<th>Celular</th>
				<th>Teléfono Fijo</th>
				<th>Descuento</th>
				<th>Foto</th>
				@foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','CRM_PS%')->get() as $campo)
				    <th>{{{ $campo->GEN_CampoLocal_Nombre }}}</th>
				@endforeach
			</tr>
		</thead>

		<tbody>
			@foreach ($Personas as $Persona)
				<tr>
					
					<td>{{{ $Persona->CRM_Personas_codigo }}}</td>
					<td>{{{ $Persona->CRM_Personas_Nombres }}}</td>
					<td>{{{ $Persona->CRM_Personas_Apellidos }}}</td>
					<td>{{{ $Persona->CRM_Personas_Direccion }}}</td>
					<td>{{{ $Persona->CRM_Personas_Email }}}</td>
					<td>{{{ $Persona->CRM_Personas_Celular }}}</td>
					<td>{{{ $Persona->CRM_Personas_Fijo }}}</td>
					<td>{{{ $Persona->CRM_Personas_Descuento }}}</td>
					<td><img src="{{{ $Persona->CRM_Personas_Foto }}}"></td>
					@foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','CRM_PS%')->get() as $campo)
					    @if (DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Personas_CRM_Personas_ID',$Persona->CRM_Personas_ID)->count() > 0 )
					    	<td>{{{ DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Personas_CRM_Personas_ID',$Persona->CRM_Personas_ID)->first()->CRM_ValorCampoLocal_Valor }}}</td>
					    @else
					    	<td></td>
					    @endif
					@endforeach
                    <td>{{ link_to_route('CRM.Personas.edit', 'Editar', array($Persona->CRM_Personas_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('CRM.Personas.destroy', $Persona->CRM_Personas_ID))) }}
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
     	<strong>Oh no!</strong> No hay personas disponibles :(
    </div>
@endif

@stop
