@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Empresa &gt; <small>Crear Empresa</small></h3>
      <div class="pull-right">
        <a href="/Empresas" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

{{ Form::open(array('route' => 'Empresas.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
	<div class="form-group">
        <div class="campo-local-tipo form-group">
          {{ Form::label('CRM_TipoDocumento_CRM_TipoDocumento_ID', 'Tipo de Documento:', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-5">
            {{ Form::select('CRM_TipoDocumento_CRM_TipoDocumento_ID', DB::table('CRM_TipoDocumento')->lists('CRM_TipoDocumento_Nombre','CRM_TipoDocumento_ID')) }}
          </div>
        </div> 
        
        <div class="form-group">
            {{ Form::label('CRM_Empresas_Codigo', 'Código:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Empresas_Codigo',null, array('class' => 'form-control', 'id' => 'CRM_Empresas_Codigo', 'placeholder' => 'EMP-###' )) }}
            </div>
        </div>

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
        
        <div class="campo-local-tipo form-group">
          {{ Form::label('CRM_Personas_CRM_Personas_ID', 'Personas: ', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-5">
            {{ Form::select('CRM_Personas_CRM_Personas_ID', DB::table('CRM_Personas')->lists('CRM_Personas_Nombres','CRM_Personas_ID')) }}
          </div>
        </div> 

		<div class="col-md-5">
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
        </div>
	</div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


