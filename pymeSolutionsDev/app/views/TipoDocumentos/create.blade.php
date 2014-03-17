@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Tipo de Documento &gt; <small>Nuevo Tipo de Documento</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('CRM/TipoDocumentos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

{{ Form::open(array('route' => 'CRM.TipoDocumentos.store')) }}
	<ul>
        <li>
            {{ Form::label('CRM_TipoDocumento_ID', 'CRM_TipoDocumento_ID:') }}
            {{ Form::text('CRM_TipoDocumento_ID') }}
        </li>

        <li>
            {{ Form::label('CRM_TipoDocumento_Codigo', 'CRM_TipoDocumento_Codigo:') }}
            {{ Form::text('CRM_TipoDocumento_Codigo') }}
        </li>

        <li>
            {{ Form::label('CRM_TipoDocumento_Nombre', 'CRM_TipoDocumento_Nombre:') }}
            {{ Form::text('CRM_TipoDocumento_Nombre') }}
        </li>

        <li>
            {{ Form::label('CRM_TipoDocumento_Validacion', 'CRM_TipoDocumento_Validacion:') }}
            {{ Form::text('CRM_TipoDocumento_Validacion') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


