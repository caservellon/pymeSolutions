@extends('layouts.scaffold')

@section('main')

<br>

<h1>Configuración Principal CRM</h1>

<br>

<div class="well" style="max-width: 400px; margin:10px;">
	<a href="/CRM/CampoLocals" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-ok"></span> Campos Locales</a>
    <a href="/CRM/TipoDocumentos" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-list-alt" ></span> Tipos de Documentos</a>
    <a href="/CRM/Personas" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-user" ></span> Personas</a>
	<a href="/Empresas" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-film" ></span> Empresas</a>
</div>


@stop


