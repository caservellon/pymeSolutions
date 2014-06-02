@extends('layouts.scaffold')

@section('main')

<div class='page-header clearfix'>
<h2>Concepto Motivo> <small>Listar</small>
    <a class='btn btn-sm btn-primary pull-right ' href="{{URL::to('contabilidad/configuracion')}}">
    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a></h2>    
</div>


@if ($ConceptoMotivos->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nombre del Concepto</th>
				<th>Motivo Transaccion</th>
				<th>Accion</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($ConceptoMotivos as $ConceptoMotivo)
				<tr>
					<td>{{{ $ConceptoMotivo->CON_ConceptoMotivo_Concepto }}}</td>
					@foreach ($Moti as $M)
						@if($ConceptoMotivo->CON_MotivoTransaccion_ID == $M->CON_MotivoTransaccion_ID)
						<td>{{{ $M->CON_MotivoTransaccion_Descripcion }}}</td>
						@endif
					@endforeach
					<td><a class="btn btn-success" href="{{URL::to('contabilidad/conceptomotivo/'.$ConceptoMotivo->CON_ConceptoMotivo_ID.'/edit')}}">Editar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Losiento no ha creado Conceptos! :(
@endif

@stop
