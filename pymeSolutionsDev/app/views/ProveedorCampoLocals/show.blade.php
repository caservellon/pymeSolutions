@extends('layouts.scaffold')

@section('main')

<h1>Show ProveedorCampoLocal</h1>

<p>{{ link_to_route('ProveedorCampoLocals.index', 'Return to all ProveedorCampoLocals') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>INV_Proveedor_CampoLocal_ID</th>
				<th>INV_Proveedor_CampoLocal_Valor</th>
				<th>INV_Proveedor_CampoLocal_FechaCreacion</th>
				<th>INV_Proveedor_CampoLocal_UsuarioCreacion</th>
				<th>INV_Proveedor_CampoLocal_FechaModificacion</th>
				<th>INV_Proveedor_CampoLocal_UsuarioModificacion</th>
				<th>INV_Proveedor_INV_Proveedor_ID</th>
				<th>INV_Proveedor_INV_Ciudad_ID</th>
				<th>GEN_CampoLocal_GEN_CampoLocal_ID</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $ProveedorCampoLocal->INV_Proveedor_CampoLocal_ID }}}</td>
					<td>{{{ $ProveedorCampoLocal->INV_Proveedor_CampoLocal_Valor }}}</td>
					<td>{{{ $ProveedorCampoLocal->INV_Proveedor_CampoLocal_FechaCreacion }}}</td>
					<td>{{{ $ProveedorCampoLocal->INV_Proveedor_CampoLocal_UsuarioCreacion }}}</td>
					<td>{{{ $ProveedorCampoLocal->INV_Proveedor_CampoLocal_FechaModificacion }}}</td>
					<td>{{{ $ProveedorCampoLocal->INV_Proveedor_CampoLocal_UsuarioModificacion }}}</td>
					<td>{{{ $ProveedorCampoLocal->INV_Proveedor_INV_Proveedor_ID }}}</td>
					<td>{{{ $ProveedorCampoLocal->INV_Proveedor_INV_Ciudad_ID }}}</td>
					<td>{{{ $ProveedorCampoLocal->GEN_CampoLocal_GEN_CampoLocal_ID }}}</td>
                    <td>{{ link_to_route('ProveedorCampoLocals.edit', 'Edit', array($ProveedorCampoLocal->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('ProveedorCampoLocals.destroy', $ProveedorCampoLocal->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
