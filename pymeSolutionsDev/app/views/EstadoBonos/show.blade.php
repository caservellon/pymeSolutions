@extends('layouts.scaffold')

@section('main')

<h1>Show EstadoBono</h1>

<p>{{ link_to_route('EstadoBonos.index', 'Return to all EstadoBonos') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>VEN_EstadoBono_id</th>
				<th>VEN_EstadoBono_Codigo</th>
				<th>VEN_EstadoBono_Nombre</th>
				<th>VEN_EstadoBono_Descripcion</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $EstadoBono->VEN_EstadoBono_id }}}</td>
					<td>{{{ $EstadoBono->VEN_EstadoBono_Codigo }}}</td>
					<td>{{{ $EstadoBono->VEN_EstadoBono_Nombre }}}</td>
					<td>{{{ $EstadoBono->VEN_EstadoBono_Descripcion }}}</td>
                    <td>{{ link_to_route('EstadoBonos.edit', 'Edit', array($EstadoBono->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('EstadoBonos.destroy', $EstadoBono->VEN_EstadoBono_id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
