@extends('layouts.scaffold')

@section('main')

<h1>Edit EstadoResultado</h1>
{{ Form::model($EstadoResultado, array('method' => 'PATCH', 'route' => array('EstadoResultados.update', $EstadoResultado->id))) }}
	<ul>
        <li>
            {{ Form::label('CON_PeriodoContable_ID', 'CON_PeriodoContable_ID:') }}
            {{ Form::text('CON_PeriodoContable_ID') }}
        </li>

        <li>
            {{ Form::label('CON_EstadoResultados_Ingresos', 'CON_EstadoResultados_Ingresos:') }}
            {{ Form::text('CON_EstadoResultados_Ingresos') }}
        </li>

        <li>
            {{ Form::label('CON_EstadosResultados_CostoVentas', 'CON_EstadosResultados_CostoVentas:') }}
            {{ Form::text('CON_EstadosResultados_CostoVentas') }}
        </li>

        <li>
            {{ Form::label('CON_EstadoResultados_UtilidadBruta', 'CON_EstadoResultados_UtilidadBruta:') }}
            {{ Form::text('CON_EstadoResultados_UtilidadBruta') }}
        </li>

        <li>
            {{ Form::label('CON_EstadoResultados_GastosdeVentas', 'CON_EstadoResultados_GastosdeVentas:') }}
            {{ Form::text('CON_EstadoResultados_GastosdeVentas') }}
        </li>

        <li>
            {{ Form::label('CON_EstadoResultados_GastosAdministrativos', 'CON_EstadoResultados_GastosAdministrativos:') }}
            {{ Form::text('CON_EstadoResultados_GastosAdministrativos') }}
        </li>

        <li>
            {{ Form::label('CON_EstadoResultados_UtilidadOperacion', 'CON_EstadoResultados_UtilidadOperacion:') }}
            {{ Form::text('CON_EstadoResultados_UtilidadOperacion') }}
        </li>

        <li>
            {{ Form::label('CON_EstadoResultados_GastoFinanciero', 'CON_EstadoResultados_GastoFinanciero:') }}
            {{ Form::text('CON_EstadoResultados_GastoFinanciero') }}
        </li>

        <li>
            {{ Form::label('CON_EstadoResultados_UtilidadAntesImpuesto', 'CON_EstadoResultados_UtilidadAntesImpuesto:') }}
            {{ Form::text('CON_EstadoResultados_UtilidadAntesImpuesto') }}
        </li>

        <li>
            {{ Form::label('CON_EstadoResultados_Impuesto', 'CON_EstadoResultados_Impuesto:') }}
            {{ Form::text('CON_EstadoResultados_Impuesto') }}
        </li>

        <li>
            {{ Form::label('CON_EstadoResultados_UtilidadPerdidaFinal', 'CON_EstadoResultados_UtilidadPerdidaFinal:') }}
            {{ Form::text('CON_EstadoResultados_UtilidadPerdidaFinal') }}
        </li>

        <li>
            {{ Form::label('CON_EstadoResultados_FechaCreacion', 'CON_EstadoResultados_FechaCreacion:') }}
            {{ Form::text('CON_EstadoResultados_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('CON_EstadoResultados_FechaModificacion', 'CON_EstadoResultados_FechaModificacion:') }}
            {{ Form::text('CON_EstadoResultados_FechaModificacion') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('EstadoResultados.show', 'Cancel', $EstadoResultado->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
