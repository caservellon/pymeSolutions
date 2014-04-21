@extends('layouts.scaffold')

@section('main')
<h2 class="sub-header">Editar Nueva Estado Orden Compra</h2>
<div class="btn-agregar">
	<a type="button" href="" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span>Configuración <small>>Parametrizar>Estados Orden de Compra</small>
	</a>
</div>
    
    <div class="col-md-5 col-md-offset-0"> 
      	<h3>Estados Locales</h3>
    
     
         {{ Form::model($COM_EstadoOrdenCompra, array('method' => 'PATCH', 'route' => array('ActualizaEstadoOrdenCompra'))) }}
            <div class="col-md-0">
            {{ Form::text('COM_EstadoOrdenCompra_IdEstadoOrdenCompra',$COM_EstadoOrdenCompra->COM_EstadoOrdenCompra_IdEstadoOrdenCompra, array('style' => 'display:none')) }}
            </div>
            <div class="form-group">
                {{ Form::label('COM_EstadoOrdenCompra_Nombre', 'Nombre:') }}
            <div class="col-md-0">
            {{ Form::text('COM_EstadoOrdenCompra_Nombre') }}
            </div>
            </div>
            <div class="form-group">
                {{ Form::label('COM_EstadoOrdenCompra_Observacion', 'Observacion:') }}
            <div class="col-md-0">
                {{ Form::textarea('COM_EstadoOrdenCompra_Observacion') }}
            </div>
            </div>
            <div class="form-group">
            {{ Form::label('COM_EstadoOrdenCompra_Activo', 'Activo:') }}
            <div class="col-md-0">
            {{ Form::checkbox('COM_EstadoOrdenCompra_Activo','1',true) }}
            </div>
            </div>
                    <div class="form-group">
                        <div class="col-md-5">
			{{ Form::submit('Actualizar', array('class' => 'btn btn-info')) }}
                        </div>
                    </div>
{{ Form::close() }}
        <ul>
            @foreach($errors->all() as $mensaje)
            <li class="alert alert-danger">{{$mensaje}}</li>
            @endforeach
        </ul>

     </div>
    
</div>
    
    
        


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  
  </body>
</html>