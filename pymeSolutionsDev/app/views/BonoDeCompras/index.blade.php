@extends('layouts.scaffold')

@section('main')

<h1>All BonoDeCompras</h1>

<p>{{ link_to_route('BonoDeCompras.create', 'Add new BonoDeCompra') }}</p>

@if ($BonoDeCompras->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>VEN_BonoDeCompra_id</th>
				<th>VEN_BonoDeCompra_Numero</th>
				<th>VEN_BonoDeCompra_Valor</th>
				<th>VEN_EstadoBono_VEN_EstadoBono_id</th>
				<th>VEN_Devolucion_VEN_Devolucion_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($BonoDeCompras as $BonoDeCompra)
				<tr>
					<td>{{{ $BonoDeCompra->VEN_BonoDeCompra_id }}}</td>
					<td>{{{ $BonoDeCompra->VEN_BonoDeCompra_Numero }}}</td>
					<td>{{{ $BonoDeCompra->VEN_BonoDeCompra_Valor }}}</td>
					<td>{{{ $BonoDeCompra->VEN_EstadoBono_VEN_EstadoBono_id }}}</td>
					<td>{{{ $BonoDeCompra->VEN_Devolucion_VEN_Devolucion_id }}}</td>
                    <td>{{ link_to_route('BonoDeCompras.edit', 'Edit', array($BonoDeCompra->VEN_BonoDeCompra_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('BonoDeCompras.destroy', $BonoDeCompra->VEN_BonoDeCompra_id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no BonoDeCompras
@endif

@stop
