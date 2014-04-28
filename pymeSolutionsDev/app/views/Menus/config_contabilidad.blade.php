@extends('layouts.scaffold')

@section('main')

<br>
<h1><i class="glyphicon glyphicon-cog"></i> Configuracion contabilidad</h1>
<a class="btn btn-primary pull-right" href="{{URL::to('contabilidad')}}">Atras</a>
<br>

<div class="well"  style="max-width: 400px; margin:10px; background-color:;">
	<a href="{{URL::to('contabilidad/configuracion/catalogocuentas')}}" class="btn btn-default btn-lg btn-block">
		<span class="glyphicon glyphicon-list-alt"></span><br> Catalogo de Cuentas</a>
	<a href="{{URL::to('contabilidad/configuracion/periodocontable')}}" class="btn btn-default btn-lg btn-block">
		<span class="glyphicon glyphicon-calendar"></span><br> Configuracion Periodo Contable</a>
	<a href="{{URL::to('contabilidad/configuracion/unidadmonetaria')}}" class="btn btn-default btn-lg btn-block">
		<span class="glyphicon glyphicon-usd"></span><br> Unidad Monetaria</a>
</div>
<br>

@stop