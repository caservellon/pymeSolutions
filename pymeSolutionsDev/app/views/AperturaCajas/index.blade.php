@extends('layouts.scaffold')

@section('main')


<br>

<h1>Cajas disponibles para Apertura</h1>

<br>

@if ($errors->any())
	<div class="alert alert-danger">
      {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </div>
@endif


@if ($CajasDisponibles->count())
	
	<div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
					<th>#</th>
					<th>Código</th>
					<th>Número de Caja</th>
					<th>Estado de Caja</th>
					<th>Periodo de Cierre</th>
					<th>Saldo Inicial</th>
				</tr>
			</thead>
            <tbody>
            	@foreach ($CajasDisponibles as $Caja)
                <tr>
					<td>{{{ $Caja->VEN_Caja_id }}}</td>
					<td>{{{ $Caja->VEN_Caja_Codigo }}}</td>
					<td>{{{ $Caja->VEN_Caja_Numero }}}</td>
					@if ($Caja->VEN_Caja_Estado == 1)
						<td>Lista</td>
					@else
						<td>Abierta</td>
					@endif
					<td>{{ PeriodoCierreDeCaja::where('VEN_PeriodoCierreDeCaja_id', $Caja->VEN_PeriodoCierreDeCaja_VEN_PeriodoCierreDeCaja_id)->first()->VEN_PeriodoCierreDeCaja_Codigo }}</td>
					<td>{{{ $Caja->VEN_Caja_SaldoInicial }}}</td>
					@if ($Caja->VEN_Caja_Estado == 1)
                    	<td>{{ link_to_route('Ventas.AperturaCajas.abrir', 'Abrir Caja', array($Caja->VEN_Caja_id), array('class' => 'btn btn-info')) }}</td>
                    @else
                    	<td><button type="button" class="btn btn-danger" disabled="disabled">Caja Abierta</button></td>
                    @endif
				</tr>
                @endforeach
              </tbody>
            </table>
          </div>
@else
	<div class="alert alert-danger">
      <strong>Oh no!</strong> No hay cajas disponibles :(
    </div>
@endif

@stop
