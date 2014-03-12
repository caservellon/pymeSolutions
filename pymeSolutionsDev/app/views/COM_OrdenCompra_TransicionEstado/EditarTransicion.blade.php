@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header">Listado de Cajas</h2>
<div class="btn-agregar">
	<a type="button" href="" class="btn btn-default">
<div ><h2>Configuración <small>>Parametrizar>Estados Orden de Compra</small></h2></div>	</a>
</div>
   
    </div>
     <div class="col-md-5 col-md-offset-0" style="width:1000px">
         <h3>Estados Locales</h3>
        {{ Form::model($COM_OrdenCompra_TransicionEstado, array('method' => 'PATCH', 'route' => array('ActualizarTransicion'))) }} 
        <ul>
            @foreach($errors->all() as $mensaje)
            <li class="alert alert-danger">{{$mensaje}}</li>
            @endforeach
        </ul>
        {{ Form::text('COM_OrdenCompra_TransicionEstado_Id',$COM_OrdenCompra_TransicionEstado->COM_OrdenCompra_TransicionEstado_Id, array('style' => 'display:none')) }}
	<ul>
            <div class="table-responsive">
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th>Estado Anterior</th>
                  <th>Estado Actual</th>
                  <th>Estado Siguiente</th>
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
                    {{ Form::select('COM_OrdenCompra_TransicionEstado_EstadoPosterior',$Eanterior) }}
                </td>
                
             </tr>
              <td>
                 {{ Form::label('observacion', 'Observacion:') }}
                {{ Form::textarea('COM_OrdenCompra_TransicionEstado_Observacion') }}
            </td>
            <td>
		{{ Form::submit('Compras.Actualizar', array('class' => 'btn btn-info')) }}
            </td>
             </tbody>
             </table>
               
            
            </div>
            
        </ul>
        {{ Form::close() }}
     </div>
    
</div>
    
    
        
@stop