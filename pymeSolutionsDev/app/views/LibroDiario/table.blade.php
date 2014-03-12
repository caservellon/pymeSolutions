


@if(Request::ajax())
	<p><strong>Is ajax request </strong> </p>
@endif

@if ($LibroDiario!=null)
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th>Fecha</th>
				<th>Detalle Cuenta</th>
				<th>Debe</th>
				<th>Haber</th>
				<th>Observaciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($LibroDiario as $Libro)
				<tr>	
					<td>{{{$Libro[0]['no']}}}</td>
					<td>{{{strstr($Libro[0]['fecha'],' ',true)}}}</td>
					<td><p class="pull-left">{{{$Libro[0]['cuenta']}}}</p></td>
					<td>{{{$Libro[0]['monto']}}}</td>
                  	<td></td>
                  	<td>{{{ $Libro[0]['observacion'] }}}</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>{{{$Libro[1]['cuenta']}}}</td>
					<td></td>
					<td>{{{$Libro[0]['monto']}}}</td>
					<td></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	<h4>No se encontraron asientos en el libro diario</h4>
@endif