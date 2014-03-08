@extends('layouts.scaffold')

@section('main')

<a href="{{{ URL::to('Compras/Cotizacions/parametrizar') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>Aceptar</a>

<div>
    
    <h4 class="is-hidden">
        {{{ $date->GEN_Mensajes_Mensaje}}}
    </h4>
  
</div>

@stop