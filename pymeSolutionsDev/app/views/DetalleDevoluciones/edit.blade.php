@extends('layouts.scaffold')

@section('main')

<h1>Edit DetalleDevolucion</h1>
{{ Form::model($DetalleDevolucion, array('method' => 'PATCH', 'route' => array('DetalleDevoluciones.update', $DetalleDevolucion->VEN_DetalleDevolucion_id))) }}
	<ul>
        <li>
            {{ Form::label('VEN_DetalleDevolucion_id', 'VEN_DetalleDevolucion_id:') }}
            {{ Form::text('VEN_DetalleDevolucion_id') }}
        </li>

        <li>
            {{ Form::label('VEN_DetalleDevolucion_Cantidad', 'VEN_DetalleDevolucion_Cantidad:') }}
            {{ Form::text('VEN_DetalleDevolucion_Cantidad') }}
        </li>

        <li>
            {{ Form::label('VEN_Devolucion_VEN_Devolucion_id', 'VEN_Devolucion_VEN_Devolucion_id:') }}
            {{ Form::text('VEN_Devolucion_VEN_Devolucion_id') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('DetalleDevoluciones.show', 'Cancel', $DetalleDevolucion->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
