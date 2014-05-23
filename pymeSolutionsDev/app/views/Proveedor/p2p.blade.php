@extends('layouts.scaffold')


@section('main')

 <div class="page-header clearfix">
      <h3 class="pull-left">Proveedor &gt; <small>Producto</small></h3>
      <div class="pull-right">
        <a href="/Inventario/Proveedor" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

<div id="p2p-view"></div>
    {{ Form::open(array('route' => 'Proveedor.save', 'class' => 'form-horizontal', 'role' => 'form' )) }}
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Nombre', 'Proveedor:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::select('INV_Proveedor_Nombre', $proveedor, null, array( 'id' => 'INV_Proveedor_Nombre')) }}
        </div>
    </div>

    <div class="value-list form-group">
      <label class="col-md-2 control-label">Producto:</label>
      <div class="col-md-5">
        <div class="input-group">
        {{ Form::select('INV_Producto_Nombre', $productos, null, array('class' => 'value-input form-control', 'id' => 'INV_Producto_Nombre')) }}
          
          <span class="input-group-btn">
            <button class="add-value btn btn-success" type="button"><span class="glyphicon glyphicon-plus"></span></button>
          </span>
        </div>
        <ul class="list-group">
        
      </ul>
      </div>
      {{ Form::hidden('value-list-array', null, array('class' => 'value-list-array'))}}
    </div>

    <div class="form-group">
      <div class="col-md-5 ">
            {{ Form::submit('Aceptar', array('class' => 'btn btn-info')) }}
      </div>
    </div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.js"></script>
    {{ Form::close() }}
@stop




