@extends('layouts.scaffold')

@section('main')

<h1>Create MotivoTransaccion</h1>

@include('_messages.errors')


{{ Form::open(array('url' => 'contabilidad/motivotransaccion')) }}
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
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}


@stop


