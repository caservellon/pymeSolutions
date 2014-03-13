@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Campo Local &gt; <small>Nuevo Campo Local</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('CampoLocals') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>


{{ Form::open(array('route' => 'CRM.CampoLocals.store', 'class' => 'form-horizontal', 'role' => 'form' )) }}
    <div class="form-group">
        {{ Form::label('GEN_CampoLocal_Nombre', 'Nombre:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('GEN_CampoLocal_Nombre', null, array('class' => 'form-control', 'id' => 'GEN_CampoLocal_Nombre')) }}
        </div>
    </div>

    <div class="form-group">
      {{ Form::label('Tipo_de_Perfil', 'Tipo de perfil:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('Tipo_de_Perfil', array('PS' => 'Persona', 'EP' => 'Empresa'),'PS',array('class' => 'col-md-4 form-control')) }}
      </div>
    </div>

    <div class="campo-local-tipo form-group">
      {{ Form::label('GEN_CampoLocal_Tipo', 'Tipo de Campo:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('GEN_CampoLocal_Tipo', array('TXT' => 'Texto', 'INT' => 'Entero', 'FLOAT' => 'Decimal', 'LIST' => 'Lista de Valores', 'CHKBOX' => 'Selección Multiple', 'RADIOBTN' => 'Selección Única'),'TXT',array('class' => 'col-md-4 form-control')) }}
      </div>
    </div>
    <div style="display:none;" class="value-list form-group">
      <input type="text" class="value-input form-control" placeholder="Valor">
      <button class="add-value btn btn-default">Agregar</button>
      <ul class="list-group">
        <li class="list-group-item">
        <span class="badge">14</span>
        Cras justo odio
        </li>
      </ul>
    </div>

    <div class="form-group">
      {{ Form::label('GEN_CampoLocal_Activo', 'Estado de Campo:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('GEN_CampoLocal_Activo', array('1' => 'Activado', '0' => 'Desactivado'),'1',array('class' => 'col-md-4 form-control')) }}
      </div>
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


