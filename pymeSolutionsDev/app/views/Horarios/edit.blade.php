@extends('layouts.scaffold')

@section('main')

<h1>Edit Horario</h1>
{{ Form::model($Horario, array('method' => 'PATCH', 'route' => array('Inventario.Horarios.update', $Horario->INV_Horario_ID))) }}
	<ul>
        <li>
            {{ Form::label('INV_Horario_ID', 'INV_Horario_ID:') }}
            {{ Form::text('INV_Horario_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Horario_Nombre', 'INV_Horario_Nombre:') }}
            {{ Form::text('INV_Horario_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_Horario_Tipo', 'INV_Horario_Tipo:') }}
            {{ Form::text('INV_Horario_Tipo') }}
        </li>

        <li>
            {{ Form::label('INV_Horario_FechaInicio', 'INV_Horario_FechaInicio:') }}
            {{ Form::text('INV_Horario_FechaInicio') }}
        </li>

        <li>
            {{ Form::label('INV_Horario_FechaFinal', 'INV_Horario_FechaFinal:') }}
            {{ Form::text('INV_Horario_FechaFinal') }}
        </li>

        <li>
            {{ Form::label('INV_Horario_FechaCreacion', 'INV_Horario_FechaCreacion:') }}
            {{ Form::text('INV_Horario_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Horario_UsuarioCreacion', 'INV_Horario_UsuarioCreacion:') }}
            {{ Form::text('INV_Horario_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Horario_FechaModificacion', 'INV_Horario_FechaModificacion:') }}
            {{ Form::text('INV_Horario_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Horario_UsuarioModificacion', 'INV_Horario_UsuarioModificacion:') }}
            {{ Form::text('INV_Horario_UsuarioModificacion') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Inventario.Horarios.show', 'Cancel', $Horario->INV_Horario_ID, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
