@extends('layouts.scaffold')

@section('main')

<h1>Edit BalanceGeneral</h1>
{{ Form::model($BalanceGeneral, array('method' => 'PATCH', 'route' => array('BalanceGenerals.update', $BalanceGeneral->id))) }}
	<ul>
        <li>
            {{ Form::label('CON_PeriodoContable_ID', 'CON_PeriodoContable_ID:') }}
            {{ Form::input('number', 'CON_PeriodoContable_ID') }}
        </li>

        <li>
            {{ Form::label('CON_BalanceGeneral_TotalActivosC', 'CON_BalanceGeneral_TotalActivosC:') }}
            {{ Form::text('CON_BalanceGeneral_TotalActivosC') }}
        </li>

        <li>
            {{ Form::label('CON_BalanceGeneral_TotalPasivosC', 'CON_BalanceGeneral_TotalPasivosC:') }}
            {{ Form::text('CON_BalanceGeneral_TotalPasivosC') }}
        </li>

        <li>
            {{ Form::label('CON_BalanceGeneral_TotalActivosNC', 'CON_BalanceGeneral_TotalActivosNC:') }}
            {{ Form::text('CON_BalanceGeneral_TotalActivosNC') }}
        </li>

        <li>
            {{ Form::label('CON_BalanceGeneral_TotalPasivosNC', 'CON_BalanceGeneral_TotalPasivosNC:') }}
            {{ Form::text('CON_BalanceGeneral_TotalPasivosNC') }}
        </li>

        <li>
            {{ Form::label('CON_BalanceGeneral_CapitalFinal', 'CON_BalanceGeneral_CapitalFinal:') }}
            {{ Form::text('CON_BalanceGeneral_CapitalFinal') }}
        </li>

        <li>
            {{ Form::label('CON_BalanceGeneral', 'CON_BalanceGeneral:') }}
            {{ Form::text('CON_BalanceGeneral') }}
        </li>

        <li>
            {{ Form::label('CON_BalanceGeneral_FechaModificacion', 'CON_BalanceGeneral_FechaModificacion:') }}
            {{ Form::text('CON_BalanceGeneral_FechaModificacion') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('BalanceGenerals.show', 'Cancel', $BalanceGeneral->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
