@extends('layouts.scaffold')

@section('main')
<h2 class="sub-header"></h2>
<div class="btn-agregar">
	<a type="button" href="" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span>Configuración <small>>Parametrizar>Estados Orden de Compra</small>
	</a>
</div>
<div c

     <div class="col-md-5 col-md-offset-0">
        <h3>Estados Locales</h3>
    </div>
        {{ Form::open(array('route' => 'AlmacenaTransicion')) }}
        
	<ul>
            <div class="table-responsive">
            <table class="table table-striped" >
              <thead>
                <tr>
                    <div class="form-group">
                        <th>Estado Anterior</th>
                        <th>Estado Actual</th>
                        <th>Estado Siguiente</th>
                    </div>
                </tr>
              </thead>
            
            <tbody>
                
            
            <tr>
                <td>
                      {{ Form::select('COM_OrdenCompra_TransicionEstado_EstadoPrevio' ,$Eanterior) }}
                 </td>

            
                <td>
                     {{ Form::label('Estado_Actual',$COM_EstadoOrdenCompra->COM_EstadoOrdenCompra_Nombre) }}
                     {{ Form::text('COM_OrdenCompra_TransicionEstado_EstadoActual',$COM_EstadoOrdenCompra->COM_EstadoOrdenCompra_IdEstadoOrdenCompra,array('style' => 'display:none')) }}
                  </td>

                <td>
                    {{ Form::select('COM_OrdenCompra_TransicionEstado_EstadoPosterior',$Esiguiente) }}
                 </td>
            </tr>
             </tbody>
            </table>
                <li>
                        {{ Form::label('observacion', 'Observacion:') }}
                        {{ Form::textarea('COM_OrdenCompra_TransicionEstado_Observacion') }}
                    </li>
                        {{ Form::submit('Crear', array('class' => 'btn btn-info')) }}
            
            
            </div>
            
        </ul>
        {{ Form::close() }}
     
    

@if ($errors->any())
        <ul>
            @foreach($errors->all() as $mensaje)
            <li class="alert alert-danger">{{$mensaje}}</li>
            @endforeach
        </ul>    
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop