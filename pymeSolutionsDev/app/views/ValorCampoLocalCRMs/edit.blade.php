@extends('layouts.scaffold')

@section('main')

<h1>Edit ValorCampoLocalCRM</h1>
{{ Form::model($ValorCampoLocalCRM, array('method' => 'PATCH', 'route' => array('ValorCampoLocalCRMs.update', $ValorCampoLocalCRM->id))) }}
	<ul>
        <li>
            {{ Form::label('CRM_ValorCampoLocal_ID', 'CRM_ValorCampoLocal_ID:') }}
            {{ Form::text('CRM_ValorCampoLocal_ID') }}
        </li>

        <li>
            {{ Form::label('CRM_ValorCampoLocal_Valor', 'CRM_ValorCampoLocal_Valor:') }}
            {{ Form::text('CRM_ValorCampoLocal_Valor') }}
        </li>

        <li>
            {{ Form::label('CRM_ValorCampoLocal_Creacion', 'CRM_ValorCampoLocal_Creacion:') }}
            {{ Form::text('CRM_ValorCampoLocal_Creacion') }}
        </li>

        <li>
            {{ Form::label('CRM_ValorCampoLocal_Modificacion', 'CRM_ValorCampoLocal_Modificacion:') }}
            {{ Form::text('CRM_ValorCampoLocal_Modificacion') }}
        </li>

        <li>
            {{ Form::label('CRM_ValorCampoLocal_Usuario', 'CRM_ValorCampoLocal_Usuario:') }}
            {{ Form::text('CRM_ValorCampoLocal_Usuario') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_GEN_CampoLocal_ID', 'GEN_CampoLocal_GEN_CampoLocal_ID:') }}
            {{ Form::text('GEN_CampoLocal_GEN_CampoLocal_ID') }}
        </li>

        <li>
            {{ Form::label('CRM_Empresas_CRM_Empresas_ID', 'CRM_Empresas_CRM_Empresas_ID:') }}
            {{ Form::text('CRM_Empresas_CRM_Empresas_ID') }}
        </li>

        <li>
            {{ Form::label('CRM_Personas_CRM_Personas_ID', 'CRM_Personas_CRM_Personas_ID:') }}
            {{ Form::text('CRM_Personas_CRM_Personas_ID') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('ValorCampoLocalCRMs.show', 'Cancel', $ValorCampoLocalCRM->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
