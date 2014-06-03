@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Historial de Movimientos</h2>
<div class="btn-agregar">
<a href="{{{ URL::to('Inventario/DetalleMovimiento') }}}" class="btn btn-sm btn-primary col-md-offset-12"><span class="glyphicon glyphicon-refresh"></span> Refrescar</a>
</div>


{{ Form::open(array('route' => 'DetalleMovimientos.search_index')) }}
{{ Form::label('FchaIncLabel', 'Fecha Inicial: ', array('class' => 'col-md-2 control-label')) }}
{{ Form::text('FechaInc', null,  array('class' => 'col-md-3', 'form-control', 'id' => 'FechaInc', 'placeholder'=>'Dia/Mes/Ano')) }}
{{ Form::label('FechaFinLabel', 'Fecha Final: ', array('class' => 'col-md-2 control-label')) }}
{{ Form::text('FechaFin', null,  array('class' => 'col-md-3', 'form-control', 'id' => 'FechaFin', 'placeholder'=>'Dia/Mes/Ano')) }}
{{ Form::submit('Buscar', array('class' => 'btn btn-success btn-sm' )) }}
{{ Form::hidden('INV_DetalleMovimiento_IDProducto', $DetalleMovimientos[0]->INV_DetalleMovimiento_IDProducto) }}
{{ Form::close() }}

<br /> 
<div class="detalle-movi"></div>

{{ Form::label('CantidadA', 'Cantidad Actual: ', array('class' => 'col-md-2 control-label')) }}
{{ Form::text('CantidadAT', DB::table('INV_Producto')->where('INV_Producto_ID', $DetalleMovimientos[0]->INV_DetalleMovimiento_IDProducto)->first()->INV_Producto_Cantidad,  array('class' => 'col-md-1', 'form-control', 'disabled' , 'id' => 'FechaFin', 'placeholder'=>'Dia/Mes/Ano')) }}

@if ($DetalleMovimientos->count())
	
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<!-- <th>INV_DetalleMovimiento_ID</th> -->
				<!-- <th>INV_DetalleMovimiento_IDProducto</th> -->
				<!-- <th>INV_DetalleMovimiento_CodigoProducto</th> -->
				<th>Producto</th>
				<th>Motivo</th>
				<th>Descripcion</th>
				<th>Cantidad</th>
				<th>Precio Costo</th>
				<th>Precio Venta</th>
				<th>Fecha</th>
				<th>Usuario </th>
				<!-- <th>INV_DetalleMovimiento_FechaModificacion</th>-->
				<!-- <th>INV_DetalleMovimiento_UsuarioModificacion</th>-->
				<!-- <th>INV_Producto_INV_Producto_ID</th> -->
				<!-- <th>INV_Producto_INV_Categoria_ID</th> -->
				<!-- <th>INV_Producto_INV_Categoria_IDCategoriaPadre</th> -->
				<!-- <th>INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID</th> -->
			</tr>
		</thead>

		<tbody>
			@foreach ($DetalleMovimientos as $DetalleMovimiento)
				<tr>
					<!-- <td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_ID }}}</td> -->
					<!-- <td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_IDProducto }}}</td> -->
					<!-- <td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_CodigoProducto }}}</td> -->
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_NombreProducto }}}</td>
					<td>{{{ DB::table('INV_MotivoMovimiento')->where('INV_MotivoMovimiento_ID', $DetalleMovimiento->INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID)->first()->INV_MotivoMovimiento_Nombre  }}}</td>
					<td>{{{ DB::table('INV_Movimiento')->where('INV_Movimiento_ID', $DetalleMovimiento->INV_Movimiento_ID)->first()->INV_Movimiento_Observaciones }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_CantidadProducto }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_PrecioCosto }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_PrecioVenta }}}</td>
					<!--<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_FechaCreacion }}}</td>-->
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_FechaModificacion }}}</td>
					<td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_UsuarioCreacion }}}</td>
					<!-- <td>{{{ $DetalleMovimiento->INV_DetalleMovimiento_UsuarioModificacion }}}</td>-->
					<!-- <td>{{{ $DetalleMovimiento->INV_Producto_INV_Producto_ID }}}</td> -->
					<!-- <td>{{{ $DetalleMovimiento->INV_Producto_INV_Categoria_ID }}}</td> -->
					<!-- <td>{{{ $DetalleMovimiento->INV_Producto_INV_Categoria_IDCategoriaPadre }}}</td> -->
					<!-- <td>{{{ $DetalleMovimiento->INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID }}}</td>-->
                    <!--<td>{{ link_to_route('Inventario.DetalleMovimiento.edit', 'Edit', array($DetalleMovimiento->INV_DetalleMovimiento_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.DetalleMovimiento.destroy', $DetalleMovimiento->INV_DetalleMovimiento_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>-->

				</tr>
			@endforeach
		</tbody>
	</table>
@else
	<div class="alert alert-danger">
      <strong>Oh no!</strong> No hay Historial disponible :(
	</div>
@endif

@stop
