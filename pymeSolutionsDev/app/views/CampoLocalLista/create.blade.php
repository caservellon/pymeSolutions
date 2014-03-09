@extends('layouts.scaffold')

@section('main')

<h1>Create CampoLocalListum</h1>

{{ Form::open(array('route' => 'CampoLocalLista.store')) }}
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


