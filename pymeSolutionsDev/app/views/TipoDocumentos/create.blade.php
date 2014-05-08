@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Tipo de Documento &gt; <small>Nuevo Tipo de Documento</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('CRM/TipoDocumentos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

{{ Form::open(array('route' => 'CRM.TipoDocumentos.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
	<div>
        <div class="form-group">
            {{ Form::label('CRM_TipoDocumento_Codigo', 'Validación:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-4">
                {{ Form::text('CRM_TipoDocumento_Codigo',null, array('class' => 'form-control' , 'id' => 'CRM_TipoDocumento_Codigo', 'placeholder' => 'PASS' ))}}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_TipoDocumento_Nombre', 'Nombre:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-4">
                {{ Form::text('CRM_TipoDocumento_Nombre',null, array('class' => 'form-control' , 'id' => 'CRM_TipoDocumento_Nombre', 'placeholder' => 'Pasaporte' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_TipoDocumento_Validacion', 'Validación:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-4">
                {{ Form::text('CRM_TipoDocumento_Validacion',null, array('class' => 'form-control' , 'id' => 'CRM_TipoDocumento_Validacion', 'placeholder' => 'XXX-XXX-L' ))}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-5 col-md-offset-2">
                
                <label class="checkbox-inline control-label">
                    {{ Form::checkbox('CRM_TipoDocumento_Flag', '1') }}
                    Empresa
                </label>
            </div>
        </div>

    </div>
    <div class="form-group">
      <div class="col-md-5">
      {{ Form::submit('Enviar', array('class' => 'btn btn-info')) }}
      </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


