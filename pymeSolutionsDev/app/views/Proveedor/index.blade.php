@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header">Proveedores</h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Inventario.Proveedor.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Proveedor
	</a>
	 <a href="{{{ URL::to('Inventario/Proveedor') }}}" class="btn btn-sm btn-primary col-md-offset-8"><span class="glyphicon glyphicon-refresh"></span> Refrescar</a>
</div>

{{ Form::open(array('route' => 'Proveedor.search_index')) }}
{{ Form::label('SearchLabel', 'Busqueda: ', array('class' => 'col-md-2 control-label')) }}
{{ Form::text('search', null, array('class' => 'col-md-4', 'form-control', 'id' => 'search', 'placeholder'=>'Buscar por nombre, ciudad, codigo..')) }}
{{ Form::submit('Buscar', array('class' => 'btn btn-success btn-sm' )) }}
{{ Form::close() }}

@if ($Proveedor->count())
	
	<div class="table-responsive">
      <table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Email</th>
				<th>Pagina Web</th>
				<th>Representante Ventas</th>
				<th>Telefono Representante Ventas</th>
				<th>Comentarios</th>
				<th>Ruta Imagen</th>
				<th>Fecha Creacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
				<th>Activo</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Proveedor as $Proveedor)
				<tr>
					<td>{{{ $Proveedor->INV_Proveedor_ID }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Codigo }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Nombre }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Direccion }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Telefono }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Email }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_PaginaWeb }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_RepresentanteVentas }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_TelefonoRepresentanteVentas }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Comentarios }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_RutaImagen }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_FechaCreacion }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_UsuarioCreacion }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_FechaModificacion }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_UsuarioModificacion }}}</td>
					<td>{{{ $Proveedor->INV_Proveedor_Activo ? 'Activa' : 'Desactivada' }}}</td>

					@foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','INV_PRV%')->get() as $campo)
					    @if (DB::table('INV_Proveedor_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Proveedor_INV_Proveedor_ID',$Proveedor->INV_Proveedor_ID)->count() > 0 )
					    	<td>{{{ DB::table('INV_Proveedor_CampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('INV_Proveedor_INV_Proveedor_ID',$Proveedor->INV_Proveedor_ID)->first()->INV_Proveedor_CampoLocal_Valor }}}</td>
					    @else
					    	<td></td>
					    @endif
					@endforeach

                    <td>{{ link_to_route('Inventario.Proveedor.edit', 'Editar', array($Proveedor->INV_Proveedor_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Proveedor.destroy', $Proveedor->INV_Proveedor_ID))) }}
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
      <strong>Oh no!</strong> No hay proveedores disponibles :(
    </div>
@endif

@stop
