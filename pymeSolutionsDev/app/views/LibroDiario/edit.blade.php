@extends('layouts.scaffold')

@section('main')

<h1>Edit LibroDiario</h1>
{{ Form::model($LibroDiario, array('method' => 'PATCH', 'route' => array('LibroDiarios.update', $LibroDiario->id))) }}
	<ul>
        <li>
            {{ Form::label('CON_LibroDiario_Observacion', 'CON_LibroDiario_Observacion:') }}
            {{ Form::input('number', 'CON_LibroDiario_Observacion') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('LibroDiarios.show', 'Cancel', $LibroDiario->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
