<style type="text/css">
td {
	text-align: left;
}
</style>

<div align="center">
	<h2>Empresa pymeERP</h2>
	<h3>Balance General</h3>
	<h4 class="balance-date">Para el {{{$BalanceGeneral->CON_BalanceGeneral_FechaCreacion }}}</h4><br>



	<table class="table table-striped table-bordered">
		<thead>
	        <tr>
	          <th style="align:left;"><h3><strong>Concepto</strong></h3></th>
	          <th><h3><strong><center>Total</center></strong></h3></th>
	        </tr>
	    </thead>
	<tbody>
		<tr>
					<td><strong>Total Activos Corrientes</strong></td>
					<td>{{{ $BalanceGeneral->CON_BalanceGeneral_TotalActivosC }}}</td>
		</tr>

		<tr>
					<td><strong>Total Activos No Corrientes</strong></td>
					<td>{{{ $BalanceGeneral->CON_BalanceGeneral_TotalActivosNC }}}</td>
		</tr>
		<tr>
					<td><strong>Total Pasivos Corrientes</strong></td>
					<td>{{{ $BalanceGeneral->CON_BalanceGeneral_TotalPasivosC }}}</td>
		</tr>
		<tr>
					<td><strong>Total Pasivos No Corrientes</strong></td>
					<td>{{{ $BalanceGeneral->CON_BalanceGeneral_TotalPasivosNC }}}</td>
		</tr>

		<tr>
					<td><strong>Capital Final</strong></td>
					<td>{{{ $BalanceGeneral->CON_BalanceGeneral_CapitalFinal }}}</td>
		</tr>	


	</tbody>
</table>
</div>