@extends('layouts.scaffold')

@section('main')

<h1>Create BonoDeCompra</h1>

{{ Form::open(array('route' => 'BonoDeCompras.store')) }}
	<ul>
        <li>
            {{ Form::label('VEN_BonoDeCompra_id', 'VEN_BonoDeCompra_id:') }}
            {{ Form::text('VEN_BonoDeCompra_id') }}
        </li>

        <li>
            {{ Form::label('VEN_BonoDeCompra_Numero', 'VEN_BonoDeCompra_Numero:') }}
            {{ Form::text('VEN_BonoDeCompra_Numero') }}
        </li>

        <li>
            {{ Form::label('VEN_BonoDeCompra_Valor', 'VEN_BonoDeCompra_Valor:') }}
            {{ Form::text('VEN_BonoDeCompra_Valor') }}
        </li>

        <li>
            {{ Form::label('VEN_EstadoBono_VEN_EstadoBono_id', 'VEN_EstadoBono_VEN_EstadoBono_id:') }}
            {{ Form::text('VEN_EstadoBono_VEN_EstadoBono_id') }}
        </li>

        <li>
            {{ Form::label('VEN_Devolucion_VEN_Devolucion_id', 'VEN_Devolucion_VEN_Devolucion_id:') }}
            {{ Form::text('VEN_Devolucion_VEN_Devolucion_id') }}
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


