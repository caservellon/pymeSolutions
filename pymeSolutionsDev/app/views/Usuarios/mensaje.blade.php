@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Alerta <small>Contraseña</small></h3>
</div>

<div class="alert alert-danger">
	<h4>Advertencia!</h4>
	<p>Su contraseña esta apunto de expirar, cambielo hoy:</p>
	<a href="/Auth/Cambio" class="btn btn-primary">Cambiar contraseña</a>
</div>

@stop