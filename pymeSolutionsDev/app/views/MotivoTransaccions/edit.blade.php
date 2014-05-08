@extends('layouts.scaffold')

@section('main')

<h1>Edit MotivoTransaccion</h1>
{{ Form::model($MotivoTransaccion, array('method' => 'PATCH', 'url' => array('motivotransaccion', $MotivoTransaccion->id))) }}
	<ul>
        <li>
            {{ Form::label('CON_MotivoTransaccion_Codigo', 'CON_MotivoTransaccion_Codigo:') }}
            {{ Form::text('CON_MotivoTransaccion_Codigo') }}
        </li>

        <li>
            {{ Form::label('CON_MotivoTransaccion_Descripcion', 'CON_MotivoTransaccion_Descripcion:') }}
            {{ Form::text('CON_MotivoTransaccion_Descripcion') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('MotivoTransaccions.show', 'Cancel', $MotivoTransaccion->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
