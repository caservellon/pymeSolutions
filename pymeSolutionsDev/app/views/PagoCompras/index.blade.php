@extends('layouts.scaffold')


@section('main')
	<div class="page-header">
	<div class='row'>
		<div class='col-sm-10'>
			 <h3><i class='glyphicon glyphicon-list'></i> Lista de pagos </h3>
		</div>
		<div class="col-sm-2">
			<a href="{{URL::route('con.principal')}}" class="btn btn-primary">
				<i class="glyphicon glyphicon-back-arrow"></i> Atras
			</a>
		</div>
	</div>
	</div>

	<div>
		
		@foreach ($OrdenesPago as $key)
			<p> {{$key['idop']}}</p>
			<p> {{$key['total']}}</p>
		@endforeach
	</div>

@stop