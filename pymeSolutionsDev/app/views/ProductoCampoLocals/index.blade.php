@extends('layouts.scaffold')

@section('main')

<h1>All ProductoCampoLocals</h1>

<p>{{ link_to_route('ProductoCampoLocals.create', 'Add new ProductoCampoLocal') }}</p>

@if ($ProductoCampoLocals->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>INV_Producto_CampoLocal_IDCampoLocal</th>
				<th>INV_Producto_CampoLocal_Valor</th>
				<th>INV_Producto_CampoLocal_FechaCreacion</th>
				<th>INV_Producto_CampoLocal_UsuarioCreacion</th>
				<th>INV_Producto_CampoLocal_FechaModificacion</th>
				<th>INV_Producto_CampoLocal_UsuarioModificacion</th>
				<th>INV_Producto_ID</th>
				<th>GEN_CampoLocal_GEN_CampoLocal_ID</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($ProductoCampoLocals as $ProductoCampoLocal)
				<tr>
					<td>{{{ $ProductoCampoLocal->INV_Producto_CampoLocal_IDCampoLocal }}}</td>
					<td>{{{ $ProductoCampoLocal->INV_Producto_CampoLocal_Valor }}}</td>
					<td>{{{ $ProductoCampoLocal->INV_Producto_CampoLocal_FechaCreacion }}}</td>
					<td>{{{ $ProductoCampoLocal->INV_Producto_CampoLocal_UsuarioCreacion }}}</td>
					<td>{{{ $ProductoCampoLocal->INV_Producto_CampoLocal_FechaModificacion }}}</td>
					<td>{{{ $ProductoCampoLocal->INV_Producto_CampoLocal_UsuarioModificacion }}}</td>
					<td>{{{ $ProductoCampoLocal->INV_Producto_ID }}}</td>
					<td>{{{ $ProductoCampoLocal->GEN_CampoLocal_GEN_CampoLocal_ID }}}</td>
                    <td>{{ link_to_route('ProductoCampoLocals.edit', 'Edit', array($ProductoCampoLocal->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('ProductoCampoLocals.destroy', $ProductoCampoLocal->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no ProductoCampoLocals
@endif

@stop
