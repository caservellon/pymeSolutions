@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Persona &gt; <small>Editar Persona</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Personas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

{{ Form::model($Persona, array('method' => 'PATCH', 'route' => array('Personas.update', $Persona->CRM_Personas_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
        <div class="form-group">
            {{ Form::label('CRM_Personas_Nombres', 'Nombres', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Nombres',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Nombres', 'placeholder' => 'Daniel' )) }}
            </div>
        </div> 

        <div class="form-group">
            {{ Form::label('CRM_Personas_Apellidos', 'Apellidos:', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Apellidos',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Apellidos', 'placeholder' => 'Álvarez' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Personas_Direccion', 'Nombres', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::textarea('CRM_Personas_Direccion',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Direccion', 'placeholder' => 'Res. La Cañada, Casa #3021, Bloque H' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Personas_Email', 'Email', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Email',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Email', 'placeholder' => 'b@b.net' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Personas_Celular', 'Nombres', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Celular',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Celular', 'placeholder' => '95472014' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Personas_Fijo', 'Nombres', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Fijo',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Fijo', 'placeholder' => '22289452' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Personas_Descuento', 'Nombres', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Descuento',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Descuento', 'placeholder' => '##.##' )) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CRM_Personas_Foto', 'Nombres', array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-5">
                {{ Form::text('CRM_Personas_Foto',null, array('class' => 'form-control', 'id' => 'CRM_Personas_Foto', 'placeholder' => '#' )) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-5">
                {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
                {{ link_to_route('Personas.show', 'Cancel', $Persona->CRM_Personas_ID, array('class' => 'btn')) }}
            </div>
        </div>
	</div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
