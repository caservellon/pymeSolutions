@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Catalogo Contable &gt; <small>Nueva Sub-Cuenta</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('contabilidad/configuracion/catalogocuentas') }}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
      </div>
</div>


@include('_messages.errors')

{{ Form::open(array('url' => 'contabilidad/configuracion/subcuentas','class'=>'form-horizontal')) }}
	
        <div class="form-group">
            {{ Form::label('CON_CatalogoContable_ID', 'Subcuenta de:') }}
        <div class = "col-md-4">
            {{ Form::select('CON_CatalogoContable_ID', $Catalogo, $selected) }}
        </div>
        </div>     

        <div class = "form-group"> 
            {{ Form::label('CON_Subcuenta_Codigo', 'Codigo:*') }}
            <div class = "col-md-4">
            {{ Form::text('CON_Subcuenta_Codigo') }}
        
        </div>
     </div>

            <div class = "form-group"> 
            {{ Form::label('CON_Subcuenta_Nombre', 'Nombre:*') }}
            <div class = "col-md-4">
            {{ Form::text('CON_Subcuenta_Nombre') }}
        </div>
        </div>

            <div class="col-md-4">
    
			{{ Form::submit('Agregar Sub-Cuenta', array('class' => 'btn btn-success form-control')) }}
	       </div>
	
{{ Form::close() }}


@stop
@section('contabilidad_scripts')
<script type="text/javascript">
    $(document).ready(function(){

        $("input").addClass("form-control");
        $("select").addClass("form-control");
        $("label").addClass("control-label col-md-4 pull-left");

    });

</script>

@stop


