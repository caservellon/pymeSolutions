@extends('layouts.scaffold')

@section('main')
<br>
<br>
<br>
<br>
<a href="{{{ URL::to('Compras') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>Aceptar</a>

<div>
    
    <h4 class="is-hidden">
        {{{ $date->GEN_Mensajes_Mensaje}}}
    </h4>
  
</div>

@stop