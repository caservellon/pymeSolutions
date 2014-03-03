@extends('layouts.scaffold')

@section('main')

<h1>Edit Devolucion</h1>
{{ Form::model($Devolucion, array('method' => 'PATCH', 'route' => array('Devoluciones.update', $Devolucion->VEN_Devolucion_id))) }}
	<ul>
        <li>
            {{ Form::label('VEN_Devolucion_id', 'VEN_Devolucion_id:') }}
            {{ Form::text('VEN_Devolucion_id') }}
        </li>

        <li>
            {{ Form::label('VEN_Devolucion_Codigo', 'VEN_Devolucion_Codigo:') }}
            {{ Form::text('VEN_Devolucion_Codigo') }}
        </li>

        <li>
            {{ Form::label('VEN_Devolucion_Monto', 'VEN_Devolucion_Monto:') }}
            {{ Form::text('VEN_Devolucion_Monto') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Devoluciones.show', 'Cancel', $Devolucion->VEN_Devolucion_id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
