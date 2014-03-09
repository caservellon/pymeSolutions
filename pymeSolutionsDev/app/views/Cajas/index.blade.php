@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header">Listado de Cajas</h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Ventas.Cajas.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Caja
	</a>
</div>

@if ($Cajas->count())
	
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
            	@foreach ($Cajas as $Caja)
                <tr>
					<td>{{{ $Caja->VEN_Caja_id }}}</td>
					<td>{{{ $Caja->VEN_Caja_Codigo }}}</td>
					<td>{{{ $Caja->VEN_Caja_Numero }}}</td>
					@if ($Caja->VEN_Caja_Estado == 1)
						<td>Activa</td>
					@else
						<td>Desactivada</td>
					@endif
					<td>{{ PeriodoCierreDeCaja::where('VEN_PeriodoCierreDeCaja_id', $Caja->VEN_PeriodoCierreDeCaja_VEN_PeriodoCierreDeCaja_id)->first()->VEN_PeriodoCierreDeCaja_Codigo }}</td>
					<td>{{{ $Caja->VEN_Caja_SaldoInicial }}}</td>
                    <td>{{ link_to_route('Ventas.Cajas.edit', 'Edit', array($Caja->VEN_Caja_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Ventas.Cajas.destroy', $Caja->VEN_Caja_id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
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
