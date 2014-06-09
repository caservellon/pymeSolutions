@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Catalogo Contable</small></h2>

<div class="pull-right">
    <a href="{{{ URL::to('contabilidad/configuracion') }}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
</div>
@if (isset($clasi) && $clasi->count())
@if(Seguridad::Agregarcuenta())
<div class="btn-agregar">
	<a type="button" href="{{ URL::to('contabilidad/configuracion/catalogocuentas/create') }}" class="btn btn-success">
	  <span class="glyphicon glyphicon-plus"></span> Agregar Cuenta
	</a>
</div>
@endif
@if(Seguridad::ListarSubcuentas())
<div class="btn-agregar">
	<a type="button" href="{{URL::to('contabilidad/configuracion/subcuentas')}}"  class="btn btn-success">
	  <span class="glyphicon glyphicon-list"></span> Listar Subcuenta
	</a>
</div>
@endif
@foreach ($clasi as $unidad)
				<tr>
					<h3>{{{ $unidad->CON_ClasificacionCuenta_Nombre }}}</h3>
				</tr>

				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Usuario Creacion</th>
							<th>Naturaleza Saldo</th>
							<th>Estado</th>
							@if(Seguridad::EditarCuenta())
							<th>Accion</th>
							@endif
						</tr>
					</thead>

					<tbody>
				@foreach ($Catalogo as $CatalogoContable)
				<tr>
					@if($CatalogoContable->CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID ==$unidad-> CON_ClasificacionCuenta_ID )	
					<td>{{{$unidad->CON_ClasificacionCuenta_Categoria}}}.{{{$unidad->CON_ClasificacionCuenta_Subcategoria}}}.{{{ $CatalogoContable->CON_CatalogoContable_Codigo }}}.{{{$CatalogoContable->CON_CatalogoContable_CodigoSubcuenta}}}</td>
					<td>{{{ $CatalogoContable->CON_CatalogoContable_Nombre }}}</td>
					<td>{{{ $CatalogoContable->CON_CatalogoContable_UsuarioCreacion }}}</td>
					@if ($CatalogoContable->CON_CatalogoContable_NaturalezaSaldo == 1)
					<td>Acreedor</td>
					@else
					<td>Deudor</td>
					@endif
					@if ($CatalogoContable->CON_CatalogoContable_Estado == 1)
					<td ><span class="glyphicon glyphicon-ok"></td>
					@else 
					<td><span class="glyphicon glyphicon-remove"></td>
					@endif
					@if ($CatalogoContable->CON_CatalogoContable_EnUso == 0 && Seguridad::EditarCuenta())
                    <td><a class="btn btn-info glyphicon glyphicon-pencil" href="{{ URL::to('contabilidad/configuracion/catalogocuentas/'.$CatalogoContable->CON_CatalogoContable_ID.'/edit') }}"> Editar</a></td>
                    @endif
				</tr>
				
				@endif
				@endforeach
		</tbody>
	</table>


@endforeach
@endif


@if (isset($Catalogo) && $Catalogo->count())
	
	
		
@else
	No hay Cuentas en el Catalogo Contable
@endif

<script>
function copyText()
{
	
	alert("$CatalogoContable->CON_CatalogoContable_id");
	
}
</script>

<script type="text/javascript">
	$('input[type=checkbox]').on('click', function() {
  	var id = $(this).attr('id');
  	var value=0;
	if($(this).attr('checked')=='checked'){
		value=1;
	}
	$.post("{{URL::to('catalogo-contable/cambiarestado')}}", {id: id,estado:value});
});



</script>

@stop