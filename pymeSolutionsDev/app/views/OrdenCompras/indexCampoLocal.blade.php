@extends('layouts.scaffold')

@section('main')
<h2 class="sub-header">Listado de Campos Locales</h2>
<div class="pull-right">
        <a href="{{{ URL::to('Compras') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('parametrizarOrden') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Campo Local
	</a>
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
					<td>{{{ $editars->GEN_CampoLocal_ID }}}</td>
					<td>{{{ $editars->GEN_CampoLocal_Codigo }}}</td>
					<td>{{{ $editars->GEN_CampoLocal_Nombre }}}</td>
					<td>{{{ $editars->GEN_CampoLocal_Tipo }}}</td>
					@if($editars->GEN_CampoLocal_Requerido == 1)
							<td><span class="glyphicon glyphicon-ok"></span></td>
						@else
							<td></td>
						@endif
					@if($editars->GEN_CampoLocal_ParametroBusqueda == 1)
							<td><span class="glyphicon glyphicon-ok"></span></td>
						@else
							<td></td>
						@endif	
					@if($editars->GEN_CampoLocal_Activo == 1)
							<td>Activo</td>
						@else
							<td>Inactivo</td>
						@endif	
					<td>{{ link_to_route('editarlista', 'Editar', array('id'=>$editars->GEN_CampoLocal_ID), array('class' => 'btn btn-info')) }}</td>

        
                                </tr>
                @endforeach
                
            
                </tbody> 
             </table>
          </div>
   
                










@endif
@if(!$editar->count())
	<div class="alert alert-danger">
      <strong>Oh no!</strong> No hay campos locales disponibles :(
    </div>
@endif
@stop