@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Forma de Pago &gt; <small>{{{ $FormaPago->INV_FormaPago_Nombre }}}</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/FormaPagos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

<div class="form-group">
        <h4>ID# : {{{ $FormaPago->INV_FormaPago_ID }}}</h4>
</div>
<div class="form-group">
        <h4>Nombre : {{{ $FormaPago->INV_FormaPago_Nombre }}}</h4>
</div>
<div class="form-group"><h4>Efectivo : 
	@if($FormaPago->INV_FormaPago_Efectivo == 1)
        Si
    @else
    	No
    @endif
    </h4>    
</div>
<div class="form-group"><h4>Crédito : 
	@if($FormaPago->INV_FormaPago_Credito == 1)
        Si
    @else
    	No
    @endif
    </h4>    
</div>

<div class="form-group">
        <h4>Días Crédito : {{{ $FormaPago->INV_FormaPago_DiasCredito }}}</h4>
</div>
<div class="form-group"><h4>Estado : 
	@if($FormaPago->VEN_FormaPago_Estado == 1)
        Activada
    @else
    	Desactivada
    @endif
    </h4>    
</div>

<div class="form-group">
		{{ link_to_route('Inventario.FormaPagos.edit', 'Edit', array($FormaPago->VEN_FormaPago_ID), array('class' => 'btn btn-info')) }}
	    {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.FormaPagos.destroy', $FormaPago->VEN_FormaPago_ID))) }}
	        	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
	    	{{ Form::close() }}
</div>

@stop
