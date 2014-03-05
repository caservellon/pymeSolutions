@extends('layouts.scaffold')

@section('main')
    
    <div class="row"> 
        
        <div class="col-md-3 col-md-offset-1">
            <h4>Campos por defecto</h4>
             <h5>Codigo del Proveedor</h5>
             <h5>Nombre del Proveedor</label>
             <h5>Codigo del Producto</h5>
             <h5>Nombre del Producto</h5>
             <h5>Cantidad del Producto</h5>
             <h5>Unidad de Medida</h5>
             <h5>Precio del producto</h5>
        </div>
        <div class="col-md-3 col-md-offset-1">   
             <h4 style="visibility: hidden">.</h4>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             
         </div>
        <br>
    </div>
    <div class="col-md-4 col-md-offset-1">
        <div class="row">
        <h4>Campos Locales</h4>
        @if($parametrizar->count())
            @foreach($parametrizar as $campolocal)
                <label>{{$campolocal->GEN_CampoLocal_Nombre}}</label>
                
                @if($campolocal->GEN_CampoLocal_Activo==1)
                    <h5 class="is-hidden">Activo</h5>
                @else
                    <h5 class="is-hidden">Inactivo</h5>
                @endif 
        @endforeach
        @endif
        </div>
    </div>
         <div class="col-md-4 col-md-offset-1">
             
             <div class="row">
                 <h4>Crear Campos Locales</h4>
             </div>
             {{ Form::open(array('route' => 'campoLocal'), array('class' => 'form-inline'), array('style' => 'width: 1000px')) }}
            <div class="row">
                
                <div class="col-md-1 col-md-offset-7">{{ Form::submit('Guardar', array('class' => 'btn btn-default btn-md')) }}</div>
            </div>
             
                 <div class="form-group">
                     {{ Form::label('GEN_CampoLocal_Nombre', 'Nombre') }}
                     {{ Form::text('GEN_CampoLocal_Nombre') }}
                 </div>
                 <div class="form-group">
                     
                     {{ Form::label('GEN_CampoLocal_Tipo', 'Tipo') }}
                     {{ Form::select('GEN_CampoLocal_Tipo', array('Numerico'=>'Numerico', 'Texto'=>'Texto', 'Float'=>'Float'));}}
                     
                 </div>
                 <div class="form-group">
                       {{ Form::checkbox('GEN_CampoLocal_Requerido') }}
                     {{ Form::label('GEN_CampoLocal_Requerido', 'Requerido') }}
                     <!--{{ Form::select('GEN_CampoLocal_Requerido', array('1' => 'Activado', '0' => 'Desactivado')) }}-->
            
                 </div>
                 <div class="form-group">
                     {{ Form::checkbox('GEN_CampoLocal_ParametroBusqueda') }}
                     {{ Form::label('GEN_CampoLocal_ParametroBusqueda', 'Parametro de Busqueda') }}
                     <!--{{ Form::select('GEN_CampoLocal_ParametroBusqueda', array('1' => 'Activado', '0' => 'Desactivado')) }}-->
                 </div>
                 <div class="form-group">
                     {{ Form::checkbox('GEN_CampoLocal_Activo') }}
                     {{ Form::label('GEN_CampoLocal_Activo', 'Activo') }}
                     <!--{{ Form::select('GEN_CampoLocal_Activo', array('1' => 'Activado', '0' => 'Inactivo')) }}-->
                
                  </div>
             {{ Form::close() }}


        </div>
       

    

   
                








<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>

@stop