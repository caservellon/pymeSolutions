@extends('layouts.scaffold')

@section('main')


<div class="page-header clearfix">
      <h3 class="pull-left">Tipo de Documento &gt; <small>Editar Tipo</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('CRM/TipoDocumentos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
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

{{ Form::model($TipoDocumento, array('method' => 'PATCH', 'route' => array('CRM.TipoDocumentos.update', $TipoDocumento->CRM_TipoDocumento_ID), 'class' => 'form-horizontal', 'role' => 'form' )) }}
	<div>
        <div class="form-group">
            {{ Form::label('CRM_TipoDocumento_Codigo', 'Validación:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-4">
                {{ Form::text('CRM_TipoDocumento_Codigo',$TipoDocumento->CRM_TipoDocumento_Codigo, array('class' => 'form-control' , 'id' => 'CRM_TipoDocumento_Codigo', 'placeholder' => 'PASS' ))}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_TipoDocumento_Nombre', 'Nombre:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-4">
                {{ Form::text('CRM_TipoDocumento_Nombre',$TipoDocumento->CRM_TipoDocumento_Nombre, array('class' => 'form-control' , 'id' => 'CRM_TipoDocumento_Nombre', 'placeholder' => 'Pasaporte' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_TipoDocumento_Validacion', 'Validación:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-4">
                {{ Form::text('CRM_TipoDocumento_Validacion',$TipoDocumento->CRM_TipoDocumento_Validacion, array('class' => 'form-control' , 'id' => 'CRM_TipoDocumento_Validacion', 'placeholder' => 'XXX-XXX-L' ))}}
            </div>
        </div>


    </div>
    <div class="form-group">
      <div class="col-md-5">
      {{ Form::submit('Enviar', array('class' => 'btn btn-info')) }}
      </div>
    </div>
{{ Form::close() }}



@stop
