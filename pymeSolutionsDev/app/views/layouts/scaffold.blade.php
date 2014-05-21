<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>pymeSolutions</title>
  <link rel="stylesheet" href="<?php public_path(); ?>/bootstrap/css/bootstrap.min.css">

    <!--script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script-->
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <!--Load Script and Stylesheet -->
  <script type="text/javascript" src="/assets/javascript/jquery.simple-dtpicker.js"></script>
  <link type="text/css" href="/assets/javascript/jquery.simple-dtpicker.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="/assets/css/general.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/jquery.simple-dtpicker.css">
  <script type="text/javascript" src="/assets/javascript/Compras.js"></script>
  <script type="text/javascript" src="/assets/javascript/datetimepicker.js"></script>

</head>
<body style="margin-top: 50px">
  
  <div class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="text-align:left;">
    <div class="container">
      <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">pyme Solutions</a>
      </div>
        
        <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ventas <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/Ventas/Ventas/create">Gestión de Ventas</a></li>
                  <li><a href="/Ventas/Cajas">Gestión de Caja</a></li>
                  <li><a href="/Ventas/Devoluciones/create">Devoluciones</a></li>
                  <li class="divider"></li>
                  <li><a href="/Ventas">Configuración</a></li>
                </ul>
              </li>

          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Compras <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/Compras/SolicitudCotizacion">Solicitudes de Cotización</a></li>
                  <li><a href="/Compras/Cotizaciones">Cotizaciones</a></li>
                  <li><a href="#">**Ordenes de Compras</a></li>
                  <li><a href="/Compras/OrdenCompra/sinCotizacion/ListaProductos" >Crear Orden Compra sin Cotizacion</a></li>
                  <li><a href="/Compras/OrdenCompra/conCotizacion/ListaCotizaciones" >Comparar Cotizaciones</a></li>
                  <li><a href="/Compras/OrdenCompra/Autorizacion/ListaOrdenes" > Autorizar Orden Compra</a></li>
                  <li><a href="/Compras/OrdenCompra/Autorizacion/ListarOrdenes" > Administrar Orden Compra</a></li>
                  <li><a href="/Compras/OrdenCompra/GenerarPago/ListaCotizaciones" > generar pago Ordenes de  Compras</a></li>
                  <li><a href="/Compras/OrdenCompra/Historial/ListarOrdenes" > Historial Ordenes de  Compras</a></li>
                  <li class="divider"></li>
                  <li><a href="/Compras">Configuración</a></li>
                </ul>
              </li>

          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventario <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li>
                    {{ link_to_route('Inventario.Productos.index', 'Productos')}}
                  </li>
                  <li>
                    {{ link_to_route('Inventario.Atributos.index', 'Atributos')}}
                  </li>
                  <li>
                    {{ link_to_route('Inventario.Proveedor.index', 'Proveedores')}}
                  </li>
                  <li>
                    {{ link_to_route('Inventario.Categoria.index', 'Categorías')}}
                  </li>
                  <li>
                    {{ link_to_route('Inventario.Ciudad.index', 'Ciudades')}}
                  </li>
                  <li>
                    {{ link_to_route('Inventario.UnidadMedidas.index', 'Unidades de Medida')}}
                  </li>
                  <li>
                    {{ link_to_route('Inventario.Horarios.index', 'Horarios')}}
                  </li>
                  <li>
                    {{ link_to_route('Inventario.FormaPagos.index', 'Formas de Pagos')}}
                  </li>
                  <li>
                    {{ link_to_route('Inventario.MovimientoInventario.index', 'Movimiento Inventario')}}
                  </li>
                  <li>
                    {{ link_to_route('Inventario.MotivoMovimiento.index', 'Motivo Movimiento Inventario')}}
                  </li>
                  <li class="divider"></li>
                  <li>
                     <a href="/Inventario">Configuración</a>
                  </li>
                </ul>
              </li>

              <li class="dropdown">

                <a href="contabilidad" class="dropdown-toggle" data-toggle="dropdown">Contabilidad <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{URL::to('contabilidad/librodiario')}}">Libro Diario</a></li>
                  <li><a href="#">ROI</a></li>
                  <li><a href="#">Punto de Equilibrio</a></li>
                  <li><a href="#">Flujo de Caja</a></li>
                  <li class="divider"></li>
                  <li><a href="{{ URL::to('contabilidad/configuracion/') }}">Configuración</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">CRM <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li>
                    {{ link_to_route('CRM.Personas.index', 'Clientes')}}
                  </li>
                  <li>
                    {{ link_to_route('CRM.Empresas.index', 'Empresas')}}
                  </li>
                  <li><a href="#">Proveedores</a></li>
                  <li><a href="#">Campañas</a></li>
                  <li>
                    {{ link_to_route('CRM.TipoDocumentos.index', 'Documentos')}}
                  </li>
                  <li><a href="#">Oportunidades de Negocios</a></li>
                  <li class="divider"></li>
                  <li><a href="/CRM">Configuración</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Seguridad <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Usuarios</a></li>
                  <li><a href="#">Roles</a></li>
                  <li><a href="#">Logs</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Configuración</a></li>
                </ul>
              </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li>
          <p class="navbar-text navbar-right" style="margin-right: 1em;">
            Signed in as <a href="#" class="navbar-link">Admin</a></p></li>
        </ul>
    </div>
    </div>
  </div>
  
  <div class="container col-md-8 col-md-offset-2">
    @yield('main')
  </div>
   <script src="<?php public_path(); ?>/bootstrap/js/jquery-2.0.2.min.js"></script>
  <script src="<?php public_path(); ?>/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assets/javascript/script.js"></script>
  <script src="/assets/javascript/jquery.simple-dtpicker.js"></script>

</body>
  
</body>
   
      @yield('contabilidad_scripts')
  <!--script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script-->
</html>