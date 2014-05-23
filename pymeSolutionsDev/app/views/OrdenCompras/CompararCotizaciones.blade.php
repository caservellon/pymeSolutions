@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Crear Orden de Compra&gt;TablaComparativa<small></small></h3>
      <div class="pull-right">
        <a href="javascript:window.history.back();" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>
<div class="row">
   
    <div class=" col-lg-12">
			<div  class="col-md-9" >
                          
                                
                                
			</div>
			<div class="col-md-3">
			
			</div>
    </div>
    
	<div class="col-md-9" style="overflow:auto; height: 350px">
            <form action="" method=GET>
        
                
          <?php $cotizations =  $cotizaciones?>
              @foreach ($cotizaciones as $cotization)
                    <h4>{{$cotization->COM_Cotizacion_Codigo}}</h4>
                     <a href="{{ route('ComCot', array('id'=>$cotization->COM_Cotizacion_IdCotizacion)) }}" class="btn btn-info">Crear Orden de Compara para esta Cotizacion</a>
                      <?php $detalles= COM_DetalleCotizacion::where('COM_DetalleCotizacion_IdCotizacion', '=',$cotization->COM_Cotizacion_IdCotizacion)->get();
                                        
                                        ?>

                     <div class="table-responsive">
                    <table class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                               
                               
                                @foreach($detalles as $detalle)

                                <?php 
                                $producto=  Producto::find($detalle->COM_Producto_Id_Producto);?>
                                <th>{{$producto->INV_Producto_Nombre}}</th>
                                @endforeach

                            </tr>
                        </thead>
                        <tbody >
                            <tr>

                               

                                @foreach($detalles as $detalle)
                                <td>{{$detalle->COM_DetalleCotizacion_PrecioUnitario*$detalle->COM_DetalleCotizacion_Cantidad}}</td>
                                @endforeach

                            </tr> 
                        </tbody>
                    </table>
                </div>

              @endforeach
             
                
                  
        </div>
      
			</form>
</div>
@stop