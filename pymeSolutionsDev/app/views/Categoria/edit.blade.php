@extends('layouts.scaffold')

@section('main')

<h1>Edit Categoria</h1>
{{ Form::model($Categoria, array('method' => 'PATCH', 'route' => array('Categoria.update', $Categoria->INV_Categoria_ID))) }}
	
    <div class="row"> 
      <div class="col-md-4 col-md-offset-1">

        <form class="form-horizontal" role="form">
          <div class="form-group col-md-10">
            <label for="Codigo" class="col-md-3 control-label">ID:</label>
              <div class="col-md-4">
                {{ Form::text('INV_Categoria_ID') }}
              </div>
          </div>

          <div class="form-group col-md-12">
            <label for="Codigo" class="col-md-3 control-label">Codigo:</label>
              <div class="col-md-8">
                {{ Form::text('INV_Categoria_Codigo') }}
              </div>
          </div>

         <div class="form-group col-md-12">
            <label for="Nombre" class="col-md-3 control-label">Nombre:</label>
              <div class="col-md-8">
                {{ Form::text('INV_Categoria_Nombre') }}
              </div>
         </div> 

         <div class="form-group col-md-12">
           <label for="Descripcion" class="col-md-3 control-label">Descripcion:</label> 
            <div class="col-md-9 col-md-push-1">
             {{ Form::textarea('INV_Categoria_Descripcion') }}
          </div>
        </div>

        <div class="form-group col-md-12">
            <label for="Nombre" class="col-md-5 control-label">Horario Descuento ID:</label>
              <div class="col-md-4">
                {{ Form::text('INV_Categoria_HorarioDescuento_ID') }}
              </div>
        </div> 

        <div class="form-group col-md-12">
            <label for="Nombre" class="col-md-3 control-label">Activo:</label>
            <div class="col-md-8">
                {{ Form::checkbox('INV_Categoria_Activo') }}
            </div>
        </div>

         <div class="form-group col-md-12">
            <label for="CategoriaPadre" class="col-md-3 control-label">Categoria Padre:</label>
              <div class="col-md-8">
                {{ Form::text('INV_Categoria_IDCategoriaPadre') }}
              </div>
         </div>
        </form> 
        </div>
        
        <div class="form-group col-md-12">
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('Categoria.show', 'Cancel', $Categoria->INV_Categoria_ID, array('class' => 'btn')) }}
        </div>
    </div>

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
