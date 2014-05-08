@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Crear Orden de Compra&gt;TablaComparativa<small></small></h3>
      <div class="pull-right">
        <a href="" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>
<div class="row">
   
    <div class=" col-lg-12">
			<div  class="col-md-9" >
                          
                                 <div class="col-xs-5 col-sm-6 col-md-12">
                                    <input type="Text"  style="width: 550px">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg" >
                                        <span class="glyphicon glyphicon-filter"></span>
                                    </button>
                                </div>
                                
			</div>
			<div class="col-md-3">
				<input type="button" value="Buscar" id="bpderecho" class="btn btn-default btn-block col-md-6" >
			</div>
    </div>
    
	<div class="col-md-9" style="overflow:auto; height: 350px">
            <form action="" method=GET>
        
                
          <?php $cotizations =  $cotizaciones?>
              @foreach ($cotizaciones as $cotization)
                    <h4>{{$cotization->COM_Cotizacion_Codigo}}</h4>
                     <a href="{{ route('ComCot', array('id'=>$cotization->COM_Cotizacion_IdCotizacion)) }}" class="btn btn-info">Crear Orden de Compara para esta Cotizacion</a>
                      <?php $detalles= COM_DetalleCotizacion::where('COM_DetalleCotizacion_IdCotizacion', '=',$cotization->COM_Cotizacion_IdCotizacion)->get();
                      /*DB::table('COM_DetalleCotizacion')->select('COM_DetalleCotizacion_IdDetalleCotizacion','COM_DetalleCotizacion_Codigo','COM_DetalleCotizacion_Cantidad','COM_DetalleCotizacion_PrecioUnitario','COM_DetalleCotizacion_IdCotizacion','COM_Producto_Id_Producto',
                                        'COM_Usuario_idUsuarioCreo','Usuario_idUsuarioModifico')->where('COM_DetalleCotizacion_IdCotizacion','=',$cotization->COM_Cotizacion_IdCotizacion)->get();*/
                                        
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

                                <!--<th>Coca Cola Lata</th>
                                <td>Lps. 450</td>
                                <td>lps. 500</td>
                                <td>lps. 100</td>
                                <td>lps. 600</td>-->

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