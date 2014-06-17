
@if (count($Libro))
<?php $empresa = Seguridad::Compania(); ?>
<div align="center">
<h2>{{$empresa->SEG_Config_NombreEmpresa}}</h2>
	<h3>Libro Mayor</h3>
	<h4 class="date">Para el</h4><br>
</div>
@endif

<div class="row">
	@foreach ($Libro as $Cuenta)
	<div class="col-sm-6">
		<table class="table table-striped">
			<thead>
				<tr>
					<th colspan="2">{{{ $Cuenta->CON_CatalogoContable_Nombre }}}</th>
				</tr>
				<tr>
					<th>Debe</th>
					<th>Haber</th>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					@if ( $Cuenta->CON_CuentaT_AcreedorDeudor)
						<td></td>
						<td>{{{ $Cuenta->CON_CuentaT_SaldoFinal }}}</td>
					@else
						<td>{{{ $Cuenta->CON_CuentaT_SaldoFinal }}}</td>
						<td></td>
					@endif
				</tr>
			</tbody>
		</table>
	</div>
	@endforeach
</div>
