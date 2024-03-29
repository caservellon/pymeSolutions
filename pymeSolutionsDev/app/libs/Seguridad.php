<?php

	class Seguridad {

		public static function Administrador(){
			if (Auth::user()->SEG_Roles_SEG_Roles_ID == 1) {
				return true;
			} else {
				return false;
			}
		}

		//CRM
		public static function CrearPersona(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_CrearPersona;
		}

		public static function VerPersona(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_VerPersona;
		}

		public static function EditarPersona(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_EditarPersona;
		}

		public static function EliminarPersona(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_EliminarPersona;
		}

		public static function CrearEmpresa(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_CrearEmpresa;
		}

		public static function VerEmpresa(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_VerEmpresa;
		}

		public static function EditarEmpresa(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_EditarEmpresa;
		}

		public static function EliminarEmpresa(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_EliminarEmpresa;
		}

		public static function Configuracion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_Configuracion;
		}

		public static function BuscarPersona(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_BuscarPersona;
		}

		public static function BuscarEmpresa(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_BuscarEmpresa;
		}

		//Ventas

		public static function CrearCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_CrearCaja;
		}

		public static function AbrirCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_AbrirCaja;
		}

		public static function BorrarCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_BorrarCaja;
		}

		public static function EditarCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_EditarCaja;
		}

		public static function VerCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_VerCaja;
		}

		public static function CrearPeriodoDeCierre(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_CrearPeriodoDeCierre;
		}

		public static function BorrarPeriodoDeCierre(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_BorrarPeriodoDeCierre;
		}

		public static function EditarPeriodoDeCierre(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_EditarPeriodoDeCierre;
		}

		public static function VerPeriodoDeCierre(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_VerPeriodoDeCierre;
		}

		public static function AbrirAperturaDeCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_AbrirAperturaDeCaja;
		}

		public static function CerrarAperturaDeCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_CerrarAperturaDeCaja;
		}

		public static function VerAperturaDeCierre(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_VerAperturaDeCierre;
		}

		public static function CrearDescuentos(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_CrearDescuentos;
		}

		public static function EditarDescuentos(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_EditarDescuentos;
		}

		public static function EliminarDescuentos(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_EliminarDescuentos;
		}

		public static function VerDescuentos(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_VerDescuentos;
		}

		public static function ConfigurarVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_ConfigurarVentas;
		}

		public static function GestionarVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_GestionarVentas;
		}

		public static function EliminarProductoDeVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_EliminarProductoDeVentas;
		}

		public static function EditarCantidadDeVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_EditarCantidadDeVentas;
		}

		public static function GuardarVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_GuardarVentas;
		}

		public static function ListarVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_ListarVentas;
		}

		public static function VerVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_VerVentas;
		}

		public static function IniciarDevolucion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_IniciarDevolucion;
		}

		public static function AutorizarDevolucion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_AutorizarDevolucion;
		}

		public static function ListarDevoluciones(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_ListarDevoluciones;
		}

		public static function DetalleDeDevolucion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_DetalleDeDevolucion;
		}



		//Compras
		
		public static function NuevoEstadoOrden(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_NuevoEstadoOrdenCompra;
		}

		public static function AlmacenaestadoOrden(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_GuardarEstadoOrden;
		}

		public static function IndexEstadoorden(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_NuevoEstadoOrdenCompra
;
		}

		public static function EditEstadoorden(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_EditarEstadoOrden;
		}

		public static function ModificarTransicionesEstado(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ModificarTransicionesEstado;
		}

		public static function NuevaTransicionEstado(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_nuevaTransicionEstado;
		}

		public static function detalleTransicionesEstado(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_detalleTransicionesEstado;
		}

		public static function detalleNuevaTransicionesEstado(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_detalleNuevaTransicion;
		}
		

		public static function GuardarTransicionEstado(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_GuardarTransicionEstado;
		}

		public static function ActualizarTransicionEstado(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ActualizarTransicionEstado;
		}
		

		public static function nuevaOrdenCompraSinCotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_nuevaOrdenCompraSinCotizacion;
		}

		public static function detalleNuevaOrdenCompras(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_DetalleNuevaOrdenCompras;
		}

		public static function GuardarNuevaOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_GuardarNuevaOrdenCompra;
		}

		public static function nuevaOrdenCompraConCotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_nuevaOrdenCompraConCotizacion;
		}

		public static function CompararCotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_CompararCotizaciones;
		}

		public static function detalleNuevaOrdenCompraConCotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_detalleNuevaOrdenCompraConCotizacion;
		}

		public static function guardarNuevaOrdenCompraConCotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_guardarNuevaOrdenCompraConCotizacion;
		}

		public static function ListarAutorizarOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ListarAutorizarOrdenCompra;
		}

		public static function detalleAutorizarOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_detalleAutorizarOrdenCompra;
		}

		public static function guardarAutorizarOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_guardarAutorizarOrdenCompra;
		}

		public static function cancelarOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_cancelarOrdenCompra;
		}

		public static function ListaAdministrarOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ListaAdministrarOrdenCompra;
		}

		public static function AdministrarDetalleOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_AdministrarDetalleOrdenCompra;
		}
		
		public static function guardarAdministrarOC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_guardarAdministrarOrdenCompra;
		}
		
		public static function ListarHistorialOrdenes(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ListarHistorialOrdenes;
		}
		
		public static function detalleHistorialOrden(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_detalleHistorialOrden;
		}
		
		public static function ListarPagoOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ListarPagoOrdenCompra;
		}
		
		public static function DetallePagoOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_DetallePagoOrdenCompra;
		}
		
		public static function GuardarPagoOrdenPago(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_GuardarPagoOrdenPago;
		}

		public static function VerPlanPagoOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VerPlanPagoOrdenCompra;
		}
		
		public static function detallePlanPagoOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_detallePlanPagoOrdenCompra;
		}

		public static function detalleDevolucionCompras(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_detalleDevolucionCompras;
		}
		
		public static function ListaDevolucionCompras(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ListaDevolucionCompras;
		}
		
		public static function GuardarDevolucionCompras(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_GuardarDevolucionCompras;
		}
		
		public static function indexOC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_MostrarOrdenCompra;
		}

		public static function indexImprimirOC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_MostrarImprimirOrdenCompra;
		}
		
		public static function ImprimirOC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ImprimirOrdenCompra;
		}
		
		public static function indexCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VerCampoLocal;
		}
		
		public static function createCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_AgregarCampoLocal;
		}
		
		public static function editCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_EditarCampoLocal;
		}
		
		public static function destroyCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_EliminarCampoLocal;
		}
		
		public static function indexSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_MostrarSolicitudCotizacion;
		}
		
		public static function vistaCrearSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VerCualquierProductoSC;
		}
		
		public static function vistaReordenSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VerProductoReordenSC;
		}
		
		public static function crearSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_crearSolicitudCotizacion;
		}
		
		public static function editSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_EditarSolicitudCotizacion;
		}
		
		public static function detalleSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_DetalleSolicitudCotizacion;
		}
		
		public static function indexImprimirSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ImprimirSolicitudCotizacion;
		}
		
		public static function ImprimirSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ImpresionSolicitudCotizacion;
		}
		
		public static function VistaMenuCotizaciones(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VistaMenuCotizaciones;
		}
		
		public static function CapturarCotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_CapturarCotizacion;
		}
		
		public static function VistaCapturarCotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VistaCapturarCotizacion;
		}
		
		public static function VistaCapturarCotizacionCapturar(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VistaCapturarCotizacionCapturar;
		}
		
		public static function CapturarCotizacionCapturar(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_CapturarCotizacionCapturar;
		}
		
		public static function VistaTodasCotizaciones(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VistaTodasCotizaciones;
		}
		
		public static function TodasCotizaciones(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_TodasCotizaciones;
		}
		
		public static function VistaDetallesCotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VistaDetallesCotizacion;
		}
		
		public static function VistaHabilitarInhabilitar(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VistaHabilitarInhabilitar;
		}

		public static function HabilitarInhabilitar(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_HabilitarInhabilitar;
		}
		
		public static function VistaTodasOrdenesCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VistaTodasOrdenesCompra;
		}
		
		public static function VistaDetallesOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VistaDetallesOrdenCompra;
		}
		
		public static function VistaNuevaOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VistaNuevaOrdenCompra;
		}
		
		public static function DetallesOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_DetallesOrdenCompra;
		}

		

		//Inventario
		public static function crearProducto(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_crearProducto;
		}

		public static function editarProducto(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_editarProducto;
		}

		public static function eliminarProducto(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_eliminarProducto;
		}

		public static function listarProducto(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_listarProducto;
		}

		public static function crearProveedor(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_crearProveedor;
		}

		public static function editarProveedor(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_editarProveedor;
		}

		public static function eliminarProveedor(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_eliminarProveedor;
		}

		public static function listarProveedor(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_listarProveedor;
		}

		public static function crearAtributo(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_crearAtributo;
		}

		public static function editarAtributo(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_editarAtributo;
		}

		public static function eliminarAtributo(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_eliminarAtributo;
		}

		public static function listarAtributo(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_listarAtributo;
		}

		public static function crearCategoria(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_crearCategoria;
		}

		public static function editarCategoria(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_editarCategoria;
		}

		public static function eliminarCategoria(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_eliminarCategoria;
		}

		public static function listarCategoria(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_listarCategoria;
		}

		public static function crearUnidadMedida(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_crearUnidadMedida;
		}

		public static function editarUnidadMedida(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_editarUnidadMedida;
		}

		public static function eliminarUnidadMedida(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_eliminarUnidadMedida;
		}

		public static function listarUnidadMedida(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_listarUnidadMedida;
		}

		public static function crearCiudad(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_crearCiudad;
		}

		public static function editarCiudad(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_editarCiudad;
		}

		public static function eliminarCiudad(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_eliminarCiudad;
		}

		public static function listarCiudad(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_listarCiudad;
		}

		public static function crearHorario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_crearHorario;
		}

		public static function editarHorario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_editarHorario;
		}

		public static function eliminarHorario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_eliminarHorario;
		}

		public static function listarHorario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_listarHorario;
		}

		public static function crearFormaPago(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_crearFormaPago;
		}

		public static function eliminarFormaPago(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_eliminarFormaPago;
		}

		public static function listarFormaPago(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_listarFormaPago;
		}

		public static function registrarEntradaInventario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_registrarEntradaInventario;
		}

		public static function registrarSalidaInventario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_registrarSalidaInventario;
		}

		public static function listarEntradaInventario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_listarEntradaInventario;
		}

		public static function listarSalidaInventario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_listarSalidaInventario;
		}

		public static function crearMotivoMovimientoInventario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_crearMotivoMovimientoInventario;
		}

		public static function editarMotivoMovimientoInventario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_editarMotivoMovimientoInventario;
		}

		public static function eliminarMotivoMovimientoInventario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_eliminarMotivoMovimientoInventario;
		}

		public static function listarMotivoMovimientoInventario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_listarMotivoMovimientoInventario;
		}

		public static function crearCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_crearCampoLocal;
		}

		public static function editarCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_editarCampoLocal;
		}

		public static function eliminarCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_eliminarCampoLocal;
		}

		public static function listarCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_listarCampoLocal;
		}

		public static function agregarProveedorProducto(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_agregarProveedorProducto;
		}

		public static function quitarProveedorProducto(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_quitarProveedorProducto;
		}

		public static function cambiarEstadoOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_cambiarEstadoOrdenCompra;
		}

		public static function agregarProveedorFormaPago(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_agregarProveedorFormaPago;
		}

		public static function quitarProveedorFormaPago(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_quitarProveedorFormaPago;
		}

		public static function ListarHistorial(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_ListarHistorial;
		}

		public static function VerMenuMovimiento(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_INV_VerMenuMovimiento;
		}



		//Contabilidad
		public static function ListarCatalogoContables(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_ListarCatalogoContable;
		}

		public static function EditarCuenta(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_EditarCuenta;
		}

		public static function AgregarCuenta(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_AgregarCuenta;
		}

		public static function ListarSubcuentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_ListarSubcuentas;
		}

		public static function AgregarSubcuentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_AgregarSubcuentas;
		}

		public static function ListarPeriodosContables(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_ListarPeriodosContables;
		}

		public static function AgregarPeriodoContable(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_AgregarPeriodoContable;
		}

		public static function HabilitarDeshabilitarPeriodoContable(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_HabilitarDeshabilitarPeriodosContables;
		}

		public static function EditarPeriodoContable(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_EditarPeriodoContable;
		}

		public static function AgregarUnidadesMonetarias(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_AgregarUnidadesMonetarias;
		}

		public static function EditarUnidadesMonetarias(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_EditarUnidadesMonetarias;
		}

		public static function ListarUnidadesMonetarias(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_ListarUnidadesMonetarias;
		}

		public static function ConfigurarMotivosDeInventario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_ConfigurarMotivosDeInventario;
		}

		public static function ListarConceptosDeTransaccionesAutomaticas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_ListarConceptosDeTransaccionesAutomaticas;
		}

		public static function EditarConceptosDeTransaccionesAutomaticas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_EditarConceptosDeTransaccionesAutomaticas;
		}

		public static function VerLibroDiario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_VerLibroDiario;
		}

		public static function AgregarMotivoAsientosManuales(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_AgregarMotivoAsientosManuales;
		}

		public static function GenerarCierrePeriodo(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_GenerarCierrePeriodo;
		}

		public static function VerPagos(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_VerPagos;
		}

		public static function VerReembolsos(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_VerReembolso;
		}

		public static function RealizarReembolso(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_RealizarReembolso;
		}

		public static function VerEstadosFinancieros(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_VerEstadosFinancieros;
		}

		public static function ListarMotivosDeInventario(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_ListarMotivosDeInventario;
		}

		public static function CrearAsientosContable(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_CrearAsientosContable;
		}

		public static function VerROI(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_VerROI;
		}

		public static function VerFlujoEfectivo(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_VerFlujoEfectivo;
		}

		public static function VerPuntoEquilibrio(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_VerPuntoEquilibrio;
		}

		public static function RevertirAsientosContables(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_RevertirAsientosContables;
		}

		public static function RealizarPagos(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_RealizarPagos;
		}

		public static function GenerarROI(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_GenerarROI;
		}

		public static function GenerarFlujoEfecctivo(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_GenerarFlujoEfectivo;
		}

		public static function GenerarPuntoEquilibrio(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CON_GenerarPuntoEquilibrio;
		}


		//metodo para obtener la compania
		public static function compania(){
			return DB::table('SEG_Config')->first();
		}

	}

?>