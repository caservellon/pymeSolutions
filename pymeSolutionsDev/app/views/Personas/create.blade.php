@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Persona &gt; <small>Crear Persona</small></h3>
      <div class="pull-right">
        <a href="/CRM/Personas" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
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

<div class="input-val">
    @foreach ( DB::table('CRM_TipoDocumento')->whereNull('CRM_TipoDocumento_Flag')->get() as $doc)
        {{ Form::hidden($doc->CRM_TipoDocumento_Validacion,null, array('id' => $doc->CRM_TipoDocumento_ID, 'name' => $doc->CRM_TipoDocumento_Validacion, 'data-val' => strlen($doc->CRM_TipoDocumento_Validacion))) }}
    @endforeach
</div>

{{ Form::open(array('route' => 'CRM.Personas.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
	<div class="form-group">
        <div class="campo-local-tipo form-group">
            <div class="col-md-7">
                {{ Form::submit('Agregar', array('class' => 'btn btn-info', 'style' => 'float:right;')) }}
            </div>
        </div>

        <div class="campo-local-tipo form-group">
          {{ Form::label('CRM_TipoDocumento_CRM_TipoDocumento_ID', 'Tipo de Documento:*', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-5">
            {{ Form::select('CRM_TipoDocumento_CRM_TipoDocumento_ID', DB::table('CRM_TipoDocumento')->whereNull('CRM_TipoDocumento_Flag')->lists('CRM_TipoDocumento_Nombre','CRM_TipoDocumento_ID'),null,array('class' => 'col-md-4 form-control')) }}
          </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_codigo', 'Código:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_codigo',null, array('class' => 'form-control', 'id' => 'CRM_Personas_codigo', 'placeholder' => 'Seleccione un documento.', 'maxlength' => '15' )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Nombres', 'Nombre:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Nombres',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Nombres', 'placeholder' => 'Carlos', 'maxlength' => '15'  )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Apellidos', 'Apellido:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Apellidos',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Apellidos', 'placeholder' => 'Maldonado', 'maxlength' => '15'  )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Direccion', 'Dirección:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::textarea('CRM_Personas_Direccion',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Direccion', 'placeholder' => 'Res. Bella Oriente, Casa #2003, Bloque F', 'maxlength' => '255'  )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Email', 'Correo Electrónico:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Email',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Email', 'placeholder' => 'yasuri@yamileth.com', 'maxlength' => '50'  )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Celular', 'Celular:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Celular',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Celular', 'placeholder' => '(504)9850-5193', 'maxlength' => '14'  )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Fijo', 'Teléfono Fijo:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Fijo',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Fijo', 'placeholder' => '(504)2235-2142', 'maxlength' => '14'  )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Descuento', 'Descuento:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Descuento',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Descuento', 'placeholder' => '.##', 'maxlength' => '4'  )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Foto', 'Foto:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Foto',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Foto', 'placeholder' => 'url' )) }}
            </div>
        </div> 
        
        @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','CRM_PS%')->get() as $campo)
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

		<div class="col-md-7">
            {{ Form::submit('Agregar', array('class' => 'btn btn-info', 'style' => 'float:right;')) }}
        </div>
        <!--<div class="col-md-5">
            {{ Form::submit('Aceptar', array('class' => 'btn btn-info')) }}
        </div>-->
	</div>
{{ Form::close() }}

@stop


