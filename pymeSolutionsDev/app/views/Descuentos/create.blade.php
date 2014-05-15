@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Descuento &gt; <small>Nuevo Descuento</small></h3>
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

{{ Form::open(array('route' => 'Ventas.Descuentos.store', 'class' => "form-horizontal" , 'role' => 'form')) }}

	 <div class="form-group">
        {{ Form::label('VEN_DescuentoEspecial_Codigo', 'Código:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_DescuentoEspecial_Codigo', null, array('class' => 'form-control', 'id' => 'VEN_DescuentoEspecial_Codigo', 'placeholder'=>'DES-00001')) }}
        </div>
    </div>

     <div class="form-group">
        {{ Form::label('VEN_DescuentoEspecial_Nombre', 'Nombre:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_DescuentoEspecial_Nombre', null, array('class' => 'form-control', 'id' => 'VEN_DescuentoEspecial_Nombre', 'placeholder'=>'3era Edad')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('VEN_DescuentoEspecial_Valor', 'Valor:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_DescuentoEspecial_Valor', null, array('class' => 'form-control', 'id' => 'VEN_DescuentoEspecial_Valor', 'placeholder'=>'12')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('VEN_DescuentoEspecial_FechaInicio', 'Fecha Inicio:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_DescuentoEspecial_FechaInicio', null, array('class' => 'form-control', 'id' => 'VEN_DescuentoEspecial_FechaInicio', 'placeholder'=>'20/02/2014')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('VEN_DescuentoEspecial_FechaFinal', 'Fecha Final:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_DescuentoEspecial_FechaFinal', null, array('class' => 'form-control', 'id' => 'VEN_DescuentoEspecial_FechaFinal', 'placeholder'=>'20/03/2014')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('VEN_DescuentoEspecial_Precedencia', 'Precedencia:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_DescuentoEspecial_Precedencia', null, array('class' => 'form-control', 'id' => 'VEN_DescuentoEspecial_Precedencia', 'placeholder'=>'3')) }}
        </div>
    </div>

    <div class="form-group">
          {{ Form::label('VEN_DescuentoEspecial_Estado', 'Estado de Descuento:', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-5">
            {{ Form::select('VEN_DescuentoEspecial_Estado', array('1' => 'Activado', '0' => 'Desactivado'),1 ,array('class' => 'col-md-4 control-label')) }}
          </div>
    </div>


	<div class="form-group">
      <div class="col-md-5">
      {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
      </div>
    </div>
{{ Form::close() }}



@stop


