<?php

	class Seguridad {

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

		public static function POSVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_POSVentas;
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


		//Compras
		
		public static function NuevoEstadoOrden(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_NuevoEstadoOrden;
		}

		public static function AlmacenaestadoOrden(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_AlmacenaestadoOrden;
		}

		public static function IndexEstadoorden(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_BorrarCaja;
		}

		public static function EditEstadoorden(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_EditEstadoorden;
		}

		public static function ListaTransicion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ListaTransicion;
		}

		public static function Editatransicion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_Editatransicion;
		}

		public static function ListaEstado(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ListaEstado;
		}

		public static function NuevaTransicion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_NuevaTransicion;
		}

		public static function AlmacenaTransicion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_AlmacenaTransicion;
		}

		public static function ActualizarTransicion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ActualizarTransicion;
		}

		public static function OrdenComprasnCotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_OrdenComprasnCotizacion;
		}

		public static function FormOrdenComprasnCotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_FormOrdenComprasnCotizacion;
		}

		public static function GuardarOCsnCOT(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_GuardarOCsnCOT;
		}

		public static function OrdenCompracnCotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_OrdenCompracnCotizacion;
		}

		public static function CompararCotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_CompararCotizacion;
		}

		public static function OrdenCompracnCotizacionForm(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_OrdenCompracnCotizacionForm;
		}

		public static function OCcnCOT(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_OCcnCOT;
		}

		public static function ListarOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ListarOrdenCompra;
		}

		public static function AutorizarOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_AutorizarOrdenCompra;
		}

		public static function autorizarOrden(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_autorizarOrden;
		}

		public static function cancelarOrden(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_cancelarOrden;
		}

		public static function ListaOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_ListaOrdenCompra;
		}

		public static function AdministrarDetalle(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_AdministrarDetalle;
		}
		
		public static function AdministrarOC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_AdministrarOC;
		}
		
		public static function HistorialOrdenes(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_HistorialOrdenes;
		}
		
		public static function HistorialOrden(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_OrdenCompracnCotizacion;
		}
		
		public static function GenerarPagoLC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_GenerarPagoLC;
		}
		
		public static function DetallePago(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_DetallePago;
		}
		
		public static function GuardarPago(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_GuardarPago;
		}
		
		public static function search_index(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_search_index;
		}
		
		public static function Search_Cotizacion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_Search_Cotizacion;
		}
		
		public static function indexCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_indexCampoLocal;
		}
		
		public static function indexCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_indexCampoLocal;
		}
		
		public static function createCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_createCampoLocal;
		}
		
		public static function editCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_editCampoLocal;
		}
		
		public static function destroyCampoLocal(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_destroyCampoLocal;
		}
		
		public static function indexSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_indexSC;
		}
		
		public static function vistacrearSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_vistacrearSC;
		}
		
		public static function vistaReordenSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_vistaReordenSC;
		}
		
		public static function mostrarProveedorSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_mostrarProveedoresSC;
		}
		
		public static function editSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_editSC;
		}
		
		public static function detalleSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_indexSC;
		}
		
		public static function search_indexSC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_search_indexSC;
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
		
		public static function VCCCMCC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VCCCMCC;
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
		
		public static function VHIMECC(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VHIMECC;
		}
		
		public static function search_indexCOT(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_search_indexCOT;
		}
		
		public static function VistaTodasOrdenesCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VistaTodasOrdenesCompra;
		}
		
		public static function VistaDetallesOrdenCompra(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VistaDetallesOrdenCompra;
		}
		
		public static function VistaNuevaOrdenCompra()){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_VistaNuevaOrdenCompra;
		}
		
		public static function DetallesOrdenCompra()){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_COM_DetallesOrdenCompra;
		}

		//Inventario

		//Contabilidad

	}

?>