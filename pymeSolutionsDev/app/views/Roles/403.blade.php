@extends('layouts.scaffold')

@section('main')

<div><h2>403 No permitido</h2>
<h5>No tiene permiso para ver este contenido.</h5>
<p>Contacte a su administrador para mas ayuda.</p>

<a href="{{ URL::previous() }}"><button class="btn btn-info">Regresar</button></a>
</div>



@stop