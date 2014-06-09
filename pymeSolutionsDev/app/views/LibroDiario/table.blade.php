


@if ($LibroDiario!=array())
	<?php echo $Pages->links(); ?>
	<table class="table table-bordered table-responsive"> 
		<thead>
			<tr>
				<th>No. Asiento</th>
				<th>Fecha</th>
				<th>Detalle Cuenta</th>
				<th>Debe</th>
				<th>Haber</th>
				<th>Observaciones</th>
				<th>Reversion de Asiento</th>
			</tr>
		</thead>

		<tbody>
				<?php $flag=0; ?>
				@foreach ($LibroDiario as $Libro)
					<tr class="@if ($flag) {{'active'}} @endif" >	
						<td style="vertical-align:middle;" rowspan="2">{{{$Libro[0]['no']}}}</td>
						<td style="vertical-align:middle;" rowspan="2">{{{strstr($Libro[0]['fecha'],' ',true)}}}</td>
						<td><p class="pull-left">{{{$Libro[0]['cuenta']}}}</p></td>
						<td class="align-right">L. {{{$Libro[0]['monto']}}}</td>
	                  	<td></td>
	                  	<td style="vertical-align:middle;" rowspan="2">{{{ $Libro[0]['observacion'] }}}</td>
	                  	<td style="vertical-align:middle;" rowspan="2">
	                  	@if (Seguridad::RevertirAsientosContables())
	                  		@if ($Libro[0]['reversion']==1 || $Libro[0]['revertido']==1)
	                  			@else
	                  			<button class="btn btn-primary revertir" id="{{{$Libro[0]['no']}}}">Revertir</button>
	                  		@endif
	                  	@endif
	                  	</td>
					</tr>
					<tr class="@if ($flag) {{'active'}} @endif">
						
						
						<td>{{{$Libro[1]['cuenta']}}}</td>
						<td></td>
						<td class="align-right">L. {{{$Libro[1]['monto']}}}</td>
					
					</tr>
					<?php if($flag) $flag=0; else $flag=1; ?>
				@endforeach
		</tbody>
	</table>
	<?php echo $Pages->links(); ?>
@else
	<h4>No se encontraron asientos en el libro diario</h4>
@endif




	
