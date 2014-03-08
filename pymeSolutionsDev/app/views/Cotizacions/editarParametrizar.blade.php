@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Configuracion &gt; <small>editar Parametrizar Cotizacion</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Compras/Cotizacions/parametrizar') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>atras</a>
      </div>
</div>
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
             </div>
          </div>
            @if($editar->count())
            
                <div class="table-responsive">
                <table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th>Requerido</th>
				<th>Parametro de Busqueda</th>
				<th>Activo</th>
				
			</tr>
		</thead>

		<tbody>
			@foreach ($editar as $editars)
				<tr>
					<td>{{{ $editars->GEN_CampoLocal_IdCampoLocal }}}</td>
					<td>{{{ $editars->GEN_CampoLocal_Codigo }}}</td>
					<td>{{{ $editars->GEN_CampoLocal_Nombre }}}</td>
					<td>{{{ $editars->GEN_CampoLocal_Tipo }}}</td>
					<td>{{{ $editars->GEN_CampoLocal_Requerido }}}</td>
					<td>{{{ $editars->GEN_CampoLocal_ParametroBusqueda }}}</td>
					<td>{{{ $editars->GEN_CampoLocal_Activo }}}</td>
					<td>{{ link_to_route('Compras.Cotizacions.edit', 'Editar', array($editars->GEN_CampoLocal_IdCampoLocal), array('class' => 'btn btn-info')) }}</td>

        
                                </tr>
                @endforeach
                
            
                </tbody> 
             </table>
          </div>
   
                










@endif

@stop