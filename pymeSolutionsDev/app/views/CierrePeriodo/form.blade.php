@extends ('layouts.scaffold')

@section ('main')
	
@if (sizeof($array)>0)
	<div class="page-header">
	<div class="row">
		<div class="col-sm-10">
			<h2>Seleccione un periodo contable</h2>
		</div>
		<div class="col-sm-2">
			<!--a href="{{URL::route('con.principal')}}" class="pull-right btn btn-sm btn-primary">
			<i class="glyphicon glyphicon-arrow-left"></i> Atras</a-->
		</div>
	</div>
	</div>

	{{Form::open(array(
		'method'=>'post',
		'route'=>'con.cierreperiodo',
		'class'=>'form-horizontal',
		'id'=>'form-cierre'))}}
		<div class="form-group"> 

			{{Form::label('periodo','Periodo Contable:',array('class'=>'control-label pull-left col-sm-2'))}}
			<div class="col-sm-4"> 
				@for ($i=0; $i<sizeof($array); $i++)
				<div class="radio"> 
					<label>
						{{Form::radio('periodo',$i,true)}}
						{{{$array[$i][0]->CON_ClasificacionPeriodo_Nombre }}}
						 -- 
						Fecha final: <font color="red">{{{date('Y-M-d',strtotime($array[$i][1]->CON_PeriodoContable_FechaFinal))}}}</font>
					</label>
				</div>	
				@endfor
					
			</div>
		</div>
		{{Form::submit('Aceptar',array('class'=>'btn btn-success'))}}

	{{Form::close()}}

@else
	<div align="center" class="well container col-md-8 col-md-offset-2" style="margin-top:5%">
		<h3>No hay periodos disponibles para cierre :(</h3>
		<a href="{{URL::route('con.principal')}}" class="btn btn-info">
		<i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
	</div>
@endif

@stop