
<div align="center">

<h2>{{{$config->SEG_Config_NombreEmpresa}}}</h2>
	<h3>Balanza Comprobacion</h3>
	<h4 class="date">Para el</h4><br>
</div>

<table class="table table-bordered table-striped">
	<thead>
		<th>Cuenta</th>
		<th>Deudor</th>
		<th>Acreedor</th>
	</thead>
	<tbody>
		<?php $deudor=0; $acreedor=0; ?>
		@foreach ($Cuentas as $Cuenta)
			<tr>
					<td>{{{ $Cuenta->CON_CatalogoContable_Nombre }}}</td>
					@if ( $Cuenta->CON_CuentaT_AcreedorDeudor)
						<td></td>
						<td>{{{ $Cuenta->CON_CuentaT_SaldoFinal }}}</td>
						<?php $acreedor+=$Cuenta->CON_CuentaT_SaldoFinal;  ?>
					@else
						<td>{{{ $Cuenta->CON_CuentaT_SaldoFinal }}}</td>
						<td></td>
						<?php $deudor+=$Cuenta->CON_CuentaT_SaldoFinal;  ?>
					@endif
			</tr>
			
		@endforeach
	</tbody>
	<tfoot>
		<tr class="@if ($deudor!=$acreedor) {{'danger'}} @else {{'success'}} @endif">
	      <td> <strong>Total</strong> </td>
	      <td>{{$deudor}}</td>
	      <td>{{$acreedor}}</td>
	    </tr>
	</tfoot>
</table>