@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Catalogo Contable &gt; <small>Nueva Cuenta</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('contabilidad/configuracion/catalogocuentas') }}}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
      </div>
</div>

@include('_messages.errors')

{{ Form::open(array('url' => 'contabilidad/configuracion/catalogocuentas', 'class'=>'form-horizontal')) }}

            <div class="form-group">
            {{ Form::label('CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID', 'Clasificacion de la Cuenta*:') }}
            <div class ="col-md-4">
            {{ Form::select('CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID', $clasi, $selected,array('id'=> 'prueba2')) }}
            </div>
            </div>

         {{ Form::hidden('CON_CatalogoContable_Codigo','999') }}
           
            

            <div class="form-group">
                {{ Form::label('CON_CatalogoContable_Nombre', 'Nombre de la Cuenta:*') }}
            <div class ="col-md-3">
                {{ Form::text('CON_CatalogoContable_Nombre','',array('maxlength'=>'120')) }}
            </div>
            </div>


             <div class="form-group">
                {{ Form::label('CON_CatalogoContable_NaturalezaSaldo', 'Naturaleza Saldo de la Cuenta:') }}
            <div class ="col-md-3">
                {{ Form::select('CON_CatalogoContable_NaturalezaSaldo', $naturaleza, $selected3) }}
            </div>
            </div>

            <div class="form-group">
                {{ Form::label('CON_CatalogoContable_Estado', 'Estado de la Cuenta:') }}
            <div class ="col-md-3">
                {{ Form::select('CON_CatalogoContable_Estado',$esta,$selected2) }}
            </div>
            </div>

            {{ Form::hidden('CON_CatalogoContable_UsuarioCreacion',Auth::user()->SEG_Usuarios_Username) }}
            {{ Form::hidden('CON_CatalogoContable_CodigoSubcuenta','00') }}
            
            <div class="col-md-4">
			{{ Form::submit('Agregar', array('class' => 'btn btn-success')) }}
            </div>

{{ Form::close() }}

@stop

@section('contabilidad_scripts')
    <script type="text/javascript">
$('#prueba2').on('change', function(){
var asd = $('#prueba2').val();
$('#prueba').attr("value",asd);
});
</script>


<script type="text/javascript">
    $(document).ready(function(){

        $("input").addClass("form-control");
        $("select").addClass("form-control");
        $("label").addClass("control-label col-md-4 pull-left");

    });

</script>
@stop