@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Proveedor &gt; <small>Editar Proveedor</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Proveedor') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>
{{ Form::model($Proveedor, array('method' => 'PATCH', 'route' => array('Inventario.Proveedor.update', $Proveedor->INV_Proveedor_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
        {{ Form::label('INV_Proveedor_Codigo', 'Codigo:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_Proveedor_Codigo', $Proveedor->INV_Proveedor_Codigo, array('class' => 'form-control', 'id' => 'INV_Proveedor_Codigo', 'placeholder'=>'PROV-00001')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_Nombre', $Proveedor->INV_Proveedor_Nombre, array('class' => 'form-control', 'id' => 'INV_Proveedor_Nombre', 'placeholder'=>'name')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Direccion', 'Direccion: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::textarea('INV_Proveedor_Direccion', $Proveedor->INV_Proveedor_Direccion, array('class' => 'form-control', 'rows' => '3',  'id' => 'INV_Proveedor_Direccion', 'placeholder'=>'Descripcion')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Telefono', 'Teléfono:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_Telefono', $Proveedor->INV_Proveedor_Telefono, array('class' => 'form-control', 'id' => 'INV_Proveedor_Telefono', 'placeholder'=>'(504)2222-2222')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Email', 'Email:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_Email', $Proveedor->INV_Proveedor_Email, array('class' => 'form-control', 'id' => 'INV_Proveedor_Email', 'placeholder'=>'name@email.com')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_PaginaWeb', 'Página Web:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_PaginaWeb', $Proveedor->INV_Proveedor_PaginaWeb, array('class' => 'form-control', 'id' => 'INV_Proveedor_PaginaWeb', 'placeholder'=>'myweb.com')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_RepresentanteVentas', 'Representante Ventas: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_RepresentanteVentas', $Proveedor->INV_Proveedor_RepresentanteVentas, array('class' => 'form-control', 'id' => 'INV_Proveedor_RepresentanteVentas', 'placeholder'=>'name')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_TelefonoRepresentanteVentas', 'Teléfono Representante:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_TelefonoRepresentanteVentas', $Proveedor->INV_Proveedor_TelefonoRepresentanteVentas, array('class' => 'form-control', 'id' => 'INV_Proveedor_TelefonoRepresentanteVentas', 'placeholder'=>'(504)2222-2222')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Comentarios', 'Comentarios:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::textarea('INV_Proveedor_Comentarios', $Proveedor->INV_Proveedor_Comentarios, array('class' => 'form-control', 'rows' => '3',  'id' => 'INV_Proveedor_Comentarios', 'placeholder'=>'Comentario')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Proveedor_RutaImagen', 'Ruta de Imagen:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Proveedor_RutaImagen',$Proveedor->INV_Proveedor_RutaImagen, array('class' => 'form-control', 'id' => 'INV_Proveedor_RutaImagen', 'placeholder' => 'Dir' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Ciudad_ID', 'Ciudad ID: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Ciudad_ID', $ciudades, $Proveedor->INV_Ciudad_ID, array('class' => 'form-control', 'id' => 'INV_Ciudad_ID', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Proveedor_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_Proveedor_Activo', '1', $Proveedor->INV_Proveedor_Activo, array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    {{ Form::hidden('INV_Proveedor_FechaModificacion', date('Y-m-d H:i:s')) }}
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
      </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
