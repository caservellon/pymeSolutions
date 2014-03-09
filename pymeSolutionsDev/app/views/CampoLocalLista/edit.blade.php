@extends('layouts.scaffold')

@section('main')

<h1>Edit CampoLocalLista</h1>
{{ Form::model($CampoLocalLista, array('method' => 'PATCH', 'route' => array('CampoLocalLista.update', $CampoLocalLista->id))) }}
	<ul>
        <li>
            {{ Form::label('GEN_CampoLocalLista_ID', 'GEN_CampoLocalLista_ID:') }}
            {{ Form::text('GEN_CampoLocalLista_ID') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocalLista_Valor', 'GEN_CampoLocalLista_Valor:') }}
            {{ Form::text('GEN_CampoLocalLista_Valor') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_GEN_CampoLocal_ID', 'GEN_CampoLocal_GEN_CampoLocal_ID:') }}
            {{ Form::text('GEN_CampoLocal_GEN_CampoLocal_ID') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('CampoLocalLista.show', 'Cancel', $CampoLocalLista->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
