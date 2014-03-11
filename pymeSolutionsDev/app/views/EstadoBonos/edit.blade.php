@extends('layouts.scaffold')

@section('main')

<h1>Edit EstadoBono</h1>
{{ Form::model($EstadoBono, array('method' => 'PATCH', 'route' => array('EstadoBonos.update', $EstadoBono->VEN_EstadoBono_id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('EstadoBonos.show', 'Cancel', $EstadoBono->VEN_EstadoBono_id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
