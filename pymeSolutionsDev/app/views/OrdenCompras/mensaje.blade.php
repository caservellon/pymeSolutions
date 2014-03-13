@extends('layouts.scaffold')

@section('main')
<br>
<br>
<br>
<br>
<a href="{{{ URL::to('Compras/Configuracion/OrdenCompra') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok"></span></a>

<div>
    
    <h4 class="is-hidden">
        {{{ $date->GEN_Mensajes_Mensaje}}}
    </h4>
  
</div>

@stop