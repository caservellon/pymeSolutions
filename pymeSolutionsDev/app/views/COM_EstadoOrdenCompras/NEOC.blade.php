@extends('layouts.scaffold')

@section('main')
    <div class="row">
      <div class="col-md-5 col-md-offset-1"><h2>Configuración <small>>Parametrizar>Estados Orden de Compra</small></h2></div>
    </div>

    <div class="row">
      <div class="col-md-3 col-md-offset-1"><h4>Estados por Defecto</h4>
          
         @foreach($data1 as $nombre)
         <h5>{{{ $nombre->COM_EstadoOrdenCompra_Nombre}}}</h5>
         @endforeach
      	
      </div>
       <div class="col-md-3 col-md-offset-1"><h4 Style="visibility:hidden">.</h4>
            @foreach($data1 as $nombre)
                @if($nombre->COM_EstadoOrdenCompra_Activo==0)
                <h5>No activo</h5>
                @else
                <h5>Activo</h5>
                @endif 
            @endforeach
      	
      </div>
      <br>
    </div>
 <div class="col-md-4 col-md-offset-1">
    <div class="row"> 
      	<h3>Estados Locales</h3>
    </div>
     <div class="col-md-5 col-md-offset-0" style="width:1000px">
        {{ Form::open(array('route' => 'AlmacenaEstadoOrdenCompra')) }}
        <ul>
            @foreach($errors->all() as $mensaje)
            <li class="alert alert-danger">{{$mensaje}}</li>
            @endforeach
        </ul>
	<ul>
            <li>
                {{ Form::label('COM_EstadoOrdenCompra_Nombre', 'Nombre:') }}
                {{ Form::text('COM_EstadoOrdenCompra_Nombre') }}
            </li>

            <li>
                {{ Form::label('COM_EstadoOrdenCompra_Observacion', 'Observacion:') }}
                {{ Form::textarea('COM_EstadoOrdenCompra_Observacion') }}
            </li>

            <li>
                {{ Form::label('COM_EstadoOrdenCompra_Activo', 'Activo:') }}
                {{ Form::checkbox('COM_EstadoOrdenCompra_Activo') }}
            </li>
            <li>
		{{ Form::submit('Crear', array('class' => 'btn btn-info')) }}
            </li>
        </ul>
        {{ Form::close() }}
     </div>
    
</div>
 @stop