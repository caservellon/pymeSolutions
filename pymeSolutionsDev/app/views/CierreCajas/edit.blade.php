@extends('layouts.scaffold')

@section('main')

<h1>Edit CierreCaja</h1>
{{ Form::model($CierreCaja, array('method' => 'PATCH', 'route' => array('CierreCajas.update', $CierreCaja->id))) }}
	<ul>
        <li>
            {{ Form::label('VEN_CierreCaja_id', 'VEN_CierreCaja_id:') }}
            {{ Form::text('VEN_CierreCaja_id') }}
        </li>

        <li>
            {{ Form::label('VEN_CierreCaja_TotalVentas', 'VEN_CierreCaja_TotalVentas:') }}
            {{ Form::text('VEN_CierreCaja_TotalVentas') }}
        </li>

        <li>
            {{ Form::label('VEN_CierreCaja_SaldoInicial', 'VEN_CierreCaja_SaldoInicial:') }}
            {{ Form::text('VEN_CierreCaja_SaldoInicial') }}
        </li>

        <li>
            {{ Form::label('VEN_Caja_VEN_Caja_id', 'VEN_Caja_VEN_Caja_id:') }}
            {{ Form::text('VEN_Caja_VEN_Caja_id') }}
        </li>

        <li>
            {{ Form::label('VEN_AperturaCaja_VEN_AperturaCaja_id', 'VEN_AperturaCaja_VEN_AperturaCaja_id:') }}
            {{ Form::text('VEN_AperturaCaja_VEN_AperturaCaja_id') }}
        </li>

        <li>
            {{ Form::label('VEN_AperturaCaja_VEN_Caja_VEN_Caja_id', 'VEN_AperturaCaja_VEN_Caja_VEN_Caja_id:') }}
            {{ Form::text('VEN_AperturaCaja_VEN_Caja_VEN_Caja_id') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('CierreCajas.show', 'Cancel', $CierreCaja->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
