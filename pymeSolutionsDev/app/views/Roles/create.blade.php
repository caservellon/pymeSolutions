@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Roles &gt; <small>Crear Roles</small></h3>
      <div class="pull-right">
        <a href="/Seguridad" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atras</a>
      </div>
</div>

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

{{ Form::open(array('url' => 'Auth/Rol', 'class' => "form-horizontal" , 'role' => 'form')) }}
	<div class="">
  		{{ Form::label('SEG_Roles_Nombre', 'Nombre del Rol:', array('class' => 'col-md-2 control-label')) }}
  		<div class="col-md-5">
    		{{ Form::text('SEG_Roles_Nombre',null, array('class' => 'form-control', 'id' => 'SEG_Roles_Nombre', 'placeholder' => 'nombre' )) }}
  		</div>
	</div>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Asignar</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			<div>
				<br><br>
				CRM
			</div>
			@foreach ($columnas as $columna)
				@if (substr($columna,10,3) == "CRM")
				<tr>
					<td>
						<div >
				    		{{ Form::checkbox($columna) }}
    					</div>
					</td>
					<td>
						<div >
				        		{{ Form::label($columna, substr($columna,14), array('class' => '')) }}
			      		</div>
					</td>
				</tr>
				@endif
				@endforeach
		</tbody>
	</table>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Asignar</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			<div>
				<br><br>
				Ventas
			</div>
			@foreach ($columnas as $columna)
				@if (substr($columna,10,3) == "VEN")
				<tr>
					<td>
						<div >
				    		{{ Form::checkbox($columna) }}
    					</div>
					</td>
					<td>
						<div >
				        		{{ Form::label($columna, substr($columna,14)) }}
			      		</div>
					</td>
				</tr>
				@endif
				@endforeach
		</tbody>
	</table>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Asignar</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			<div>
				<br><br>
				Compras
			</div>
			@foreach ($columnas as $columna)
				@if (substr($columna,10,3) == "COM")
				<tr>
					<td>
						<div >
				    		{{ Form::checkbox($columna) }}
    					</div>
					</td>
					<td>
						<div >
				        		{{ Form::label($columna, substr($columna,14), array('class' => '')) }}
			      		</div>
					</td>
				</tr>
				@endif
				@endforeach
		</tbody>
	</table>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Asignar</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			<div>
				<br><br>
				Inventario
			</div>
			@foreach ($columnas as $columna)
				@if (substr($columna,10,3) == "INV")
				<tr>
					<td>
						<div >
				    		{{ Form::checkbox($columna) }}
    					</div>
					</td>
					<td>
						<div >
				        		{{ Form::label($columna, substr($columna,14), array('class' => '')) }}
			      		</div>
					</td>
				</tr>
				@endif
				@endforeach
		</tbody>
	</table>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Asignar</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			<div>
				<br><br>
				Contabilidad
			</div>
			@foreach ($columnas as $columna)
				@if (substr($columna,10,3) == "CON")
				<tr>
					<td>
						<div >
				    		{{ Form::checkbox($columna) }}
    					</div>
					</td>
					<td>
						<div >
				        		{{ Form::label($columna, substr($columna,14), array('class' => '')) }}
			      		</div>
					</td>
				</tr>
				@endif
				@endforeach
		</tbody>
	</table>

	<div class="form-group">
        <div class='col-md-3'>
			{{ Form::submit('Crear Rol', array('class' => 'btn btn-success')) }}
        </div>
	</div>

{{ Form::close() }}

@stop