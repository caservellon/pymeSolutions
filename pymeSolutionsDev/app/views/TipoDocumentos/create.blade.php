@extends('layouts.scaffold')

@section('main')

<h1>Create TipoDocumento</h1>

{{ Form::open(array('route' => 'TipoDocumentos.store')) }}
	<ul>
        <li>
            {{ Form::label('CRM_TipoDocumento_ID', 'CRM_TipoDocumento_ID:') }}
            {{ Form::text('CRM_TipoDocumento_ID') }}
        </li>

        <li>
            {{ Form::label('CRM_TipoDocumento_Codigo', 'CRM_TipoDocumento_Codigo:') }}
            {{ Form::text('CRM_TipoDocumento_Codigo') }}
        </li>

        <li>
            {{ Form::label('CRM_TipoDocumento_Nombre', 'CRM_TipoDocumento_Nombre:') }}
            {{ Form::text('CRM_TipoDocumento_Nombre') }}
        </li>

        <li>
            {{ Form::label('CRM_TipoDocumento_Validacion', 'CRM_TipoDocumento_Validacion:') }}
            {{ Form::text('CRM_TipoDocumento_Validacion') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


