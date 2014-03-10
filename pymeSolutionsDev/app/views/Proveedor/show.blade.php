@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Proveedor &gt; <small>{{{ $Proveedor->INV_Proveedor_Codigo }}}</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Proveedor') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

<div class="form-group">
        <h4>ID# : {{{ $Proveedor->INV_Proveedor_ID }}}</h4>
</div>
<div class="form-group">
        <h4>Codigo : {{{ $Proveedor->INV_Proveedor_Codigo }}}</h4>
</div>
<div class="form-group">
        <h4>Nombre : {{{ $Proveedor->INV_Proveedor_Nombre }}}</h4>
</div>
<div class="form-group">
        <h4>Dirección : {{{ $Proveedor->INV_Proveedor_Direccion }}}</h4>
</div>
<div class="form-group">
        <h4>Teléfono : {{{ $Proveedor->INV_Proveedor_Telefono }}}</h4>
</div>
<div class="form-group">
        <h4>Email : {{{ $Proveedor->INV_Proveedor_Email }}}</h4>
</div>
<div class="form-group">
        <h4>Página Web : {{{ $Proveedor->INV_Proveedor_PaginaWeb }}}</h4>
</div>
<div class="form-group">
        <h4>Representante de Ventas : {{{ $Proveedor->INV_Proveedor_RepresentanteVentas }}}</h4>
</div>
<div class="form-group">
        <h4>Teléfono Representante : {{{ $Proveedor->INV_Proveedor_TelefonoRepresentanteVentas }}}</h4>
</div>
<div class="form-group">
        <h4>Comentarios : {{{ $Proveedor->INV_Proveedor_Comentarios }}}</h4>
</div>
<div class="form-group">
        <h4>Ruta de Imagen : {{{ $Proveedor->INV_Proveedor_RutaImagen }}}</h4>
</div>
<div class="form-group"><h4>Estado : 
	@if($Proveedor->INV_Proveedor_Activo == 1)
        Activado
    @else
    	Desactivado
    @endif
    </h4>    
</div>

<div class="form-group">
		{{ link_to_route('Inventario.Proveedor.edit', 'Edit', array($Proveedor->INV_Proveedor_ID), array('class' => 'btn btn-info')) }}
	    {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Proveedor.destroy', $Proveedor->INV_Proveedor_ID))) }}
	        	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
	    	{{ Form::close() }}
</div>

@stop
