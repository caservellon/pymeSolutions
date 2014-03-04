@extends('layouts.scaffold')

@section('main')

<h1>Edit Persona</h1>
{{ Form::model($Persona, array('method' => 'PATCH', 'route' => array('Personas.update', $Persona->CRM_Personas_ID))) }}
	<ul>
        <li>
            {{ Form::label('CRM_Personas_ID', 'CRM_Personas_ID:') }}
            {{ Form::text('CRM_Personas_ID') }}
        </li>

        <li>
            {{ Form::label('CRM_Personas_codigo', 'CRM_Personas_codigo:') }}
            {{ Form::text('CRM_Personas_codigo') }}
        </li>

        <li>
            {{ Form::label('CRM_Personas_Nombres', 'CRM_Personas_Nombres:') }}
            {{ Form::text('CRM_Personas_Nombres') }}
        </li>

        <li>
            {{ Form::label('CRM_Personas_Apellidos', 'CRM_Personas_Apellidos:') }}
            {{ Form::text('CRM_Personas_Apellidos') }}
        </li>

        <li>
            {{ Form::label('CRM_Personas_Direccion', 'CRM_Personas_Direccion:') }}
            {{ Form::textarea('CRM_Personas_Direccion') }}
        </li>

        <li>
            {{ Form::label('CRM_Personas_Email', 'CRM_Personas_Email:') }}
            {{ Form::text('CRM_Personas_Email') }}
        </li>

        <li>
            {{ Form::label('CRM_Personas_Celular', 'CRM_Personas_Celular:') }}
            {{ Form::text('CRM_Personas_Celular') }}
        </li>

        <li>
            {{ Form::label('CRM_Personas_Fijo', 'CRM_Personas_Fijo:') }}
            {{ Form::text('CRM_Personas_Fijo') }}
        </li>

        <li>
            {{ Form::label('CRM_Personas_Descuento', 'CRM_Personas_Descuento:') }}
            {{ Form::text('CRM_Personas_Descuento') }}
        </li>

        <li>
            {{ Form::label('CRM_Personas_Foto', 'CRM_Personas_Foto:') }}
            {{ Form::text('CRM_Personas_Foto') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Personas.show', 'Cancel', $Persona->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
