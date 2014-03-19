@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Persona &gt; <small>Crear Persona</small></h3>
      <div class="pull-right">
        <a href="/CRM/Personas" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

{{ Form::open(array('route' => 'CRM.Personas.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
	<div class="form-group">
        <div class="campo-local-tipo form-group">
          {{ Form::label('CRM_TipoDocumento_CRM_TipoDocumento_ID', 'Tipo de Documento:', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-5">
            {{ Form::select('CRM_TipoDocumento_CRM_TipoDocumento_ID', DB::table('CRM_TipoDocumento')->lists('CRM_TipoDocumento_Nombre','CRM_TipoDocumento_ID')) }}
          </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_codigo', 'Código:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_codigo',null, array('class' => 'form-control', 'id' => 'CRM_Personas_codigo', 'placeholder' => '###' )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Nombres', 'Nombre:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Nombres',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Nombres', 'placeholder' => 'Carlos' )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Apellidos', 'Apellido:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Apellidos',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Apellidos', 'placeholder' => 'Maldonado' )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Direccion', 'Dirección:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::textarea('CRM_Personas_Direccion',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Direccion', 'placeholder' => 'Res. Bella Oriente, Casa #2003, Bloque F' )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Email', 'Correo Electrónico:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Email',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Email', 'placeholder' => 'yasuri@yamileth.com' )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Celular', 'Celular:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Celular',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Celular', 'placeholder' => '98505193' )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Fijo', 'Teléfono Fijo:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Fijo',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Fijo', 'placeholder' => '22352142' )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Descuento', 'Descuento:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Descuento',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Descuento', 'placeholder' => '##' )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Foto', 'Foto:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Foto',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Foto', 'placeholder' => 'url' )) }}
            </div>
        </div> 
        
        @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','CRM_PS%')->get() as $campo)
            <div class="form-group">
                {{ Form::label($campo->GEN_CampoLocal_Codigo, $campo->GEN_CampoLocal_Nombre.":", array('class' => 'col-md-2 control-label')) }}
                @if ($campo->GEN_CampoLocal_Requerido)
                    <label>*</label>
                @endif
                <div class="col-md-5">
                    @if ($campo->GEN_CampoLocal_Tipo == 'TXT')
                        {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo, 'placeholder' => 'url' )) }}
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'INT')
                        {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo, 'placeholder' => 'url' )) }}
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'FLOAT')
                        {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo, 'placeholder' => 'url' )) }}
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'LIST')
                        {{ Form::select($campo->GEN_CampoLocal_Codigo, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_ID')) }}
                    @endif
                </div>
            </div> 
        @endforeach

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


