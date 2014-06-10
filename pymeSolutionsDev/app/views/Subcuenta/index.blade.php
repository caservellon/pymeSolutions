@extends('layouts.scaffold')

@section('main')

<h1>Subcuentas > <small> Listar</small></h1>
<div class="btn-agregar">
@if(Seguridad::AgregarSubcuentas())
    <a type="button" href="{{URL::to('contabilidad/configuracion/subcuentas/create')}}"  class="btn btn-success">
      <span class="glyphicon glyphicon-plus"></span> Agregar Sub-Cuenta
    </a>
@endif
	<div class="pull-right">
		<a class='btn btn-sm btn-primary pull-right ' href="{{URL::to('contabilidad/configuracion/catalogocuentas')}}">
    	<i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
	</div>
    
</div>


@if ($Subcuenta->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Cuenta Padre</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Subcuenta as $Subcuentum)
				<tr>
					@foreach($Catalogo as $Cuenta)
					@foreach($Clasificacion as $Clasi)
						@if($Cuenta->CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID == $Clasi->CON_ClasificacionCuenta_ID && $Subcuentum->CON_CatalogoContable_ID == $Cuenta->CON_CatalogoContable_ID)
							<td>{{{$Clasi->CON_ClasificacionCuenta_Categoria}}}.{{{$Clasi->CON_ClasificacionCuenta_Subcategoria}}}.{{{ $Cuenta->CON_CatalogoContable_Codigo }}}.{{{$Subcuentum->CON_Subcuenta_Codigo}}}</td>
						@endif
					@endforeach
					@endforeach
					<td>{{{ $Subcuentum->CON_Subcuenta_Nombre }}}</td>
					@foreach($Catalogo as $Cuenta)
						@if($Cuenta->CON_CatalogoContable_ID == $Subcuentum->CON_CatalogoContable_ID)
							<td>{{{$Cuenta->CON_CatalogoContable_Nombre}}}</td>
						@endif
					@endforeach
					
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no Subcuenta
@endif

@stop
