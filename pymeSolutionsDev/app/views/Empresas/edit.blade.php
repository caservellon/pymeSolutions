@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Empresa &gt; <small>Editar Empresa</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Empresas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

{{ Form::model($Empresa, array('method' => 'PATCH', 'route' => array('CRM.Empresas.update', $Empresa->CRM_Empresas_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
        <div class="form-group">
            {{ Form::label('CRM_Empresas_Nombre', 'Nombre de Empresa:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Empresas_Nombre',null, array('class' => 'form-control', 'id' => 'CRM_Empresas_Nombre', 'placeholder' => 'FICOHSA' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::hidden('CRM_Empresas_Codigo', 'Código:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::hidden('CRM_Empresas_Codigo',null, array('class' => 'form-control', 'id' => 'CRM_Empresas_Codigo', 'placeholder' => 'EMP-###' )) }}
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

        @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','CRM_EP%')->get() as $campo)
            <div class="campo-local-tipo form-group">
                {{ Form::label($campo->GEN_CampoLocal_Codigo, $campo->GEN_CampoLocal_Nombre.":", array('class' => 'col-md-2 control-label')) }}
                @if ($campo->GEN_CampoLocal_Requerido)
                    <label>*</label>
                @endif
                <div class="col-md-5">
                    @if ($campo->GEN_CampoLocal_Tipo == 'TXT' || $campo->GEN_CampoLocal_Tipo == 'INT' || $campo->GEN_CampoLocal_Tipo == 'FLOAT')
                        @if (DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Empresas_CRM_Empresas_ID',$Empresa->CRM_Empresas_ID)->count() > 0 )
                            {{ Form::text($campo->GEN_CampoLocal_Codigo,DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Empresas_CRM_Empresas_ID',$Empresa->CRM_Empresas_ID)->first()->CRM_ValorCampoLocal_Valor, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                        @else
                            {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                        @endif
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'LIST')
                        {{ Form::select($campo->GEN_CampoLocal_Codigo, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_ID')) }}
                    @endif
                </div>
            </div> 
        @endforeach

        <div class="col-md-5">
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            {{ link_to_route('CRM.Empresas.show', 'Cancel', $Empresa->CRM_Empresas_ID, array('class' => 'btn')) }}
        </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
