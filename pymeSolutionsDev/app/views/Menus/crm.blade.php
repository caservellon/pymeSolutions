@extends('layouts.scaffold')

@section('main')

<br>

<h1>Configuración Principal CRM</h1>

<br>

<div class="well" style="max-width: 400px; margin:10px;">
	@if(Seguridad::VerPersona())
    <a href="/CRM/Personas" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-user" ></span> Personas</a>
    @endif
	@if(Seguridad::VerEmpresa())
	<a href="/CRM/Empresas" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-film" ></span> Empresas</a>
    @endif
	@if(Seguridad::Configuracion())
	<a href="/CRM/CampoLocals" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-ok"></span> Campos Locales</a>
    <a href="/CRM/TipoDocumentos" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-list-alt" ></span> Tipos de Documentos</a>
    @endif
</div>


@stop


