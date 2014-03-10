@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Categoria &gt; <small>{{{ $Categoria->INV_Categoria_Codigo }}}</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Categoria') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

<div class="form-group">
        <h4>ID# : {{{ $Categoria->INV_Categoria_ID }}}</h4>
</div>
<div class="form-group">
        <h4>Código de Categoria : {{{ $Categoria->INV_Categoria_Codigo }}}</h4>
</div>
<div class="form-group">
        <h4>Nombre : {{{ $Categoria->INV_Categoria_Nombre }}}</h4>
</div>
<div class="form-group">
        <h4>Descripción : {{{ $Categoria->INV_Categoria_Descripcion }}}</h4>
</div>
<div class="form-group"><h4>Estado : 
	@if($Categoria->INV_Categoria_Activo == 1)
        Activada
    @else
    	Desactivada
    @endif
    </h4>    
</div>
<div class="form-group">
        <h4>ID Categoria Padre : {{{ $Categoria->INV_Categoria_IDCategoriaPadre }}}</h4>
</div>
<div class="form-group">
        <h4>Horario Descuento : {{{ $Categoria->INV_Categoria_HorarioDescuento_ID }}}</h4>
</div>

<div class="form-group">
		{{ link_to_route('Inventario.Categoria.edit', 'Edit', array($Categoria->INV_Categoria_ID), array('class' => 'btn btn-info')) }}
	    {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Categoria.destroy', $Categoria->INV_Categoria_ID))) }}
	        	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
	    	{{ Form::close() }}
</div>

@stop
