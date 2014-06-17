<style type="text/css">
td {
	text-align: left;
}
</style>
<?php $empresa = Seguridad::Compania(); ?>
<div align="center">
	<h2>{{$empresa->SEG_Config_NombreEmpresa}}</h2>
	<h3>Estado de Resultados</h3>
	<h4 class="estado-date">Para el {{{$EstadoResultado->CON_EstadoResultados_FechaCreacion}}}</h4><br>
    <div class="table-responsive">
	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	          <th><h3><strong>Concepto</strong></h3></th>
	          <th><h3><strong><center>Total</center></strong></h3></th>
	        </tr>
	    </thead>
	    <tbody>
	      	<tr>
	      		<td>Ingreso por ventas</td>
	      		<td><center>{{{ $EstadoResultado->CON_EstadoResultados_Ingresos }}}</center></td>
	      	</tr>
	      	<tr>
	      		<td>Costo de los bienes vendidos</td>
	      		<td><center>{{{ $EstadoResultado->CON_EstadoResultados_CostoVentas }}}</center></td>
	      	</tr>
	      	<tr>
	      		<td><strong>Utilidad Bruta</strong></td>
	      		<td><center>{{{ $EstadoResultado->CON_EstadoResultados_UtilidadBruta }}}</center></td>
	      	</tr>
	      	<tr>
	      		<td>Gastos de Ventas</td>
	      		<td> <center>{{{ $EstadoResultado->CON_EstadoResultados_GastosdeVentas }}}</center></td>
	      	</tr>
	      	<tr>
	      		<td>Gastos Administrativos</td>
	      		<td><center>{{{ $EstadoResultado->CON_EstadoResultados_GastosAdministrativos }}}</center></td>
	      	</tr>
	      	<tr>
	      		<td><strong>Utilidad Operacional</strong></td>
	      		<td><center>{{{ $EstadoResultado->CON_EstadoResultados_UtilidadOperacion }}}</center></td>
	      	</tr>
	      	<tr>
	      		<td>Gasto Financiero</td>
	      		<td><center>{{{ $EstadoResultado->CON_EstadoResultados_GastoFinanciero }}}</center></td>
	      	</tr>
	      	<tr>
	      		<td><strong>Utilidad Antes de Impuesto</strong></td>
	      		<td><center>{{{ $EstadoResultado->CON_EstadoResultados_UtilidadAntesImpuesto }}}</center></td>
	      	</tr>
	      	<tr>
	      		<td>Impuesto Sobre la Renta</td>
	      		<td><center>{{{ $EstadoResultado->CON_EstadoResultados_Impuesto }}}</center></td>
	      	</tr>
	      	<tr>
	      		<td><strong>Utilidad Neta/Perdida Neta</strong></td>
	      		<td> <center>{{{ $EstadoResultado->CON_EstadoResultados_UtilidadPerdidaFinal }}}</center></td>
	      	</tr>
	    </tbody>
	</table>
	</div>
</div><!-- Site footer -->   