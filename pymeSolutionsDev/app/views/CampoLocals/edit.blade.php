@extends('layouts.scaffold')

@section('main')

<h1>Edit CampoLocal</h1>
{{ Form::model($CampoLocal, array('method' => 'PATCH', 'route' => array('CampoLocals.update', $CampoLocal->id))) }}
	<ul>
        <li>
            {{ Form::label('GEN_CampoLocal_ID', 'GEN_CampoLocal_ID:') }}
            {{ Form::text('GEN_CampoLocal_ID') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_Codigo', 'GEN_CampoLocal_Codigo:') }}
            {{ Form::text('GEN_CampoLocal_Codigo') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_Activo', 'GEN_CampoLocal_Activo:') }}
            {{ Form::text('GEN_CampoLocal_Activo') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_Nombre', 'GEN_CampoLocal_Nombre:') }}
            {{ Form::text('GEN_CampoLocal_Nombre') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_Tipo', 'GEN_CampoLocal_Tipo:') }}
            {{ Form::text('GEN_CampoLocal_Tipo') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_Requerido', 'GEN_CampoLocal_Requerido:') }}
            {{ Form::text('GEN_CampoLocal_Requerido') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_ParametroBusqueda', 'GEN_CampoLocal_ParametroBusqueda:') }}
            {{ Form::text('GEN_CampoLocal_ParametroBusqueda') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('CampoLocals.show', 'Cancel', $CampoLocal->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
