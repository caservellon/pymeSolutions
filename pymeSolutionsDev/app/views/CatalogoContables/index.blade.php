@extends('layouts.scaffold')

@section('main')

<h1 align="center">Catalogo Contable</h1>

@if (isset($clasi) && $clasi->count())
<a class="btn btn-success" href="{{ URL::to('catalogo-contable/create') }}"> Crear Nuevo</a>
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
						
						</tr>
					</thead>

					<tbody>
				@foreach ($Catalogo as $CatalogoContable)
				<tr>
					@if($CatalogoContable->CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID ==$unidad-> CON_ClasificacionCuenta_ID )	
					<td>{{{$unidad->CON_ClasificacionCuenta_Codigo}}}-{{{ $CatalogoContable->CON_CatalogoContable_Codigo }}}</td>
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
                    <td><a class="btn btn-success" href="{{ URL::to('catalogo-contable/'.$CatalogoContable->CON_CatalogoContable_ID.'/edit') }}">Editar</a>


					</td>
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

<a class="btn btn-success" id="cambio" onclick ="copyText()"> Pues si<a>


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
<script type="text/javascript">
	function updatecampos(){
		@foreach ($Catalogo as $CatalogoContable)
			$this->update($CatalogoContable->CON_CatalogoContable_ID);
		@endforeach
	}
</script>
@stop