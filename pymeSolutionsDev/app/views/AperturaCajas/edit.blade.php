@extends('layouts.scaffold')

@section('main')

<h1>Edit AperturaCaja</h1>
{{ Form::model($AperturaCaja, array('method' => 'PATCH', 'route' => array('AperturaCajas.update', $AperturaCaja->VEN_AperturaCaja_id))) }}
	<ul>
        <li>
            {{ Form::label('VEN_AperturaCaja_id', 'VEN_AperturaCaja_id:') }}
            {{ Form::text('VEN_AperturaCaja_id') }}
        </li>

        <li>
            {{ Form::label('VEN_AperturaCaja_Codigo', 'VEN_AperturaCaja_Codigo:') }}
            {{ Form::text('VEN_AperturaCaja_Codigo') }}
        </li>

        <li>
            {{ Form::label('VEN_Caja_VEN_Caja_id', 'VEN_Caja_VEN_Caja_id:') }}
            {{ Form::text('VEN_Caja_VEN_Caja_id') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('AperturaCajas.show', 'Cancel', $AperturaCaja->VEN_AperturaCaja_id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
