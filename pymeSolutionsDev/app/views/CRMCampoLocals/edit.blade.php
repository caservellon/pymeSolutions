@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Campo Local &gt; <small>Editar Campo Local</small></h3>
      <div class="pull-right">
        <a href="/CRM/CampoLocals" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
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

{{ Form::model($CampoLocal, array('method' => 'PATCH', 'route' => array('CRM.CampoLocals.update', $CampoLocal->GEN_CampoLocal_ID), 'class' => 'form-horizontal', 'role' => 'form' )) }}
    <div class="form-group">
        {{ Form::label('GEN_CampoLocal_Nombre', 'Nombre: *',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('GEN_CampoLocal_Nombre', $CampoLocal->GEN_Campo_Local_Nombre, array('class' => 'form-control', 'id' => 'GEN_CampoLocal_Nombre', 'placeholder'=>'CAJ-00001')) }}
        </div>
    </div>

    <div class="form-group">
      {{ Form::label('Tipo_de_Perfil', 'Tipo de perfil: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('Tipo_de_Perfil', array('PS' => 'Persona', 'EP' => 'Empresa'),$tipoDePerfil,array('class' => 'col-md-4 form-control')) }}
      </div>
    </div>

    <div class="campo-local-tipo form-group">
      {{ Form::label('GEN_CampoLocal_Tipo', 'Tipo de Campo: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        @if($CampoLocal->GEN_CampoLocal_Tipo == "LIST") 
        <select class="col-md-4 form-control" id="GEN_CampoLocal_Tipo" name="GEN_CampoLocal_Tipo" disabled><option value="LIST" selected="selected">Lista de Valores</option></select>
        @else
        {{ Form::select('GEN_CampoLocal_Tipo', array('TXT' => 'Texto', 'INT' => 'Entero', 'FLOAT' => 'Decimal', 'LIST' => 'Lista de Valores'),$CampoLocal->GEN_CampoLocal_Tipo ,array('class' => 'col-md-4 form-control')) }}
        @endif
      </div>
    </div>

    @if($CampoLocal->GEN_CampoLocal_Tipo == "LIST") 
    <div class="value-list form-group">
    @else
    <div style="display:none;" class="value-list form-group">
    @endif
      <label class="col-md-2 control-label">Agregar elementos: *</label>
      <div class="col-md-5">
        <div class="input-group">
          <input type="text" class="value-input form-control">
          <span class="input-group-btn">
            <button class="add-value btn btn-success" type="button"><span class="glyphicon glyphicon-plus"></span></button>
          </span>
        </div>
        
        <ul class="list-group">
          @if($CampoLocalLista != null)
            @foreach ($CampoLocalLista as $ListValue)
              <li class="list-group-item">{{{$ListValue->GEN_CampoLocalLista_Valor}}}
                <button class="btn btn-danger pull-right"><span class="glyphicon glyphicon-minus"></span></button>
              </li>
            @endforeach
          @endif
        </ul>  
        {{ Form::hidden('value-list-array',$stringConcat, array('class' => 'value-list-array'))}}  
      </div>
    </div>

    <div class="form-group">
       {{ Form::label('GEN_CampoLocal_Activo', 'Estado de Campo:', array('class' => 'col-md-2 control-label')) }}
       <div class="col-md-5">
         {{ Form::select('GEN_CampoLocal_Activo', array('1' => 'Activado', '0' => 'Desactivado'),$CampoLocal->GEN_CampoLocal_Activo ,array('class' => 'col-md-4 form-control')) }}
       </div>
     </div>

    <div class="form-group">
        <div class="col-md-5 col-md-offset-2">
            
            <label class="checkbox-inline control-label">
                {{ Form::checkbox('GEN_CampoLocal_Requerido', '1',$CampoLocal->GEN_CampoLocal_Requerido) }}
                Requerido
                
            </label>
            <label class="checkbox-inline control-label"> 
                {{ Form::checkbox('GEN_CampoLocal_ParametroBusqueda', '1', $CampoLocal->GEN_CampoLocal_ParametroBusqueda) }}
                Parámetro de Busqueda 
            </label>
        </div>
    </div>

    <div class="form-group">
      <div class="col-md-5 ">
            {{ Form::submit('Actualizar', array('class' => 'btn btn-info')) }}
            {{ link_to_route('CRM.CampoLocals.index', 'Cancelar', $CampoLocal->GEN_CampoLocal_ID, array('class' => 'btn')) }}
      </div>
    </div>


{{ Form::close() }}



@stop