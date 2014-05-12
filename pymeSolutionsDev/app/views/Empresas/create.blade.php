@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Empresa &gt; <small>Crear Empresa</small></h3>
      <div class="pull-right">
        <a href="/CRM/Empresas" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
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

{{ Form::open(array('route' => 'CRM.Empresas.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
	<div class="form-group">

        <div class="campo-local-tipo form-group">
            <div class="col-md-7">
                {{ Form::submit('Agregar', array('class' => 'btn btn-info', 'style' => 'float:right;')) }}
            </div>
        </div>

        <div class="campo-local-tipo form-group">
          {{ Form::label('CRM_TipoDocumento_CRM_TipoDocumento_ID', 'Tipo de Documento:*', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-5">
            {{ Form::select('CRM_TipoDocumento_CRM_TipoDocumento_ID', DB::table('CRM_TipoDocumento')->where('CRM_TipoDocumento_Flag','1')->lists('CRM_TipoDocumento_Validacion','CRM_TipoDocumento_ID'),null,array('class' => 'col-md-4 form-control')) }}
          </div>
        </div> 
        
        <div class="form-group">
            {{ Form::label('CRM_Empresas_Codigo', 'Código:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Empresas_Codigo',null, array('class' => 'form-control', 'id' => 'CRM_Empresas_Codigo', 'placeholder' => 'Seleccione un documento.', 'maxlength' => '16'  )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Empresas_Nombre', 'Nombre de Empresa:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Empresas_Nombre',null, array('class' => 'form-control', 'id' => 'CRM_Empresas_Nombre', 'placeholder' => 'FICOHSA', 'maxlength' => '15'  )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Empresas_Direccion', 'Dirección:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::textarea('CRM_Empresas_Direccion',null, array('class' => 'form-control', 'id' => 'CRM_Empresas_Direccion', 'placeholder' => 'Col. Humuya', 'maxlength' => '255'  )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Empresas_Logo', 'Logo:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Empresas_Logo',null, array('class' => 'form-control', 'id' => 'CRM_Empresas_Logo', 'placeholder' => 'url' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Empresas_Descuento', 'Descuento:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Empresas_Descuento',null, array('class' => 'form-control', 'id' => 'CRM_Empresas_Descuento', 'placeholder' => '.##', 'maxlength' => '4'  )) }}
            </div>
        </div>
        
        <div class="campo-local-tipo form-group">
          {{ Form::label('CRM_Personas_CRM_Personas_ID', 'Contacto:*', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-5">
            {{ Form::select('CRM_Personas_CRM_Personas_ID', DB::table('CRM_Personas')->whereNull('CRM_Personas_Eliminado')->lists('CRM_Personas_Nombres','CRM_Personas_ID'),null,array('class' => 'col-md-4 form-control')) }}
          </div>
        </div> 
        
        @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','CRM_EP%')->get() as $campo)
            <div class="campo-local-tipo form-group">
                @if ($campo->GEN_CampoLocal_Requerido)
                    {{ Form::label($campo->GEN_CampoLocal_Codigo, $campo->GEN_CampoLocal_Nombre.":*", array('class' => 'col-md-2 control-label')) }}
                @else
                    {{ Form::label($campo->GEN_CampoLocal_Codigo, $campo->GEN_CampoLocal_Nombre.":", array('class' => 'col-md-2 control-label')) }}
                @endif
                <div class="col-md-5">
                    @if ($campo->GEN_CampoLocal_Tipo == 'TXT')
                        {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'INT')
                        {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'FLOAT')
                        {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'LIST')
                        {{ Form::select($campo->GEN_CampoLocal_Codigo, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_ID'),null,array('class' => 'col-md-4 form-control')) }}
                    @endif
                </div>
            </div> 
        @endforeach

		<!--<div class="col-md-5">
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
        </div>-->
        <div class="campo-local-tipo form-group">
            <div class="col-md-7">
                {{ Form::submit('Agregar', array('class' => 'btn btn-info', 'style' => 'float: right;')) }}
            </div>
        </div>
	</div>
{{ Form::close() }}

@stop


