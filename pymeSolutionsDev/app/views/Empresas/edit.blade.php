@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Empresa &gt; <small>Editar Empresa</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Empresas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

{{ Form::model($Empresa, array('method' => 'PATCH', 'route' => array('Empresas.update', $Empresa->id))) }}
	<div class="form-group">
        <div class="form-group">
            {{ Form::label('CRM_Empresas_Nombre', 'Nombre de Empresa:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Empresas_Nombre',null, array('class' => 'form-control', 'id' => 'CRM_Empresas_Nombre', 'placeholder' => 'FICOHSA' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Empresas_Direccion', 'Dirección:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::textarea('CRM_Empresas_Direccion',null, array('class' => 'form-control', 'id' => 'CRM_Empresas_Direccion', 'placeholder' => 'Col. Humuya' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Empresas_Logo', 'Logo:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Empresas_Logo',null, array('class' => 'form-control', 'id' => 'CRM_Empresas_Logo', 'placeholder' => '#' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Empresas_Descuento', 'Descuento:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Empresas_Descuento',null, array('class' => 'form-control', 'id' => 'CRM_Empresas_Descuento', 'placeholder' => '#' )) }}
            </div>
        </div>
        
        <div class="form-group">
            {{ Form::label('CRM_Personas_CRM_Personas_ID', 'Persona:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_CRM_Personas_ID',null, array('class' => 'form-control', 'id' => 'CRM_Personas_CRM_Personas_ID', 'placeholder' => '#' )) }}
            </div>
        </div>

        <div class="col-md-5">
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            {{ link_to_route('Empresas.show', 'Cancel', $Empresa->CRM_Empresas_ID, array('class' => 'btn')) }}
        </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
