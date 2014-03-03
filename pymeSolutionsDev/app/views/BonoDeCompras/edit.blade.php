@extends('layouts.scaffold')

@section('main')

<h1>Edit BonoDeCompra</h1>
{{ Form::model($BonoDeCompra, array('method' => 'PATCH', 'route' => array('BonoDeCompras.update', $BonoDeCompra->VEN_BonoDeCompra_id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('BonoDeCompras.show', 'Cancel', $BonoDeCompra->VEN_BonoDeCompra_id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
