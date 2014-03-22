<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>pymeSolutions</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/general.css">
  <link rel="stylesheet" href="<?php public_path(); ?>/bootstrap/css/bootstrap.min.css">
</head>
<body style="margin-top: 50px">
  <header>
  <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <a class="navbar-brand" href="#">pymeERP</a>

    <ul class="nav navbar-nav navbar-left">
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
              <li><a href="#">Solicitudes de Cotización</a></li>
              <li><a href="#">Cotizaciones</a></li>
              <li><a href="#">Ordenes de Compras</a></li>
              <li class="divider"></li>
              <li><a href="#">Configuración</a></li>
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
              <li><a href="#">Inventario</a></li>
              <li><a href="#">Categorias</a></li>
              <li><a href="#">Atributos</a></li>
              <li class="divider"></li>
              <li><a href="#">Configuración</a></li>
            </ul>
          </li>

          <li class="dropdown">

            <a href="contabilidad" class="dropdown-toggle" data-toggle="dropdown">Contabilidad <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Libro Diario</a></li>
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
              <li><a href="#">Clientes</a></li>
              <li><a href="#">Empresariales</a></li>
              <li><a href="#">Proveedores</a></li>
              <li><a href="#">Campañas</a></li>
              <li><a href="#">Documentos</a></li>
              <li><a href="#">Oportunidades de Negocios</a></li>
              <li class="divider"></li>
              <li><a href="#">Configuración</a></li>
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

    <p class="navbar-text navbar-right" style="margin-right: 1em;">Signed in as <a href="#" class="navbar-link">Admin</a></p>
  </nav>
  </header>
  <div class="container col-md-8 col-md-offset-2">
    @yield('main')
  </div>
   <script src="<?php public_path(); ?>/bootstrap/js/jquery-2.0.2.min.js"></script>
  <script src="<?php public_path(); ?>/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assets/javascript/script.js"></script>
</body>

  <!--script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script-->
</html>