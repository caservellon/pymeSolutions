@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Descuento &gt; <small>Editar Descuento</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Ventas/Descuentos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

@if ($errors->any())
<div class="alert alert-danger fade in">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      @if($errors->count() > 1)
      <h4>Oh no! Se encontraron errores!</h4>
      @else
      <h4>Oh no! Se encontró un error!</h4>
      @endif
      <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
      </ul>
      
</div>
@endif
{{ Form::model($Descuento, array('method' => 'PATCH', 'route' => array('Ventas.Descuentos.update', $Descuento->VEN_DescuentoEspecial_id), 'class' => 'form-horizontal', 'role' => 'form')) }}
	
    <div class="form-group">
        {{ Form::label('VEN_DescuentoEspecial_Codigo', 'Código:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_DescuentoEspecial_Codigo', $Descuento->VEN_DescuentoEspecial_Codigo, array('class' => 'form-control', 'id' => 'VEN_DescuentoEspecial_Codigo', 'placeholder'=>'DES-00001')) }}
        </div>
    </div>

     <div class="form-group">
        {{ Form::label('VEN_DescuentoEspecial_Nombre', 'Nombre:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_DescuentoEspecial_Nombre', $Descuento->VEN_DescuentoEspecial_Nombre, array('class' => 'form-control', 'id' => 'VEN_DescuentoEspecial_Nombre', 'placeholder'=>'3era Edad')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('VEN_DescuentoEspecial_Valor', 'Valor:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_DescuentoEspecial_Valor', $Descuento->VEN_DescuentoEspecial_Valor, array('class' => 'form-control', 'id' => 'VEN_DescuentoEspecial_Valor', 'placeholder'=>'3era Edad')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('VEN_DescuentoEspecial_FechaInicio', 'Fecha Inicio:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_DescuentoEspecial_FechaInicio', $Descuento->VEN_DescuentoEspecial_FechaInicio, array('class' => 'form-control', 'id' => 'VEN_DescuentoEspecial_FechaInicio', 'placeholder'=>'3era Edad')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('VEN_DescuentoEspecial_FechaFinal', 'Fecha Final:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_DescuentoEspecial_FechaFinal', $Descuento->VEN_DescuentoEspecial_FechaFinal, array('class' => 'form-control', 'id' => 'VEN_DescuentoEspecial_FechaFinal', 'placeholder'=>'3era Edad')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('VEN_DescuentoEspecial_Precedencia', 'Precedencia:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_DescuentoEspecial_Precedencia', $Descuento->VEN_DescuentoEspecial_Precedencia, array('class' => 'form-control', 'id' => 'VEN_DescuentoEspecial_Precedencia', 'placeholder'=>'3era Edad')) }}
        </div>
    </div>

    <div class="form-group">
          {{ Form::label('VEN_DescuentoEspecial_Estado', 'Estado de Descuento:', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-5">
            {{ Form::select('VEN_DescuentoEspecial_Estado', array('1' => 'Activado', '0' => 'Desactivado'),$Descuento->VEN_DescuentoEspecial_Estado ,array('class' => 'col-md-4 control-label')) }}
          </div>
    </div>


        <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('Ventas.Descuentos.show', 'Cancel', $Descuento->VEN_DescuentoEspecial_id, array('class' => 'btn')) }}
      </div>
    </div>
{{ Form::close() }}


@stop
