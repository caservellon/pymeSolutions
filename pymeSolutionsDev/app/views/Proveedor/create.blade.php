@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Proveedor &gt; <small>Nuevo Proveedor</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Proveedor') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>



{{ Form::open(array('route' => 'Inventario.Proveedor.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Codigo', 'Codigo:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_Proveedor_Codigo', null, array('class' => 'form-control', 'id' => 'INV_Proveedor_Codigo', 'placeholder'=>'PROV-00001', 'maxlength'=>'16')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_Nombre', null, array('class' => 'form-control', 'id' => 'INV_Proveedor_Nombre', 'placeholder'=>'Nombre', 'maxlength'=>'128')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Direccion', 'Direccion: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::textarea('INV_Proveedor_Direccion', null, array('class' => 'form-control', 'rows' => '3',  'id' => 'INV_Proveedor_Direccion', 'placeholder'=>'Descripcion', 'maxlength'=>'512')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Telefono', 'Teléfono:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_Telefono', null, array('class' => 'form-control', 'id' => 'INV_Proveedor_Telefono', 'placeholder'=>'(504)2222-2222', 'maxlength'=>'16')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Email', 'Email:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_Email', null, array('class' => 'form-control', 'id' => 'INV_Proveedor_Email', 'placeholder'=>'proveedor@email.com', 'maxlength'=>'64')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_PaginaWeb', 'Página Web:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_PaginaWeb', null, array('class' => 'form-control', 'id' => 'INV_Proveedor_PaginaWeb', 'placeholder'=>'myweb.com', 'maxlength'=>'128')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_RepresentanteVentas', 'Representante Ventas: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_RepresentanteVentas', null, array('class' => 'form-control', 'id' => 'INV_Proveedor_RepresentanteVentas', 'placeholder'=>'Nombre del Representante', 'maxlength'=>'128')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_TelefonoRepresentanteVentas', 'Teléfono Representante:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_Proveedor_TelefonoRepresentanteVentas', null, array('class' => 'form-control', 'id' => 'INV_Proveedor_TelefonoRepresentanteVentas', 'placeholder'=>'(504)2222-2222', 'maxlength'=>'16')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_Proveedor_Comentarios', 'Comentarios:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::textarea('INV_Proveedor_Comentarios', null, array('class' => 'form-control', 'rows' => '3',  'id' => 'INV_Proveedor_Comentarios', 'placeholder'=>'Comentario', 'maxlength'=>'512')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Proveedor_RutaImagen', 'Ruta de Imagen:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Proveedor_RutaImagen',null, array('class' => 'form-control', 'id' => 'INV_Proveedor_RutaImagen', 'placeholder' => 'Dir' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Ciudad_ID', 'Ciudad ID: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Ciudad_ID', $ciudades, null, array('class' => 'form-control', 'id' => 'INV_Ciudad_ID', 'placeholder' => '#' )) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('INV_Proveedor_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_Proveedor_Activo', '1', '1',  array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    {{ Form::hidden('INV_Proveedor_FechaCreacion', date('Y-m-d H:i:s')) }}
    {{ Form::hidden('INV_Proveedor_FechaModificacion', date('Y-m-d H:i:s')) }}

    <div class="page-header clearfix">
      <h3 class="pull-left">Proveedor &gt; <small>Campos Locales</small></h3>
    </div>
        
        @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','INV_PRV%')->get() as $campo)
            <div class="form-group">
                {{ Form::label($campo->GEN_CampoLocal_Codigo, $campo->GEN_CampoLocal_Nombre.":", array('class' => 'col-md-2 control-label')) }}
                @if ($campo->GEN_CampoLocal_Requerido)
                    <label>*</label>
                @endif
                <div class="col-md-5">
                @if ($campo->GEN_CampoLocal_Tipo == 'TXT')
                        {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'INT')
                        {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'FLOAT')
                        {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'LIST')
                        {{ Form::select($campo->GEN_CampoLocal_Codigo, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_ID')) }}
                    @endif
                </div>
            </div> 
        @endforeach


    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Aceptar', array('class' => 'btn btn-info')) }}
      </div>
    </div>

{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


