@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Detalle Salida &gt; <small>Agregar</small></h3>
</div>

{{ Form::open(array('route' => 'Inventario.DetalleSalida.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
    <div class="form-group">
    {{ Form::label('INV_Producto_ID', 'ID:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-4">
          {{ Form::text('INV_Producto_ID', $Producto->INV_Producto_ID, array('class' => 'form-control', 'id' => 'INV_Producto_ID', 'disabled')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_Codigo', 'Código:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_Codigo',$Producto->INV_Producto_Codigo, array('class' => 'form-control', 'id' => 'INV_Producto_Codigo disabledInput', 'placeholder' => 'Código', 'disabled' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Producto_Nombre', 'Nombre:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Producto_Nombre',$Producto->INV_Producto_Nombre, array('class' => 'form-control', 'id' => 'INV_Producto_Nombre disabledInput', 'placeholder' => 'Nombre', 'rows' => '3', 'disabled' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_DetalleMovimiento_CantidadProducto', 'Cantidad:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_DetalleMovimiento_CantidadProducto',$Motivo->INV_DetalleMovimiento_CantidadProducto, array('class' => 'form-control', 'id' => 'INV_DetalleMovimiento_CantidadProducto', 'placeholder' => '#', 'rows' => '3' )) }}
      </div>
    </div>
    <!-- Calcular Precio Costo -->
    {{ Form::hidden('INV_DetalleMovimiento_IDProducto', $Producto->INV_Producto_ID) }}
    {{ Form::hidden('INV_DetalleMovimiento_CodigoProducto', $Producto->INV_Producto_Codigo) }}
    {{ Form::hidden('INV_DetalleMovimiento_NombreProducto', $Producto->INV_Producto_Nombre) }}
    {{ Form::hidden('INV_DetalleMovimiento_PrecioVenta', $Producto->INV_Producto_PrecioVenta) }}
    {{ Form::hidden('INV_DetalleMovimiento_PrecioCosto', $Producto->INV_Producto_PrecioCosto) }}
    {{ Form::hidden('INV_DetalleMovimiento_FechaCreacion', date('Y-m-d H:i:s')) }}
    {{ Form::hidden('INV_DetalleMovimiento_FechaModificacion', date('Y-m-d H:i:s')) }}
    {{ Form::hidden('INV_Movimiento_ID', $Motivo->INV_Movimiento_ID) }}
    {{ Form::hidden('INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID', $Motivo->INV_MotivoMovimiento_INV_MotivoMovimiento_ID) }}
    {{ Form::hidden('INV_Producto_INV_Producto_ID', $Producto->INV_Producto_ID) }}
    {{ Form::hidden('INV_Producto_INV_Categoria_ID', $Producto->INV_Categoria_ID) }}
    {{ Form::hidden('INV_Producto_INV_Categoria_IDCategoriaPadre', $Producto->INV_Categoria_IDCategoriaPadre) }}
    {{ Form::hidden('INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID', $Producto->INV_UnidadMedida_ID) }}
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Aceptar', array('class' => 'btn btn-info')) }}
            {{ link_to_route('Inventario.DetalleSalida.create', 'Cancelar', null, array('class' => 'btn btn-danger')) }}
      </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
