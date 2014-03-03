@extends('layouts.scaffold')

@section('main')

<h1>Categoria {{$Categoria->INV_Categoria_ID}}</h1>

<p>{{ link_to_route('Categoria.index', 'Regresar') }}</p>

<div class="row"> 
      <div class="col-md-7 col-md-offset-1">

          <div class="form-group col-md-12">
            <label for="Codigo" class="col-md-4 control-label">ID:</label>
              <div class="col-md-8 col-md-push-1">
                <p class="form-control-static">{{$Categoria->INV_Categoria_ID}}</p>
              </div>
          </div>

          <div class="form-group col-md-12">
            <label for="Codigo" class="col-md-4 control-label">Codigo:</label>
              <div class="col-md-8 col-md-push-1">
              	<p class="form-control-static">{{$Categoria->INV_Categoria_Codigo}}</p>
              </div>
          </div>

         <div class="form-group col-md-12">
            <label for="Nombre" class="col-md-4 control-label">Nombre:</label>
              <div class="col-md-8 col-md-push-1">
                <p class="form-control-static">{{$Categoria->INV_Categoria_Nombre}}</p>
              </div>
         </div> 

         <div class="form-group col-md-12">
           <label for="Descripcion" class="col-md-4 control-label">Descripcion:</label> 
            <div class="col-md-8 col-md-push-1">
             <p class="form-control-static">{{$Categoria->INV_Categoria_Descripcion}}</p>
          </div>
        </div>

        <div class="form-group col-md-12">
            <label for="Nombre" class="col-md-5 control-label">Horario Descuento ID:</label>
              <div class="col-md-7">
                <p class="form-control-static">{{$Categoria->INV_Categoria_HorarioDescuento_ID}}</p>
              </div>
        </div> 

        <div class="form-group col-md-12">
            <label for="Nombre" class="col-md-4 control-label">Activo:</label>
            <div class="col-md-8 col-md-push-1">
                <p class="form-control-static">{{$Categoria->INV_Categoria_Activo}}</p>
            </div>
        </div>

         <div class="form-group col-md-12">
            <label for="CategoriaPadre" class="col-md-4 control-label">Categoria Padre:</label>
              <div class="col-md-8 col-md-push-1">
                <p class="form-control-static">{{$Categoria->INV_Categoria_IDCategoriaPadre}}</p>
              </div>
         </div>
        </div>
        
        <div class="col-md-1">
        	{{ link_to_route('Categoria.edit', 'Edit', array($Categoria->INV_Categoria_ID), array('class' => 'btn btn-info')) }}
            <br></br>
            {{ Form::open(array('method' => 'DELETE', 'route' => array('Categoria.destroy', $Categoria->INV_Categoria_ID))) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        </div>
    </div>

@stop
