@extends('layouts.scaffold')

@section('main')


<h3 class="sub-header">Seleccione los Productos a Incluir en la Entrada de Inventario</h3>

{{ Form::open(array('route' => 'Inventario.DetalleMovimiento.Agregar', '1')) }}   
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Venta</th>
                <th>Precio Costo</th>
                <th>Incluir</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($Productos as $Producto)
                <tr>
                    <td>{{{ $Producto->INV_Producto_ID }}}</td>
                    <td>{{{ $Producto->INV_Producto_Codigo }}}</td>
                    <td>{{{ $Producto->INV_Producto_Nombre }}}</td>
                    <td>{{ Form::text('INV_DetalleMovimiento_CantidadProducto', $Producto->INV_Producto_Cantidad, array('class' => 'form-control', 'id' => 'INV_DetalleMovimiento_CantidadProducto', 'placeholder' => '#' )) }}</td>
                    <td>{{ Form::text('INV_DetalleMovimiento_PrecioCosto',$Producto->INV_Producto_PrecioVenta, array('class' => 'form-control', 'id' => 'INV_DetalleMovimiento_PrecioCosto', 'placeholder' => '#' )) }}</td>
                    <td>{{ Form::text('INV_DetalleMovimiento_PrecioVenta',$Producto->INV_Producto_PrecioCosto, array('class' => 'form-control', 'id' => 'INV_DetalleMovimiento_PrecioVenta', 'placeholder' => '#' )) }}</td>
                    <td>{{ link_to_route('Inventario.DetalleMovimiento.Agregar', 'Agregar', array($Producto->INV_Producto_ID), array('class' => 'btn btn-info')) }}</td>
                </tr>
                {{ Form::hidden('INV_DetalleMovimiento_IDProducto', $Producto->INV_Producto_ID) }}
                {{ Form::hidden('INV_DetalleMovimiento_CodigoProducto', $Producto->INV_Producto_Codigo) }}
                {{ Form::hidden('INV_DetalleMovimiento_NombreProducto', $Producto->INV_Producto_Nombre) }}
                {{ Form::hidden('INV_DetalleMovimiento_FechaCreacion', date('Y-m-d H:i:s')) }}
                {{ Form::hidden('INV_DetalleMovimiento_FechaModificacion', date('Y-m-d H:i:s')) }}
                {{ Form::hidden('INV_Movimiento_ID', $id) }}
                {{ Form::hidden('INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID', $Motivo->INV_MotivoMovimiento_INV_MotivoMovimiento_ID) }}
                {{ Form::hidden('INV_Producto_INV_Producto_ID', $Producto->INV_Producto_ID) }}
                {{ Form::hidden('INV_Producto_INV_Categoria_ID', $Producto->INV_Categoria_ID) }}
                {{ Form::hidden('INV_Producto_INV_Categoria_IDCategoriaPadre', $Producto->INV_Categoria_IDCategoriaPadre) }}
                {{ Form::hidden('INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID', $Producto->INV_UnidadMedida_ID) }}
            @endforeach
        </tbody>
      </table>
    </div>
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Aceptar', array('class' => 'btn btn-info')) }}
      </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


