@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Campo Local &gt; <small>Editar Campo Local</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('CampoLocals') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

{{ Form::model($CampoLocal, array('method' => 'PATCH', 'route' => array('CampoLocals.update', $CampoLocal->id)), 'class' => 'form-horizontal', 'role' => 'form' )) }}
    <div class="form-group">
        {{ Form::label('GEN_CampoLocal_Nombre', 'Nombre:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('GEN_CampoLocal_Nombre', null, array('class' => 'form-control', 'id' => 'GEN_CampoLocal_Nombre', 'placeholder'=>'CAJ-00001')) }}
        </div>
    </div>

    <div class="form-group">
      {{ Form::label('Tipo_de_Perfil', 'Tipo de perfil:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('Tipo_de_Perfil', array('PS' => 'Persona', 'EP' => 'Empresa'),'PS',array('class' => 'col-md-4 form-control')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('GEN_CampoLocal_Tipo', 'Tipo de Campo:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('GEN_CampoLocal_Tipo', array('TXT' => 'Texto', 'INT' => 'Entero', 'FLOAT' => 'Decimal', 'LIST' => 'Lista de Valores', 'CHKBOX' => 'Selección Multiple', 'RADIOBTN' => 'Selección Única'),'TXT',array('class' => 'col-md-4 form-control')) }}
      </div>
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


	<ul>
        <li>
            {{ Form::label('GEN_CampoLocal_ID', 'GEN_CampoLocal_ID:') }}
            {{ Form::text('GEN_CampoLocal_ID') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_Codigo', 'GEN_CampoLocal_Codigo:') }}
            {{ Form::text('GEN_CampoLocal_Codigo') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_Activo', 'GEN_CampoLocal_Activo:') }}
            {{ Form::text('GEN_CampoLocal_Activo') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_Nombre', 'GEN_CampoLocal_Nombre:') }}
            {{ Form::text('GEN_CampoLocal_Nombre') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_Tipo', 'GEN_CampoLocal_Tipo:') }}
            {{ Form::text('GEN_CampoLocal_Tipo') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_Requerido', 'GEN_CampoLocal_Requerido:') }}
            {{ Form::text('GEN_CampoLocal_Requerido') }}
        </li>

        <li>
            {{ Form::label('GEN_CampoLocal_ParametroBusqueda', 'GEN_CampoLocal_ParametroBusqueda:') }}
            {{ Form::text('GEN_CampoLocal_ParametroBusqueda') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('CampoLocals.show', 'Cancel', $CampoLocal->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
