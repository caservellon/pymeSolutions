@extends('layouts.scaffold')

@section('main')
    <h2 class="sub-header">Agregar Nuevo Estado Orden Compra</h2>
<div class="btn-agregar">
	<a type="button" href="" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span>Configuración <small>>Parametrizar>Estados Orden de Compra</small>
	</a>
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
            @if($errors->any())
        <div class="alert alert-danger">
              {{ implode('', $errors->all('<li >:message</li>')) }}
        </div>
        @endif
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
                {{ Form::checkbox('COM_EstadoOrdenCompra_Activo','1',true) }}
            </li>
            <li>
		{{ Form::submit('Crear', array('class' => 'btn btn-info')) }}
            </li>
        </ul>
        {{ Form::close() }}
     </div>
    
</div>
 @stop