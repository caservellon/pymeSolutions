@extends('layouts.layout')

@section('main')

<h1 align="center">Catalogo Contable</h1>


@if (isset($Catalogo) && $Catalogo->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Usuario Creacion</th>
				<th>Naturaleza Saldo</th>
				<th>Estado</th>
				<th>Clasificacion de la Cuenta</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Catalogo as $CatalogoContable)
				<tr>
					<td>{{{ $CatalogoContable->CON_CatalogoContable_ID }}}</td>
					<td>{{{ $CatalogoContable->CON_CatalogoContable_Codigo }}}</td>
					<td>{{{ $CatalogoContable->CON_CatalogoContable_Nombre }}}</td>
					<td>{{{ $CatalogoContable->CON_CatalogoContable_UsuarioCreacion }}}</td>
					@if ($CatalogoContable->CON_CatalogoContable_NaturalezaSaldo == 1)
					<td>Acreedor</td>
					@else
					<td>Deudor</td>
					@endif
					@if ($CatalogoContable->CON_CatalogoContable_Estado == 1)
					<td ><input id="{{{ $CatalogoContable->CON_CatalogoContable_ID }}}" type="checkbox" checked></td>
					@else 
					<td><input id="{{{ $CatalogoContable->CON_CatalogoContable_ID }}}" type="checkbox" ></td>
					@endif
					<td>{{{ $CatalogoContable->CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID }}}</td>
                    <td><a class="btn btn-success" href="{{ URL::to('catalogo-contable/'.$CatalogoContable->CON_CatalogoContable_ID.'/edit') }}">Edit</a>


					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	No hay Cuentas en el Catalogo Contable
@endif
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