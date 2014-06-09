@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Compañia &gt; <small>Editar Compañia</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Auth/Configuracion') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

@if ($errors->any())
 <div class="alert alert-danger fade in">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      @if($errors->count() > 1)
      <h4>Oh no! Se encontraron errores!</h4>
      @else
      <h4>Oh no! Se encontró un error!</h4>
      @endif
      <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
      </ul>
      
</div>
@endif

{{ Form::model($Config, array('method' => 'PATCH', 'route' => array('Auth.Configuracion.update', $Config->SEG_Config_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
        {{ Form::label('SEG_Config_NombreEmpresa', 'NombreEmpresa:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('SEG_Config_NombreEmpresa', $Config->SEG_Config_NombreEmpresa, array('class' => 'form-control', 'id' => 'SEG_Config_NombreEmpresa', 'placeholder'=>'Nombre', 'maxlength'=>'45')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('SEG_Config_Direccion', 'Direccion: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::textarea('SEG_Config_Direccion',$Config->SEG_Config_Direccion, array('class' => 'form-control', 'rows' => '3', 'id' => 'SEG_Config_Direccion', 'placeholder' => 'Direccion' , 'maxlength'=>'512')) }}
      </div>
    </div> 
    <div class="form-group">
        {{ Form::label('SEG_Config_Telefono', 'Telefono:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('SEG_Config_Telefono', $Config->SEG_Config_Telefono, array('class' => 'form-control', 'id' => 'SEG_Config_Telefono', 'placeholder'=>'(504)2222-1000', 'maxlength'=>'45')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('SEG_Config_Telefono2', 'Telefono(otro):', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('SEG_Config_Telefono2', $Config->SEG_Config_Telefono2, array('class' => 'form-control', 'id' => 'SEG_Config_NombreEmpresa', 'placeholder'=>'(504)2222-1000', 'maxlength'=>'45')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('SEG_Config_Dominio', 'Dominio:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('SEG_Config_Dominio', $Config->SEG_Config_Dominio, array('class' => 'form-control', 'id' => 'SEG_Config_Dominio', 'placeholder'=>'wwww.ejemplo.com', 'maxlength'=>'45')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('SEG_Config_EmailContacto', 'EmailContacto:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('SEG_Config_EmailContacto', $Config->SEG_Config_EmailContacto, array('class' => 'form-control', 'id' => 'SEG_Config_EmailContacto', 'placeholder'=>'ejemplo@ejemplo.com', 'maxlength'=>'45')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('SEG_Config_EmailCompras', 'EmailCompras:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('SEG_Config_EmailCompras', $Config->SEG_Config_EmailCompras, array('class' => 'form-control', 'id' => 'SEG_Config_EmailCompras', 'placeholder'=>'ejemplo@ejemplo.com', 'maxlength'=>'45')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('SEG_Config_EmailVentas', 'EmailVentas:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('SEG_Config_EmailVentas', $Config->SEG_Config_EmailVentas, array('class' => 'form-control', 'id' => 'SEG_Config_EmailVentas', 'placeholder'=>'ejemplo@ejemplo.com', 'maxlength'=>'45')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('SEG_Config_Descripcion', 'Descripcion:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::textarea('SEG_Config_Descripcion', $Config->SEG_Config_Descripcion, array('class' => 'form-control','rows' => '3', 'id' => 'SEG_Config_Descripcion', 'placeholder'=>'Descripcion', 'maxlength'=>'512')) }}
        </div>
    </div>
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Actualizar', array('class' => 'btn btn-info')) }}
      </div>
    </div>
    
{{ Form::close() }}

@stop