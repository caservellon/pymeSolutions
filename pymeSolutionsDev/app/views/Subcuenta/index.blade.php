@extends('layouts.scaffold')

@section('main')

<h1>Subcuentas</h1>


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
						<td>{{{$Clasi->CON_ClasificacionCuenta_Codigo}}}-{{{$Cuenta->CON_CatalogoContable_Codigo}}}-{{{$Subcuentum->CON_Subcuenta_Codigo}}}</td>
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
