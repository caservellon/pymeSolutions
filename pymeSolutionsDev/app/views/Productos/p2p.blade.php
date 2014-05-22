@extends('layouts.scaffold')


@section('main')

 <div class="page-header clearfix">
      <h3 class="pull-left">Productos &gt; <small>Proveedor</small></h3>
      <div class="pull-right">
        <a href="/Inventario/CampoLocals" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

   {{ Form::open(array('route' => 'Productos.save', 'class' => 'form-horizontal', 'role' => 'form' )) }}
    <div class="form-group">
        {{ Form::label('INV_Producto_Nombre', 'Producto:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_Producto_Nombre', null, array('class' => 'form-control', 'id' => 'INV_Producto_Nombre')) }}
        </div>
    </div>

    <div class="value-list form-group">
      <label class="col-md-2 control-label">Proveedor:</label>
      <div class="col-md-5">
        <div class="input-group">
          <input type="text" class="value-input form-control">
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

    {{ Form::close() }} 
@stop




