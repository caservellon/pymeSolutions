@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Crear Orden de Compra por Cotizacion<small></small></h3>
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
				
                                {{Form::open(array('route'=>'CompararCotizaciones'))}}
                                {{Form::submit('Comparar Cotizaciones',array('class'=>'btn btn-default btn-block col-md-6'))}}
			</div>
    </div>
	<div class="col-md-9" style="overflow:auto; height: 350px">
            <form action="" method=GET>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" >
              <thead>
                <tr>
                  <th>Comparar</th>
                  
                  <th># Cotizacion</th>
                  <th>Proveedor</th>
                  <th>Vigente Hasta</th>
                  <th>Estado</th>
                  
                </tr>
              </thead>
                  <tbody >
                      <?php $cotizaciones = Cotizacion::where('COM_Cotizacion_Activo','=',1)->get();
                            $contador=0;
                            ?>
                      @foreach($cotizaciones as $cotizacion)
                      <tr>
                           <td>{{Form::checkbox('comparar'.$contador,'1',false)}}</td>
                        <td>{{$cotizacion->COM_Cotizacion_Codigo}}
                            {{Form::text('id_cotizacion'.$contador,$cotizacion->COM_Cotizacion_IdCotizacion,array('style'=>'display:none'))}}
                        </td>
                        <?php $proveedor= Proveedor::find($cotizacion->COM_Proveedor_idProveedor);?>
                        <td>{{$proveedor->INV_Proveedor_Nombre}}</td>
                        <td>{{$cotizacion->COM_Cotizacion_Vigencia}}</td>
                        @if($cotizacion->COM_Cotizacion_Activo==1)
			<td>Vigente</td>
			@else
                        <td>Vencida</td>
                        @endif
                        
                      </tr> 
                      <?php $contador++; ?>
                      @endforeach
                        
              </tbody>
            </table>
          </div>
        </div>
      
		{{Form::close()}}
</div>
@stop