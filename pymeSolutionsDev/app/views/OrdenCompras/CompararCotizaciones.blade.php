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
        <div class="table-responsive">
            <table class="table table-striped table-bordered" >
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Cotizacion-00001</th>
                  <th>Cotizacion-00002</th>
                  <th>Cotizacion-00003</th>
                  <th>Cotizacion-00004</th>
		 
                </tr>
              </thead>
                  <tbody >
                      <tr>
                           <td>Coca Cola Lata</td>
                        <td>Lps. 450</td>
                        <td>lps. 500</td>
                        <td>lps. 100</td>
			<td>lps. 600</td>
			
                      </tr> 
                       <tr>
                           <td>Coca Cola Lata</td>
                        <td>Lps. 450</td>
                        <td>lps. 500</td>
                        <td>lps. 100</td>
			<td>lps. 600</td>
			
                      </tr> 
                       <tr>
                           <td>Coca Cola Lata</td>
                        <td>Lps. 450</td>
                        <td>lps. 500</td>
                        <td>lps. 100</td>
			<td>lps. 600</td>
			
                      </tr> 
                       <tr>
                           <td>Coca Cola Lata</td>
                        <td>Lps. 450</td>
                        <td>lps. 500</td>
                        <td>lps. 100</td>
			<td>lps. 600</td>
			
                      </tr> 
                       <tr>
                           <td>Coca Cola Lata</td>
                        <td>Lps. 450</td>
                        <td>lps. 500</td>
                        <td>lps. 100</td>
			<td>lps. 600</td>
			
                      </tr> 
                       <tr>
                           <td>Coca Cola Lata</td>
                        <td>Lps. 450</td>
                        <td>lps. 500</td>
                        <td>lps. 100</td>
			<td>lps. 600</td>
			
                      </tr> 
                       <tr>
                           <td>Coca Cola Lata</td>
                        <td>Lps. 450</td>
                        <td>lps. 500</td>
                        <td>lps. 100</td>
			<td>lps. 600</td>
			
                      </tr> 
                       <tr>
                           <td>Coca Cola Lata</td>
                        <td>Lps. 450</td>
                        <td>lps. 500</td>
                        <td>lps. 100</td>
			<td>lps. 600</td>
			
                      </tr> 
                       <tr>
                           <td>Coca Cola Lata</td>
                        <td>Lps. 450</td>
                        <td>lps. 500</td>
                        <td>lps. 100</td>
			<td>lps. 600</td>
			
                      </tr> 
                       <tr>
                           <td>Coca Cola Lata</td>
                        <td>Lps. 450</td>
                        <td>lps. 500</td>
                        <td>lps. 100</td>
			<td>lps. 600</td>
			
                      </tr> 
              </tbody>
            </table>
          </div>
        </div>
      
			</form>
</div>
@stop