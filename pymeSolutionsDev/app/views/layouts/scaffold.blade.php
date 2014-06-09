<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>pymeSolutions</title>
		<link rel="stylesheet" href="<?php public_path(); ?>/bootstrap/css/bootstrap.min.css">
		<!--script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script-->
		<script type="text/javascript" src="/assets/javascript/jquery.min.js"></script>
		<!--Load Script and Stylesheet -->
		<link rel="stylesheet" type="text/css" href="/assets/css/general.css">
		<!--link rel="stylesheet" type="text/css" href="/assets/javascript/jquery.simple-dtpicker.css"-->
		<script type="text/javascript" src="/assets/javascript/Compras.js"></script>
		<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	</head>

	<body style="margin-top: 50px">
		<header>
			<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
				<a class="navbar-brand" href="#">pymeSolutions</a>
				@if(Auth::check())
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
							@if((Seguridad::indexSC()) || (Seguridad::indexImprimirSC()))
							<li><a href="/Compras/SolicitudCotizacion">Solicitudes de Cotización</a></li>
							@endif
							@if((Seguridad::VistaMenuCotizaciones()) || (Seguridad::VistaTodasCotizaciones()) || (Seguridad::VistaHabilitarInhabilitar()))
							<li><a href="/Compras/Cotizaciones">Cotizaciones</a></li>
							@endif
							@if((Seguridad::indexOC()) || (Seguridad::indexImprimirOC()) || (Seguridad::ListarAutorizarOrdenCompra()) || (Seguridad::ListaAdministrarOrdenCompra()) || (Seguridad::ListarPagoOrdenCompra()) || (Seguridad::VerPlanPagoOrdenCompra()) || (Seguridad::ListarHistorialOrdenes()) || (Seguridad::ListaDevolucionCompras()))
							<li><a href="/Compras/OrdenCompra" >Ordenes de Compras</a></li>
							@endif
							@if((Seguridad::indexCampoLocal()) || (Seguridad::NuevoEstadoOrden()) || (Seguridad::IndexEstadoorden()) || (Seguridad::NuevaTransicionEstado()) || (Seguridad::ModificarTransicionesEstado()))
							<li class="divider"></li>
							<li><a href="/Compras">Configuración</a></li>
							@endif
							
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventario <b class="caret"></b></a>
						<ul class="dropdown-menu">
							@if(Seguridad::listarProducto())
							<li>
								{{ link_to_route('Inventario.Productos.index', 'Productos')}}
							</li>
							@endif
							@if(Seguridad::listarAtributo())
							<li>
								{{ link_to_route('Inventario.Atributos.index', 'Atributos')}}
							</li>
							@endif
							@if(Seguridad::listarProveedor())
							<li>
								{{ link_to_route('Inventario.Proveedor.index', 'Proveedores')}}
							</li>
							@endif
						<!--<li>
								{{ link_to_route('Inventario.Proveedor.f2p', 'Administrar Formas de Pago')}}
							</li>-->
							@if(Seguridad::agregarProveedorProducto())
							<li>
								{{ link_to_route('Inventario.Proveedor.save', 'Administrar Productos de Proveedores')}}
							</li>
							@endif
							@if(Seguridad::listarCategoria())
							<li>
								{{ link_to_route('Inventario.Categoria.index', 'Categorías')}}
							</li>
							@endif
							@if(Seguridad::listarCiudad())
							<li>
								{{ link_to_route('Inventario.Ciudad.index', 'Ciudades')}}
							</li>
							@endif
							@if(Seguridad::listarUnidadMedida())
							<li>
								{{ link_to_route('Inventario.UnidadMedidas.index', 'Unidades de Medida')}}
							</li>
							@endif
							@if(Seguridad::listarHorario())
							<li>
								{{ link_to_route('Inventario.Horarios.index', 'Horarios')}}
							</li>
							@endif
							@if(Seguridad::listarFormaPago())
						    <li>
								{{ link_to_route('Inventario.FormaPagos.index', 'Formas de Pagos')}}
							</li> 
							@endif

							<li>
								{{ link_to_route('Inventario.Producto.historial.index2', 'Historial de un Producto')}}
							</li>

							@if(Seguridad::listarSalidaInventario())
							<li>
								{{ link_to_route('Inventario.MovimientoInventario.index', 'Movimiento Inventario')}}
							</li>
							@endif
							@if(Seguridad::listarMotivoMovimientoInventario())
							<li>
								{{ link_to_route('Inventario.MotivoMovimiento.index', 'Concepto Movimiento Inventario')}}
							</li>
							@endif
							<li class="divider"></li>
							@if(Seguridad::listarCampoLocal())
							<li>
								 <a href="/Inventario">Configuración</a>
							</li>
							@endif
						</ul>
					</li>

					@if( Seguridad::VerLibroDiario() || Seguridad::VerROI() || Seguridad::VerPuntoEquilibrio() || Seguridad::VerFlujoEfectivo() || Seguridad::VerEstadosfinancieros() || Seguridad::GenerarCierrePeriodo() || Seguridad::VerPagos() || Seguridad::VerReembolsos() ||Seguridad::ListarCatalogoContables() || Seguridad::ListarPeriodosContables() || Seguridad::ListarUnidadesMonetarias() || Seguridad::ListarMotivosDeInventario() || Seguridad::ListarConceptosDeTransaccionesAutomaticas())
						<li class="dropdown">

							<a href="contabilidad" class="dropdown-toggle" data-toggle="dropdown">Contabilidad <b class="caret"></b></a>
							<ul class="dropdown-menu">
								@if( Seguridad::VerLibroDiario() || Seguridad::VerEstadosfinancieros() || Seguridad::GenerarCierrePeriodo() || Seguridad::VerPagos() || Seguridad::VerReembolsos() ||Seguridad::ListarCatalogoContables() || Seguridad::ListarPeriodosContables() || Seguridad::ListarUnidadesMonetarias() || Seguridad::ListarMotivosDeInventario() || Seguridad::ListarConceptosDeTransaccionesAutomaticas())
								<li><a href="{{URL::to('contabilidad')}}">Menu principal</a></li>
								@endif
								@if(Seguridad::VerLibroDiario())
								<li class="divider"></li>
								<li><a href="{{URL::to('contabilidad/librodiario')}}">Libro Diario</a></li>
								@endif
								@if (Seguridad::VerROI())
								<li><a href="#">ROI</a></li>
								@endif
								@if(Seguridad::VerPuntoEquilibrio())
								<li><a href="#">Punto de Equilibrio</a></li>
								@endif
								@if(Seguridad::VerFlujoEfectivo())
								<li><a href="#">Flujo de Caja</a></li>
								@endif
								@if(Seguridad::ListarCatalogoContables() || Seguridad::ListarPeriodosContables() || Seguridad::ListarUnidadesMonetarias() || Seguridad::ListarMotivosDeInventario() || Seguridad::ListarConceptosDeTransaccionesAutomaticas())
								<li class="divider"></li>
								<li><a href="{{ URL::to('contabilidad/configuracion/') }}">Configuración</a></li>
								@endif
							</ul>
						</li>
					@endif
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
							<li><a href="{{ URL::to('Auth/Usuarios') }}">Usuarios</a></li>
							<li><a href="{{ URL::to('Auth/Roles') }}">Roles</a></li>
							<li><a href="#">Logs</a></li>
							<li class="divider"></li>
							<li><a href="{{URL::to('Auth/Configuracion') }}">Configuración</a></li>
						</ul>
					</li>

				</ul>
				@endif
				@if (Auth::check()) 
					<p class="navbar-text navbar-right auth">Hola {{Auth::user()->SEG_Usuarios_Email}} <span class="navbar-link">{{ link_to_route('Auth.logout', 'Salir') }}</span></p>
				@else
					<p class="navbar-text navbar-right auth"><span class="navbar-link">{{ link_to_route('Auth.login', 'Entrar')}}</span></p>
				@endif
			</nav>
		</header>

		
		<div class="container col-md-8 col-md-offset-2">
			@yield('main')
		</div>
		<script src="<?php public_path(); ?>/bootstrap/js/jquery-2.0.2.min.js"></script>
		<script src="<?php public_path(); ?>/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/assets/javascript/pwstrength-bootstrap-1.1.2.js"></script>
		<script src="/assets/javascript/script.js"></script>
		<script src="/assets/javascript/jquery.simple-dtpicker.js"></script>
		<script type="text/javascript" src="/assets/javascript/jquery-ui.js"></script>

	</body>
		 
	@yield('contabilidad_scripts')
	<!--script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script-->
</html>