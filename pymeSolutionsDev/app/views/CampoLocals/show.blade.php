@extends('layouts.scaffold')

@section('main')


<div class="page-header clearfix">
      <h3 class="pull-left">Campo Local &gt; <small>{{{ $CampoLocal->GEN_CampoLocal_Nombre }}}</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('CampoLocals') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>


<div class="form-group">
        <h4>ID# : {{{ $CampoLocal->GEN_CampoLocal_ID }}}</h4>
</div>
<div class="form-group">
        <h4>Nombre del Campo : {{{ $CampoLocal->GEN_CampoLocal_Nombre }}}</h4>
</div>
<div class="form-group">
        <h4>Código del Campo : {{{ $CampoLocal->GEN_CampoLocal_Codigo }}}</h4>
</div>
<div class="form-group"><h4>Estado : 
	@if($CampoLocal->GEN_CampoLocal_Activo == 1)
        Activado
    @else
    	Desactivado
    @endif
    </h4>    
</div>
<div class="form-group">
        <h4>Tipo de Campo : {{{ $CampoLocal->GEN_CampoLocal_Tipo }}}</h4>
</div>
<div class="form-group">
        <h4>GEN_CampoLocal_Requerido GEN_CampoLocal_ParametroBusqueda Tipo de Campo : {{{ $CampoLocal->GEN_CampoLocal_Tipo }}}</h4>
</div>

<div class="form-group">
		{{ link_to_route('CampoLocals.edit', 'Edit', array($CampoLocal->GEN_CampoLocal_ID), array('class' => 'btn btn-info')) }}
	    {{ Form::open(array('method' => 'DELETE', 'route' => array('CampoLocals.destroy', $CampoLocal->GEN_CampoLocal_ID))) }}
	        	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
	    	{{ Form::close() }}
</div>


@stop
