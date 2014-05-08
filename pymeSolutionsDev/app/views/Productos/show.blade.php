@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Producto &gt; <small>{{{ $Producto->INV_Producto_Codigo }}}</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Productos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

<div class="form-group">
        <h4>ID# : {{{ $Producto->INV_Producto_ID }}}</h4>
</div>
<div class="form-group">
        <h4>Codigo : {{{ $Producto->INV_Producto_Codigo }}}</h4>
</div>
<div class="form-group">
        <h4>Nombre : {{{ $Producto->INV_Producto_Nombre }}}</h4>
</div>
<div class="form-group">
        <h4>Descripción : {{{ $Producto->INV_Producto_Descripcion }}}</h4>
</div>
<div class="form-group">
        <h4>Precio de Venta : {{{ $Producto->INV_Producto_PrecioVenta }}}</h4>
</div>
<div class="form-group">
        <h4>Margen de Ganancia : {{{ $Producto->INV_Producto_MargenGanancia }}}</h4>
</div>
<div class="form-group">
        <h4>Precio de Costo : {{{ $Producto->INV_Producto_PrecioCosto }}}</h4>
</div>
<div class="form-group">
        <h4>Cantidad : {{{ $Producto->INV_Producto_Cantidad }}}</h4>
</div>
<div class="form-group">
        <h4>Impuesto 1 : {{{ $Producto->INV_Producto_Impuesto1 }}}</h4>
</div>
<div class="form-group">
        <h4>Impuesto 2 : {{{ $Producto->INV_Producto_Impuesto2 }}}</h4>
</div>
<div class="form-group">
        <h4>Ruta de Imagen : {{{ $Producto->INV_Producto_RutaImagen }}}</h4>
</div>
<div class="form-group">
        <h4>Comentarios : {{{ $Producto->INV_Producto_Comentarios }}}</h4>
</div>
<div class="form-group">
        <h4>Punto de Reorden : {{{ $Producto->INV_Producto_PuntoReorden }}}</h4>
</div>
<div class="form-group">
        <h4>Nivel de Reposición : {{{ $Producto->INV_Producto_NivelReposicion }}}</h4>
</div>
<div class="form-group">
        <h4>Tipo de Código de Barras : {{{ $Producto->INV_Producto_TipoCodigoBarras }}}</h4>
</div>
<div class="form-group">
        <h4>Valor de Código de Barras : {{{ $Producto->INV_Producto_ValorCodigoBarras }}}</h4>
</div>
<div class="form-group">
        <h4>Valor de Descuento : {{{ $Producto->INV_Producto_ValorDescuento }}}</h4>
</div>
<div class="form-group">
        <h4>Porcentaje de Descuento : {{{ $Producto->INV_Producto_PorcentajeDescuento }}}</h4>
</div>
<div class="form-group"><h4>Estado : 
	@if($Producto->INV_Producto_Activo == 1)
        Activado
    @else
    	Desactivado
    @endif
    </h4>    
</div>
<div class="form-group">
        <h4>Categoría ID : {{{ $Producto->INV_Categoria_ID }}}</h4>
</div>
<div class="form-group">
        <h4>ID Categoría Padre : {{{ $Producto->INV_Categoria_IDCategoriaPadre }}}</h4>
</div>
<div class="form-group">
        <h4>ID Unidad de Medida : {{{ $Producto->INV_UnidadMedida_ID }}}</h4>
</div>
<div class="form-group">
        <h4>ID Horario de Bloqueo : {{{ $Producto->INV_HorarioBloqueo_ID }}}</h4>
</div>

<div class="form-group">
		{{ link_to_route('Inventario.Productos.edit', 'Edit', array($Producto->INV_Producto_ID), array('class' => 'btn btn-info')) }}
	    {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Productos.destroy', $Producto->INV_Producto_ID))) }}
	        	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
	    	{{ Form::close() }}
</div>

@stop
