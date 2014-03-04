<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
         <title>PymeSolutions</title>
         </head>
         <body>
             <div class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"> <img src="http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-5/32/navigate-right-icon.png"> PymeSolutions</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="#Ventas">VENTAS</a></li>
            <li><a href="#Compras">COMPRAS</a></li>
            <li><a href="#Inventario">INVENTARIO</a></li>
            <li><a href="#Contabilidad">CONTABILIDAD</a></li>
            <li><a href="#Seguridad">SEGURIDAD</a></li>
            <li><a href="#Configuracion">CONFIGURACION</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">user@domain.com <img img="" src="http://icons.iconarchive.com/icons/custom-icon-design/mono-business/24/user-icon.png"></a></li>
            <li></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
   


    <hr/>
    
    <div class="row"> 
        
        <div class="col-md-3 col-md-offset-1">
            <h4>Campos por defecto</h4>
             <h5>Codigo del Proveedor</h5>
             <h5>Nombre del Proveedor</label>
             <h5>Codigo del Producto</h5>
             <h5>Nombre del Producto</h5>
             <h5>Cantidad del Producto</h5>
             <h5>Unidad de Medida</h5>
             <h5>Precio del producto</h5>
        </div>
        <div class="col-md-3 col-md-offset-1">   
             <h4 style="visibility: hidden">.</h4>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             
         </div>
        <br>
    </div>
         <div class="col-md-4 col-md-offset-1">
             <div class="row">
                 <h4>Campos Locales</h4>
             </div>
             {{ Form::open(array('route' => 'Cotizacions.campoLocal ')) }}
            <div class="row">
        
                <div class="col-md-1 col-md-offset-7"><button type="summit" class="btn btn-default btn-md">Guardar</button></div>
            </div>
                 <div class="form-group">
                     <label for="Nombre">Nombre:</label>
                     <input type="text" id="Nombre" placeholder="Nombre">
                 </div>
                 <div class="form-group">
                     <label for="Tipo">Tipo:</label>
                     <select class="form-control input-md">
                        <option value="">Numerico</option>
   
                        <option value="">Texto</option>
                    </select>
                 </div>
                 <div class="form-group">
                     <input type="checkbox">
                     <label for="Requerido">Requerido</label>
                 </div>
                 <div class="form-group">
                     <input type="checkbox">
                     <label for="Parametro">Parametro de Busqueda</label>
                 </div>
                 <div class="form-group">
                     <input type="checkbox">
                     <label for="Parametro">Activo</label>
                 </div>
         {{ Form::close() }}
            
        </div>
       

    

   
                








<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>
