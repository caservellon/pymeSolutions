@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Persona &gt; <small>Editar Persona</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('CRM/Personas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
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

{{ Form::model($Persona, array('method' => 'PATCH', 'route' => array('CRM.Personas.update', $Persona->CRM_Personas_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
        <div class="form-group">
            <div class="col-md-7">
                {{ Form::submit('Actualizar', array('class' => 'btn btn-info','style' => 'float:right;')) }}
                {{ link_to_route('CRM.Personas.index', 'Cancelar', $Persona->CRM_Personas_ID, array('class' => 'btn','style' => 'float:right;')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::hidden('CRM_Personas_codigo', 'Código:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::hidden('CRM_Personas_codigo',null, array('class' => 'form-control', 'id' => 'CRM_Personas_codigo', 'placeholder' => '###', 'maxlength' => '16'  )) }}
            </div>
        </div>
        
        <div class="form-group">
            {{ Form::label('CRM_Personas_Nombres', 'Nombre:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Nombres',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Nombres', 'placeholder' => 'Daniel', 'maxlength' => '15'  )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Apellidos', 'Apellido:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Apellidos',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Apellidos', 'placeholder' => 'Álvarez', 'maxlength' => '15'  )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Personas_Direccion', 'Dirección:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::textarea('CRM_Personas_Direccion',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Direccion', 'placeholder' => 'Res. La Cañada, Casa #3021, Bloque H', 'maxlength' => '255'  )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Personas_Email', 'Email:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Email',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Email', 'placeholder' => 'b@b.net', 'maxlength' => '50'  )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Personas_Celular', 'Celular:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Celular',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Celular', 'placeholder' => '(504)9547-2014', 'maxlength' => '14'  )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Personas_Fijo', 'Teléfono:*', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Fijo',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Fijo', 'placeholder' => '(504)2228-9452', 'maxlength' => '14'  )) }}
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
                    @if ($campo->GEN_CampoLocal_Tipo == 'TXT' || $campo->GEN_CampoLocal_Tipo == 'INT' || $campo->GEN_CampoLocal_Tipo == 'FLOAT')
                        @if (DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Personas_CRM_Personas_ID',$Persona->CRM_Personas_ID)->count() > 0 )
                            {{ Form::text($campo->GEN_CampoLocal_Codigo,DB::table('CRM_ValorCampoLocal')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->where('CRM_Personas_CRM_Personas_ID',$Persona->CRM_Personas_ID)->first()->CRM_ValorCampoLocal_Valor, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                        @else
                            {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                        @endif
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'LIST')
                        {{ Form::select($campo->GEN_CampoLocal_Codigo, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_ID'),null,array('class' => 'col-md-4 form-control')) }}
                    @endif
                </div>
            </div> 
        @endforeach

        <!--<div class="form-group">
            <div class="col-md-5">
                {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
                {{ link_to_route('CRM.Personas.index', 'Cancel', $Persona->CRM_Personas_ID, array('class' => 'btn')) }}
            </div>
        </div>-->
        <div class="form-group">
            <div class="col-md-7">
                {{ Form::submit('Actualizar', array('class' => 'btn btn-info','style' => 'float:right;')) }}
                {{ link_to_route('CRM.Personas.index', 'Cancelar', $Persona->CRM_Personas_ID, array('class' => 'btn','style' => 'float:right;')) }}
            </div>
        </div>
	</div>
{{ Form::close() }}

@stop
