@extends('layouts.scaffold')

@section('main')

<h1>Subcuenta</h1>

<p>{{ link_to_route('Subcuenta.index', 'Return to all Subcuenta') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>CON_Subcuenta_ID</th>
				<th>CON_Subcuenta_Codigo</th>
				<th>CON_Subcuenta_Nombre</th>
				<th>CON_Subcuenta_FechaCreacion</th>
				<th>CON_Subcuenta_FechaModificacion</th>
				<th>CON_CatalogoContable_ID</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Subcuentum->CON_Subcuenta_ID }}}</td>
					<td>{{{ $Subcuentum->CON_Subcuenta_Codigo }}}</td>
					<td>{{{ $Subcuentum->CON_Subcuenta_Nombre }}}</td>
					<td>{{{ $Subcuentum->CON_Subcuenta_FechaCreacion }}}</td>
					<td>{{{ $Subcuentum->CON_Subcuenta_FechaModificacion }}}</td>
					<td>{{{ $Subcuentum->CON_CatalogoContable_ID }}}</td>
                    <td>{{ link_to_route('Subcuenta.edit', 'Edit', array($Subcuentum->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Subcuenta.destroy', $Subcuentum->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
