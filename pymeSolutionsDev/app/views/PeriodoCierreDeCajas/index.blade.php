@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listado de Periodo de Cierres</h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Ventas.PeriodoCierreDeCajas.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-time"></span> Agregar Periodo
	</a>
</div>

@if ($PeriodoCierreDeCajas->count())
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
					<th>#</th>
					<th>Código</th>
					<th>Horas</th>
					<th>Hora de Partida</th>
					<th>Estado</th>
				</tr>
			</thead>
            <tbody>
            @foreach ($PeriodoCierreDeCajas as $PeriodoCierreDeCaja)
                <tr>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_id }}}</td>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_Codigo }}}</td>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_ValorHoras }}}</td>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_HoraPartida }}}</td>
					@if ($PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_Estado == 1)
						<td>Activa</td>
					@else
						<td>Desactivada</td>
					@endif
					
                    <td>{{ link_to_route('Ventas.PeriodoCierreDeCajas.edit', 'Editar', array($PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_id ), array('class' => 'btn btn-info')) }}</td>
                    <td>

                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Ventas.PeriodoCierreDeCajas.destroy', $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_id))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
            @endforeach
            </tbody>
            </table>
</div>
@else
	<div class="alert alert-danger">
      <strong>Oh no!</strong> No hay periodos disponibles :(
    </div>
@endif

@stop


