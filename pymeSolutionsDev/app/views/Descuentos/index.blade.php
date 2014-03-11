@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Descuentos Especiales</h2>
<br>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Ventas.Descuentos.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-usd"></span> Agregar Descuento
	</a>
</div>

@if ($Descuentos->count())

	<div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
				<th>#</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Valor</th>
				<th>Fecha Inicio</th>
				<th>Fecha Final</th>
				<th>Precedencia</th>
				<th>Estado</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Descuentos as $Descuento)
				<tr>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_id }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_Codigo }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_Nombre }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_Valor }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_FechaInicio }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_FechaFinal }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_Precedencia }}}</td>
					@if ($Descuento->VEN_DescuentoEspecial_Estado  == 1)
						<td>Activa</td>
					@else
						<td>Desactivada</td>
					@endif
                    <td>{{ link_to_route('Ventas.Descuentos.edit', 'Editar', array($Descuento->VEN_DescuentoEspecial_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Ventas.Descuentos.destroy', $Descuento->VEN_DescuentoEspecial_id))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no Descuentos
@endif

@stop
