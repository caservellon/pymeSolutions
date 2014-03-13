@extends('layouts.scaffold')

@section('main')
<h2 class="sub-header">Nueva Transicion Estado Orden Compra</h2>
<div class="btn-agregar">
	<a type="button" href="" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span>Configuración <small>>Parametrizar>Transicion de Estados Orden de Compra</small>
	</a>
</div>
<div c

     <div class="col-md-12 col-md-offset-0">
        <h3>Estados Locales</h3>
             @if ($errors->any())
        <ul>
            @foreach($errors->all() as $mensaje)
            <li class="alert alert-danger">{{$mensaje}}</li>
            @endforeach
        </ul>    
@endif
    </div>
        {{ Form::open(array('route' => 'AlmacenaTransicion')) }}
   
	<ul>
            <div class="table-responsive">
                
            <table class="table table-striped" >
              <thead>
                <tr>
                    <div class="form-group">
                        <th>Estado Previo</th>
                        <th>Estado Actual</th>
                        <th>Estado Posterior</th>
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
                <td>
                    {{ Form::label('observacion', 'Observacion:') }}
                    {{ Form::textarea('COM_OrdenCompra_TransicionEstado_Observacion') }}
                </td>
                <td>
                    {{ Form::label('COM_OrdenCompra_TransicionEstado_Activo', 'Activo:') }}
                    {{ Form::checkbox('COM_OrdenCompra_TransicionEstado_Activo','1',true) }}
                </td>
                <td>
                    {{ Form::submit('Crear', array('class' => 'btn btn-info')) }}
                </td>
          
            </tbody>
            </table>
            
            
            </div>
            
        </ul>
        {{ Form::close() }}
@stop