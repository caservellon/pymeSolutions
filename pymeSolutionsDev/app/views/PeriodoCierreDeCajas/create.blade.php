@extends('layouts.scaffold')

@section('main')

<h1>Create PeriodoCierreDeCaja</h1>

{{ Form::open(array('route' => 'PeriodoCierreDeCajas.store')) }}
	<ul>
        <li>
            {{ Form::label('VEN_PeriodoCierreDeCaja_id', 'VEN_PeriodoCierreDeCaja_id:') }}
            {{ Form::text('VEN_PeriodoCierreDeCaja_id') }}
        </li>

        <li>
            {{ Form::label('VEN_PeriodoCierreDeCaja_Codigo', 'VEN_PeriodoCierreDeCaja_Codigo:') }}
            {{ Form::text('VEN_PeriodoCierreDeCaja_Codigo') }}
        </li>

        <li>
            {{ Form::label('VEN_PeriodoCierreDeCaja_ValorHoras', 'VEN_PeriodoCierreDeCaja_ValorHoras:') }}
            {{ Form::text('VEN_PeriodoCierreDeCaja_ValorHoras') }}
        </li>

        <li>
            {{ Form::label('VEN_PeriodoCierreDeCaja_Estado', 'VEN_PeriodoCierreDeCaja_Estado:') }}
            {{ Form::text('VEN_PeriodoCierreDeCaja_Estado') }}
        </li>

        <li>
            {{ Form::label('VEN_PeriodoCierreDeCaja_HoraPartida', 'VEN_PeriodoCierreDeCaja_HoraPartida:') }}
            {{ Form::text('VEN_PeriodoCierreDeCaja_HoraPartida') }}
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


