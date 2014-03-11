@extends('layouts.scaffold')

@section('main')

<h1>Show Descuento</h1>

<p>{{ link_to_route('Ventas.Descuentos.index', 'Return to all Descuentos') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>VEN_DescuentoEspecial_id</th>
				<th>VEN_DescuentoEspecial_Codigo</th>
				<th>VEN_DescuentoEspecial_Nombre</th>
				<th>VEN_DescuentoEspecial_Valor</th>
				<th>VEN_DescuentoEspecial_FechaInicio</th>
				<th>VEN_DescuentoEspecial_FechaFinal</th>
				<th>VEN_DescuentoEspecial_Precedencia</th>
				<th>VEN_DescuentoEspecial_Estado</th>
				<th>VEN_DescuentoEspecial_TimeStamp</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Descuento->VEN_DescuentoEspecial_id }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_Codigo }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_Nombre }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_Valor }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_FechaInicio }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_FechaFinal }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_Precedencia }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_Estado }}}</td>
					<td>{{{ $Descuento->VEN_DescuentoEspecial_TimeStamp }}}</td>
                    <td>{{ link_to_route('Ventas.Descuentos.edit', 'Edit', array($Descuento->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Ventas.Descuentos.destroy', $Descuento->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
