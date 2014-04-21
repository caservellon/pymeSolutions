@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Campo Local &gt; <small>Nuevo Campo Local</small></h3>
      <div class="pull-right">
        <a href="/Compras/CampoLocal" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="alert alert-danger">:message</li>')) }}
	</ul>
@endif

{{ Form::open(array('route' => 'Compras.CampoLocal.store', 'class' => 'form-horizontal', 'role' => 'form' )) }}
    <div class="form-group">
        {{ Form::label('GEN_CampoLocal_Nombre', 'Nombre:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('GEN_CampoLocal_Nombre', null, array('class' => 'form-control', 'id' => 'GEN_CampoLocal_Nombre')) }}
        </div>
    </div>

    <div class="form-group">
      {{ Form::label('Tipo_de_Perfil', 'Tipo de perfil:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('Tipo_de_Perfil', array('SC' => 'SolicitudCotizacion', 'COT' => 'Cotizacion', 'OC' => 'OrdenCompra'),'SC',array('class' => 'col-md-4 form-control')) }}
      </div>
    </div>

    <div class="campo-local-tipo form-group">
      {{ Form::label('GEN_CampoLocal_Tipo', 'Tipo de Campo:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('GEN_CampoLocal_Tipo', array('TXT' => 'Texto', 'INT' => 'Entero', 'FLOAT' => 'Decimal', 'LIST' => 'Lista de Valores'),'TXT',array('class' => 'col-md-4 form-control')) }}
      </div>
    </div>

    <div style="display:none;" class="value-list form-group">
      <label class="col-md-2 control-label">Agregar elementos:</label>
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
        <div class="col-md-5 col-md-offset-2">
            
            <label class="checkbox-inline control-label">
                {{ Form::checkbox('GEN_CampoLocal_Requerido', '1') }}
                Requerido
                
            </label>
            <label class="checkbox-inline control-label"> 
                {{ Form::checkbox('GEN_CampoLocal_ParametroBusqueda', '1') }}
                Parámetro de Busqueda 
            </label>
        </div>
    </div>

    <div class="form-group">
      <div class="col-md-5 ">
            {{ Form::submit('Aceptar', array('class' => 'btn btn-info')) }}
      </div>
    </div>


{{ Form::close() }}



@stop
