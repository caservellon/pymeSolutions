@extends('layouts.scaffold')

@section('main')

<h1>Create EstadoBono</h1>

{{ Form::open(array('route' => 'EstadoBonos.store')) }}
	<ul>
        <li>
            {{ Form::label('VEN_EstadoBono_id', 'VEN_EstadoBono_id:') }}
            {{ Form::text('VEN_EstadoBono_id') }}
        </li>

        <li>
            {{ Form::label('VEN_EstadoBono_Codigo', 'VEN_EstadoBono_Codigo:') }}
            {{ Form::text('VEN_EstadoBono_Codigo') }}
        </li>

        <li>
            {{ Form::label('VEN_EstadoBono_Nombre', 'VEN_EstadoBono_Nombre:') }}
            {{ Form::text('VEN_EstadoBono_Nombre') }}
        </li>

        <li>
            {{ Form::label('VEN_EstadoBono_Descripcion', 'VEN_EstadoBono_Descripcion:') }}
            {{ Form::text('VEN_EstadoBono_Descripcion') }}
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


