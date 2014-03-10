@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">UnidadMedida &gt; <small>{{{ $UnidadMedida->INV_UnidadMedida_Nombre }}}</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/UnidadMedidas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

<div class="form-group">
        <h4>ID# : {{{ $UnidadMedida->INV_UnidadMedida_ID }}}</h4>
</div>
<div class="form-group">
        <h4>Nombre : {{{ $UnidadMedida->INV_UnidadMedida_Nombre }}}</h4>
</div>
<div class="form-group">
        <h4>Descripción : {{{ $UnidadMedida->INV_UnidadMedida_Descripcion }}}</h4>
</div>
<div class="form-group"><h4>Estado : 
	@if($UnidadMedida->INV_UnidadMedida_Activo == 1)
        Activada
    @else
    	Desactivada
    @endif
    </h4>    
</div>

<div class="form-group">
		{{ link_to_route('Inventario.UnidadMedidas.edit', 'Edit', array($UnidadMedida->INV_UnidadMedida_ID), array('class' => 'btn btn-info')) }}
	    {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.UnidadMedidas.destroy', $UnidadMedida->INV_UnidadMedida_ID))) }}
	        	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
	    	{{ Form::close() }}
</div>

@stop
