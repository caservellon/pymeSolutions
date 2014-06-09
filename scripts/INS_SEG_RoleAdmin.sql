/*
-- Query: SELECT * FROM pymeERP.SEG_Roles
LIMIT 0, 1000

-- Date: 2014-06-09 11:14
*/
INSERT INTO `SEG_Roles` (`SEG_Roles_ID`,`SEG_Roles_Nombre`,`SEG_Roles_FechaCreacion`,`SEG_Roles_FechaModificacion`,`SEG_Roles_UsuarioCreacion`,`SEG_Roles_UsuarioModificacion`,`SEG_Roles_Estado`,`SEG_Roles_Administrador`,`SEG_Roles_CRM_CrearPersona`,`SEG_Roles_CRM_VerPersona`,`SEG_Roles_CRM_EditarPersona`,`SEG_Roles_CRM_EliminarPersona`,`SEG_Roles_CRM_CrearEmpresa`,`SEG_Roles_CRM_VerEmpresa`,`SEG_Roles_CRM_EditarEmpresa`,`SEG_Roles_CRM_EliminarEmpresa`,`SEG_Roles_CRM_Configuracion`,`SEG_Roles_CRM_BuscarPersona`,`SEG_Roles_CRM_BuscarEmpresa`,`SEG_Roles_COM_NuevoEstadoOrdenCompra`,`SEG_Roles_COM_GuardarEstadoOrden`,`SEG_Roles_COM_ListaEstadoOrden`,`SEG_Roles_COM_EditarEstadoOrden`,`SEG_Roles_COM_ModificarTransicionesEstado`,`SEG_Roles_COM_detalleTransicionesEstado`,`SEG_Roles_COM_nuevaTransicionEstado`,`SEG_Roles_COM_detalleNuevaTransicion`,`SEG_Roles_COM_GuardarTransicionEstado`,`SEG_Roles_COM_ActualizarTransicionEstado`,`SEG_Roles_COM_MostrarOrdenCompra`,`SEG_Roles_COM_nuevaOrdenCompraSinCotizacion`,`SEG_Roles_COM_DetalleNuevaOrdenCompras`,`SEG_Roles_COM_GuardarNuevaOrdenCompra`,`SEG_Roles_COM_nuevaOrdenCompraConCotizacion`,`SEG_Roles_COM_CompararCotizaciones`,`SEG_Roles_COM_detalleNuevaOrdenCompraConCotizacion`,`SEG_Roles_COM_guardarNuevaOrdenCompraConCotizacion`,`SEG_Roles_COM_ListarAutorizarOrdenCompra`,`SEG_Roles_COM_detalleAutorizarOrdenCompra`,`SEG_Roles_COM_guardarAutorizarOrdenCompra`,`SEG_Roles_COM_cancelarOrdenCompra`,`SEG_Roles_COM_ListaAdministrarOrdenCompra`,`SEG_Roles_COM_AdministrarDetalleOrdenCompra`,`SEG_Roles_COM_guardarAdministrarOrdenCompra`,`SEG_Roles_COM_ListarHistorialOrdenes`,`SEG_Roles_COM_detalleHistorialOrden`,`SEG_Roles_COM_ListarPagoOrdenCompra`,`SEG_Roles_COM_DetallePagoOrdenCompra`,`SEG_Roles_COM_GuardarPagoOrdenPago`,`SEG_Roles_COM_VerPlanPagoOrdenCompra`,`SEG_Roles_COM_detallePlanPagoOrdenCompra`,`SEG_Roles_COM_detalleDevolucionCompras`,`SEG_Roles_COM_ListaDevolucionCompras`,`SEG_Roles_COM_GuardarDevolucionCompras`,`SEG_Roles_COM_MostrarImprimirOrdenCompra`,`SEG_Roles_COM_ImprimirOrdenCompra`,`SEG_Roles_COM_VerCampoLocal`,`SEG_Roles_COM_AgregarCampoLocal`,`SEG_Roles_COM_EditarCampoLocal`,`SEG_Roles_COM_EliminarCampoLocal`,`SEG_Roles_COM_MostrarSolicitudCotizacion`,`SEG_Roles_COM_VerCualquierProductoSC`,`SEG_Roles_COM_VerProductoReordenSC`,`SEG_Roles_COM_crearSolicitudCotizacion`,`SEG_Roles_COM_EditarSolicitudCotizacion`,`SEG_Roles_COM_DetalleSolicitudCotizacion`,`SEG_Roles_COM_ImprimirSolicitudCotizacion`,`SEG_Roles_COM_ImpresionSolicitudCotizacion`,`SEG_Roles_COM_VistaMenuCotizaciones`,`SEG_Roles_COM_CapturarCotizacion`,`SEG_Roles_COM_VistaCapturarCotizacion`,`SEG_Roles_COM_VistaCapturarCotizacionCapturar`,`SEG_Roles_COM_CapturarCotizacionCapturar`,`SEG_Roles_COM_VistaTodasCotizaciones`,`SEG_Roles_COM_TodasCotizaciones`,`SEG_Roles_COM_VistaDetallesCotizacion`,`SEG_Roles_COM_VistaHabilitarInhabilitar`,`SEG_Roles_COM_DetallesCotizacion`,`SEG_Roles_COM_HabilitarInhabilitar`,`SEG_Roles_COM_VistaTodasOrdenesCompra`,`SEG_Roles_COM_VistaDetallesOrdenCompra`,`SEG_Roles_COM_VistaNuevaOrdenCompra`,`SEG_Roles_COM_DetallesOrdenCompra`,`SEG_Roles_CON_ListarCatalogoContable`,`SEG_Roles_CON_EditarCuenta`,`SEG_Roles_CON_AgregarCuenta`,`SEG_Roles_CON_ListarSubcuentas`,`SEG_Roles_CON_AgregarSubcuentas`,`SEG_Roles_CON_ListarPeriodosContables`,`SEG_Roles_CON_AgregarPeriodoContable`,`SEG_Roles_CON_HabilitarDeshabilitarPeriodosContables`,`SEG_Roles_CON_EditarPeriodoContable`,`SEG_Roles_CON_AgregarUnidadesMonetarias`,`SEG_Roles_CON_EditarUnidadesMonetarias`,`SEG_Roles_CON_ListarUnidadesMonetarias`,`SEG_Roles_CON_ConfigurarMotivosDeInventario`,`SEG_Roles_CON_ListarConceptosDeTransaccionesAutomaticas`,`SEG_Roles_CON_EditarConceptosDeTransaccionesAutomaticas`,`SEG_Roles_CON_VerLibroDiario`,`SEG_Roles_CON_AgregarMotivoAsientosManuales`,`SEG_Roles_CON_GenerarCierrePeriodo`,`SEG_Roles_CON_VerPagos`,`SEG_Roles_CON_VerReembolso`,`SEG_Roles_CON_RealizarReembolso`,`SEG_Roles_CON_VerEstadosFinancieros`,`SEG_Roles_CON_ListarMotivosDeInventario`,`SEG_Roles_CON_CrearAsientosContable`,`SEG_Roles_CON_VerROI`,`SEG_Roles_CON_VerFlujoEfectivo`,`SEG_Roles_CON_VerPuntoEquilibrio`,`SEG_Roles_CON_RevertirAsientosContables`,`SEG_Roles_CON_RealizarPagos`,`SEG_Roles_CON_GenerarROI`,`SEG_Roles_CON_GenerarFlujoEfectivo`,`SEG_Roles_CON_GenerarPuntoEquilibrio`,`SEG_Roles_INV_crearProducto`,`SEG_Roles_INV_editarProducto`,`SEG_Roles_INV_eliminarProducto`,`SEG_Roles_INV_listarProducto`,`SEG_Roles_INV_crearProveedor`,`SEG_Roles_INV_editarProveedor`,`SEG_Roles_INV_eliminarProveedor`,`SEG_Roles_INV_listarProveedor`,`SEG_Roles_INV_crearAtributo`,`SEG_Roles_INV_editarAtributo`,`SEG_Roles_INV_eliminarAtributo`,`SEG_Roles_INV_listarAtributo`,`SEG_Roles_INV_crearCategoria`,`SEG_Roles_INV_editarCategoria`,`SEG_Roles_INV_eliminarCategoria`,`SEG_Roles_INV_listarCategoria`,`SEG_Roles_INV_crearUnidadMedida`,`SEG_Roles_INV_editarUnidadMedida`,`SEG_Roles_INV_eliminarUnidadMedida`,`SEG_Roles_INV_listarUnidadMedida`,`SEG_Roles_INV_crearCiudad`,`SEG_Roles_INV_editarCiudad`,`SEG_Roles_INV_eliminarCiudad`,`SEG_Roles_INV_listarCiudad`,`SEG_Roles_INV_crearHorario`,`SEG_Roles_INV_editarHorario`,`SEG_Roles_INV_eliminarHorario`,`SEG_Roles_INV_listarHorario`,`SEG_Roles_INV_crearFormaPago`,`SEG_Roles_INV_eliminarFormaPago`,`SEG_Roles_INV_listarFormaPago`,`SEG_Roles_INV_registrarEntradaInventario`,`SEG_Roles_INV_registrarSalidaInventario`,`SEG_Roles_INV_listarEntradaInventario`,`SEG_Roles_INV_listarSalidaInventario`,`SEG_Roles_INV_crearMotivoMovimientoInventario`,`SEG_Roles_INV_editarMotivoMovimientoInventario`,`SEG_Roles_INV_eliminarMotivoMovimientoInventario`,`SEG_Roles_INV_listarMotivoMovimientoInventario`,`SEG_Roles_INV_crearCampoLocal`,`SEG_Roles_INV_editarCampoLocal`,`SEG_Roles_INV_eliminarCampoLocal`,`SEG_Roles_INV_listarCampoLocal`,`SEG_Roles_INV_agregarProveedorProducto`,`SEG_Roles_INV_quitarProveedorProducto`,`SEG_Roles_INV_cambiarEstadoOrdenCompra`,`SEG_Roles_INV_agregarProveedorFormaPago`,`SEG_Roles_INV_quitarProveedorFormaPago`,`SEG_Roles_VEN_CrearCaja`,`SEG_Roles_VEN_AbrirCaja`,`SEG_Roles_VEN_BorrarCaja`,`SEG_Roles_VEN_EditarCaja`,`SEG_Roles_VEN_VerCaja`,`SEG_Roles_VEN_CrearPeriodoDeCierre`,`SEG_Roles_VEN_BorrarPeriodoDeCierre`,`SEG_Roles_VEN_EditarPeriodoDeCierre`,`SEG_Roles_VEN_VerPeriodoDeCierre`,`SEG_Roles_VEN_AbrirAperturaDeCaja`,`SEG_Roles_VEN_CerrarAperturaDeCaja`,`SEG_Roles_VEN_VerAperturaDeCierre`,`SEG_Roles_VEN_CrearDescuentos`,`SEG_Roles_VEN_EditarDescuentos`,`SEG_Roles_VEN_EliminarDescuentos`,`SEG_Roles_VEN_VerDescuentos`,`SEG_Roles_VEN_ConfigurarVentas`,`SEG_Roles_VEN_GestionarVentas`,`SEG_Roles_VEN_EliminarProductoDeVentas`,`SEG_Roles_VEN_EditarCantidadDeVentas`,`SEG_Roles_VEN_GuardarVentas`,`SEG_Roles_VEN_ListarVentas`,`SEG_Roles_VEN_VerVentas`,`SEG_Roles_VEN_IniciarDevolucion`,`SEG_Roles_VEN_AutorizarDevolucion`,`SEG_Roles_VEN_ListarDevoluciones`,`SEG_Roles_VEN_DetalleDeVentas`,`SEG_Roles_VEN_DetalleDeDevolucion`,`SEG_Roles_INV_ListarHistorial`,`SEG_Roles_INV_VerMenuMovimiento`) VALUES (1,'Administrador',NULL,NULL,NULL,NULL,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
INSERT INTO `SEG_Roles` (`SEG_Roles_ID`,`SEG_Roles_Nombre`,`SEG_Roles_FechaCreacion`,`SEG_Roles_FechaModificacion`,`SEG_Roles_UsuarioCreacion`,`SEG_Roles_UsuarioModificacion`,`SEG_Roles_Estado`,`SEG_Roles_Administrador`,`SEG_Roles_CRM_CrearPersona`,`SEG_Roles_CRM_VerPersona`,`SEG_Roles_CRM_EditarPersona`,`SEG_Roles_CRM_EliminarPersona`,`SEG_Roles_CRM_CrearEmpresa`,`SEG_Roles_CRM_VerEmpresa`,`SEG_Roles_CRM_EditarEmpresa`,`SEG_Roles_CRM_EliminarEmpresa`,`SEG_Roles_CRM_Configuracion`,`SEG_Roles_CRM_BuscarPersona`,`SEG_Roles_CRM_BuscarEmpresa`,`SEG_Roles_COM_NuevoEstadoOrdenCompra`,`SEG_Roles_COM_GuardarEstadoOrden`,`SEG_Roles_COM_ListaEstadoOrden`,`SEG_Roles_COM_EditarEstadoOrden`,`SEG_Roles_COM_ModificarTransicionesEstado`,`SEG_Roles_COM_detalleTransicionesEstado`,`SEG_Roles_COM_nuevaTransicionEstado`,`SEG_Roles_COM_detalleNuevaTransicion`,`SEG_Roles_COM_GuardarTransicionEstado`,`SEG_Roles_COM_ActualizarTransicionEstado`,`SEG_Roles_COM_MostrarOrdenCompra`,`SEG_Roles_COM_nuevaOrdenCompraSinCotizacion`,`SEG_Roles_COM_DetalleNuevaOrdenCompras`,`SEG_Roles_COM_GuardarNuevaOrdenCompra`,`SEG_Roles_COM_nuevaOrdenCompraConCotizacion`,`SEG_Roles_COM_CompararCotizaciones`,`SEG_Roles_COM_detalleNuevaOrdenCompraConCotizacion`,`SEG_Roles_COM_guardarNuevaOrdenCompraConCotizacion`,`SEG_Roles_COM_ListarAutorizarOrdenCompra`,`SEG_Roles_COM_detalleAutorizarOrdenCompra`,`SEG_Roles_COM_guardarAutorizarOrdenCompra`,`SEG_Roles_COM_cancelarOrdenCompra`,`SEG_Roles_COM_ListaAdministrarOrdenCompra`,`SEG_Roles_COM_AdministrarDetalleOrdenCompra`,`SEG_Roles_COM_guardarAdministrarOrdenCompra`,`SEG_Roles_COM_ListarHistorialOrdenes`,`SEG_Roles_COM_detalleHistorialOrden`,`SEG_Roles_COM_ListarPagoOrdenCompra`,`SEG_Roles_COM_DetallePagoOrdenCompra`,`SEG_Roles_COM_GuardarPagoOrdenPago`,`SEG_Roles_COM_VerPlanPagoOrdenCompra`,`SEG_Roles_COM_detallePlanPagoOrdenCompra`,`SEG_Roles_COM_detalleDevolucionCompras`,`SEG_Roles_COM_ListaDevolucionCompras`,`SEG_Roles_COM_GuardarDevolucionCompras`,`SEG_Roles_COM_MostrarImprimirOrdenCompra`,`SEG_Roles_COM_ImprimirOrdenCompra`,`SEG_Roles_COM_VerCampoLocal`,`SEG_Roles_COM_AgregarCampoLocal`,`SEG_Roles_COM_EditarCampoLocal`,`SEG_Roles_COM_EliminarCampoLocal`,`SEG_Roles_COM_MostrarSolicitudCotizacion`,`SEG_Roles_COM_VerCualquierProductoSC`,`SEG_Roles_COM_VerProductoReordenSC`,`SEG_Roles_COM_crearSolicitudCotizacion`,`SEG_Roles_COM_EditarSolicitudCotizacion`,`SEG_Roles_COM_DetalleSolicitudCotizacion`,`SEG_Roles_COM_ImprimirSolicitudCotizacion`,`SEG_Roles_COM_ImpresionSolicitudCotizacion`,`SEG_Roles_COM_VistaMenuCotizaciones`,`SEG_Roles_COM_CapturarCotizacion`,`SEG_Roles_COM_VistaCapturarCotizacion`,`SEG_Roles_COM_VistaCapturarCotizacionCapturar`,`SEG_Roles_COM_CapturarCotizacionCapturar`,`SEG_Roles_COM_VistaTodasCotizaciones`,`SEG_Roles_COM_TodasCotizaciones`,`SEG_Roles_COM_VistaDetallesCotizacion`,`SEG_Roles_COM_VistaHabilitarInhabilitar`,`SEG_Roles_COM_DetallesCotizacion`,`SEG_Roles_COM_HabilitarInhabilitar`,`SEG_Roles_COM_VistaTodasOrdenesCompra`,`SEG_Roles_COM_VistaDetallesOrdenCompra`,`SEG_Roles_COM_VistaNuevaOrdenCompra`,`SEG_Roles_COM_DetallesOrdenCompra`,`SEG_Roles_CON_ListarCatalogoContable`,`SEG_Roles_CON_EditarCuenta`,`SEG_Roles_CON_AgregarCuenta`,`SEG_Roles_CON_ListarSubcuentas`,`SEG_Roles_CON_AgregarSubcuentas`,`SEG_Roles_CON_ListarPeriodosContables`,`SEG_Roles_CON_AgregarPeriodoContable`,`SEG_Roles_CON_HabilitarDeshabilitarPeriodosContables`,`SEG_Roles_CON_EditarPeriodoContable`,`SEG_Roles_CON_AgregarUnidadesMonetarias`,`SEG_Roles_CON_EditarUnidadesMonetarias`,`SEG_Roles_CON_ListarUnidadesMonetarias`,`SEG_Roles_CON_ConfigurarMotivosDeInventario`,`SEG_Roles_CON_ListarConceptosDeTransaccionesAutomaticas`,`SEG_Roles_CON_EditarConceptosDeTransaccionesAutomaticas`,`SEG_Roles_CON_VerLibroDiario`,`SEG_Roles_CON_AgregarMotivoAsientosManuales`,`SEG_Roles_CON_GenerarCierrePeriodo`,`SEG_Roles_CON_VerPagos`,`SEG_Roles_CON_VerReembolso`,`SEG_Roles_CON_RealizarReembolso`,`SEG_Roles_CON_VerEstadosFinancieros`,`SEG_Roles_CON_ListarMotivosDeInventario`,`SEG_Roles_CON_CrearAsientosContable`,`SEG_Roles_CON_VerROI`,`SEG_Roles_CON_VerFlujoEfectivo`,`SEG_Roles_CON_VerPuntoEquilibrio`,`SEG_Roles_CON_RevertirAsientosContables`,`SEG_Roles_CON_RealizarPagos`,`SEG_Roles_CON_GenerarROI`,`SEG_Roles_CON_GenerarFlujoEfectivo`,`SEG_Roles_CON_GenerarPuntoEquilibrio`,`SEG_Roles_INV_crearProducto`,`SEG_Roles_INV_editarProducto`,`SEG_Roles_INV_eliminarProducto`,`SEG_Roles_INV_listarProducto`,`SEG_Roles_INV_crearProveedor`,`SEG_Roles_INV_editarProveedor`,`SEG_Roles_INV_eliminarProveedor`,`SEG_Roles_INV_listarProveedor`,`SEG_Roles_INV_crearAtributo`,`SEG_Roles_INV_editarAtributo`,`SEG_Roles_INV_eliminarAtributo`,`SEG_Roles_INV_listarAtributo`,`SEG_Roles_INV_crearCategoria`,`SEG_Roles_INV_editarCategoria`,`SEG_Roles_INV_eliminarCategoria`,`SEG_Roles_INV_listarCategoria`,`SEG_Roles_INV_crearUnidadMedida`,`SEG_Roles_INV_editarUnidadMedida`,`SEG_Roles_INV_eliminarUnidadMedida`,`SEG_Roles_INV_listarUnidadMedida`,`SEG_Roles_INV_crearCiudad`,`SEG_Roles_INV_editarCiudad`,`SEG_Roles_INV_eliminarCiudad`,`SEG_Roles_INV_listarCiudad`,`SEG_Roles_INV_crearHorario`,`SEG_Roles_INV_editarHorario`,`SEG_Roles_INV_eliminarHorario`,`SEG_Roles_INV_listarHorario`,`SEG_Roles_INV_crearFormaPago`,`SEG_Roles_INV_eliminarFormaPago`,`SEG_Roles_INV_listarFormaPago`,`SEG_Roles_INV_registrarEntradaInventario`,`SEG_Roles_INV_registrarSalidaInventario`,`SEG_Roles_INV_listarEntradaInventario`,`SEG_Roles_INV_listarSalidaInventario`,`SEG_Roles_INV_crearMotivoMovimientoInventario`,`SEG_Roles_INV_editarMotivoMovimientoInventario`,`SEG_Roles_INV_eliminarMotivoMovimientoInventario`,`SEG_Roles_INV_listarMotivoMovimientoInventario`,`SEG_Roles_INV_crearCampoLocal`,`SEG_Roles_INV_editarCampoLocal`,`SEG_Roles_INV_eliminarCampoLocal`,`SEG_Roles_INV_listarCampoLocal`,`SEG_Roles_INV_agregarProveedorProducto`,`SEG_Roles_INV_quitarProveedorProducto`,`SEG_Roles_INV_cambiarEstadoOrdenCompra`,`SEG_Roles_INV_agregarProveedorFormaPago`,`SEG_Roles_INV_quitarProveedorFormaPago`,`SEG_Roles_VEN_CrearCaja`,`SEG_Roles_VEN_AbrirCaja`,`SEG_Roles_VEN_BorrarCaja`,`SEG_Roles_VEN_EditarCaja`,`SEG_Roles_VEN_VerCaja`,`SEG_Roles_VEN_CrearPeriodoDeCierre`,`SEG_Roles_VEN_BorrarPeriodoDeCierre`,`SEG_Roles_VEN_EditarPeriodoDeCierre`,`SEG_Roles_VEN_VerPeriodoDeCierre`,`SEG_Roles_VEN_AbrirAperturaDeCaja`,`SEG_Roles_VEN_CerrarAperturaDeCaja`,`SEG_Roles_VEN_VerAperturaDeCierre`,`SEG_Roles_VEN_CrearDescuentos`,`SEG_Roles_VEN_EditarDescuentos`,`SEG_Roles_VEN_EliminarDescuentos`,`SEG_Roles_VEN_VerDescuentos`,`SEG_Roles_VEN_ConfigurarVentas`,`SEG_Roles_VEN_GestionarVentas`,`SEG_Roles_VEN_EliminarProductoDeVentas`,`SEG_Roles_VEN_EditarCantidadDeVentas`,`SEG_Roles_VEN_GuardarVentas`,`SEG_Roles_VEN_ListarVentas`,`SEG_Roles_VEN_VerVentas`,`SEG_Roles_VEN_IniciarDevolucion`,`SEG_Roles_VEN_AutorizarDevolucion`,`SEG_Roles_VEN_ListarDevoluciones`,`SEG_Roles_VEN_DetalleDeVentas`,`SEG_Roles_VEN_DetalleDeDevolucion`,`SEG_Roles_INV_ListarHistorial`,`SEG_Roles_INV_VerMenuMovimiento`) VALUES (2,'Jefe de Inventario',NULL,NULL,NULL,NULL,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0,0,0,1,1,1,1,1,1,1,1,1,1,1,1,1,0,0,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1);
INSERT INTO `SEG_Roles` (`SEG_Roles_ID`,`SEG_Roles_Nombre`,`SEG_Roles_FechaCreacion`,`SEG_Roles_FechaModificacion`,`SEG_Roles_UsuarioCreacion`,`SEG_Roles_UsuarioModificacion`,`SEG_Roles_Estado`,`SEG_Roles_Administrador`,`SEG_Roles_CRM_CrearPersona`,`SEG_Roles_CRM_VerPersona`,`SEG_Roles_CRM_EditarPersona`,`SEG_Roles_CRM_EliminarPersona`,`SEG_Roles_CRM_CrearEmpresa`,`SEG_Roles_CRM_VerEmpresa`,`SEG_Roles_CRM_EditarEmpresa`,`SEG_Roles_CRM_EliminarEmpresa`,`SEG_Roles_CRM_Configuracion`,`SEG_Roles_CRM_BuscarPersona`,`SEG_Roles_CRM_BuscarEmpresa`,`SEG_Roles_COM_NuevoEstadoOrdenCompra`,`SEG_Roles_COM_GuardarEstadoOrden`,`SEG_Roles_COM_ListaEstadoOrden`,`SEG_Roles_COM_EditarEstadoOrden`,`SEG_Roles_COM_ModificarTransicionesEstado`,`SEG_Roles_COM_detalleTransicionesEstado`,`SEG_Roles_COM_nuevaTransicionEstado`,`SEG_Roles_COM_detalleNuevaTransicion`,`SEG_Roles_COM_GuardarTransicionEstado`,`SEG_Roles_COM_ActualizarTransicionEstado`,`SEG_Roles_COM_MostrarOrdenCompra`,`SEG_Roles_COM_nuevaOrdenCompraSinCotizacion`,`SEG_Roles_COM_DetalleNuevaOrdenCompras`,`SEG_Roles_COM_GuardarNuevaOrdenCompra`,`SEG_Roles_COM_nuevaOrdenCompraConCotizacion`,`SEG_Roles_COM_CompararCotizaciones`,`SEG_Roles_COM_detalleNuevaOrdenCompraConCotizacion`,`SEG_Roles_COM_guardarNuevaOrdenCompraConCotizacion`,`SEG_Roles_COM_ListarAutorizarOrdenCompra`,`SEG_Roles_COM_detalleAutorizarOrdenCompra`,`SEG_Roles_COM_guardarAutorizarOrdenCompra`,`SEG_Roles_COM_cancelarOrdenCompra`,`SEG_Roles_COM_ListaAdministrarOrdenCompra`,`SEG_Roles_COM_AdministrarDetalleOrdenCompra`,`SEG_Roles_COM_guardarAdministrarOrdenCompra`,`SEG_Roles_COM_ListarHistorialOrdenes`,`SEG_Roles_COM_detalleHistorialOrden`,`SEG_Roles_COM_ListarPagoOrdenCompra`,`SEG_Roles_COM_DetallePagoOrdenCompra`,`SEG_Roles_COM_GuardarPagoOrdenPago`,`SEG_Roles_COM_VerPlanPagoOrdenCompra`,`SEG_Roles_COM_detallePlanPagoOrdenCompra`,`SEG_Roles_COM_detalleDevolucionCompras`,`SEG_Roles_COM_ListaDevolucionCompras`,`SEG_Roles_COM_GuardarDevolucionCompras`,`SEG_Roles_COM_MostrarImprimirOrdenCompra`,`SEG_Roles_COM_ImprimirOrdenCompra`,`SEG_Roles_COM_VerCampoLocal`,`SEG_Roles_COM_AgregarCampoLocal`,`SEG_Roles_COM_EditarCampoLocal`,`SEG_Roles_COM_EliminarCampoLocal`,`SEG_Roles_COM_MostrarSolicitudCotizacion`,`SEG_Roles_COM_VerCualquierProductoSC`,`SEG_Roles_COM_VerProductoReordenSC`,`SEG_Roles_COM_crearSolicitudCotizacion`,`SEG_Roles_COM_EditarSolicitudCotizacion`,`SEG_Roles_COM_DetalleSolicitudCotizacion`,`SEG_Roles_COM_ImprimirSolicitudCotizacion`,`SEG_Roles_COM_ImpresionSolicitudCotizacion`,`SEG_Roles_COM_VistaMenuCotizaciones`,`SEG_Roles_COM_CapturarCotizacion`,`SEG_Roles_COM_VistaCapturarCotizacion`,`SEG_Roles_COM_VistaCapturarCotizacionCapturar`,`SEG_Roles_COM_CapturarCotizacionCapturar`,`SEG_Roles_COM_VistaTodasCotizaciones`,`SEG_Roles_COM_TodasCotizaciones`,`SEG_Roles_COM_VistaDetallesCotizacion`,`SEG_Roles_COM_VistaHabilitarInhabilitar`,`SEG_Roles_COM_DetallesCotizacion`,`SEG_Roles_COM_HabilitarInhabilitar`,`SEG_Roles_COM_VistaTodasOrdenesCompra`,`SEG_Roles_COM_VistaDetallesOrdenCompra`,`SEG_Roles_COM_VistaNuevaOrdenCompra`,`SEG_Roles_COM_DetallesOrdenCompra`,`SEG_Roles_CON_ListarCatalogoContable`,`SEG_Roles_CON_EditarCuenta`,`SEG_Roles_CON_AgregarCuenta`,`SEG_Roles_CON_ListarSubcuentas`,`SEG_Roles_CON_AgregarSubcuentas`,`SEG_Roles_CON_ListarPeriodosContables`,`SEG_Roles_CON_AgregarPeriodoContable`,`SEG_Roles_CON_HabilitarDeshabilitarPeriodosContables`,`SEG_Roles_CON_EditarPeriodoContable`,`SEG_Roles_CON_AgregarUnidadesMonetarias`,`SEG_Roles_CON_EditarUnidadesMonetarias`,`SEG_Roles_CON_ListarUnidadesMonetarias`,`SEG_Roles_CON_ConfigurarMotivosDeInventario`,`SEG_Roles_CON_ListarConceptosDeTransaccionesAutomaticas`,`SEG_Roles_CON_EditarConceptosDeTransaccionesAutomaticas`,`SEG_Roles_CON_VerLibroDiario`,`SEG_Roles_CON_AgregarMotivoAsientosManuales`,`SEG_Roles_CON_GenerarCierrePeriodo`,`SEG_Roles_CON_VerPagos`,`SEG_Roles_CON_VerReembolso`,`SEG_Roles_CON_RealizarReembolso`,`SEG_Roles_CON_VerEstadosFinancieros`,`SEG_Roles_CON_ListarMotivosDeInventario`,`SEG_Roles_CON_CrearAsientosContable`,`SEG_Roles_CON_VerROI`,`SEG_Roles_CON_VerFlujoEfectivo`,`SEG_Roles_CON_VerPuntoEquilibrio`,`SEG_Roles_CON_RevertirAsientosContables`,`SEG_Roles_CON_RealizarPagos`,`SEG_Roles_CON_GenerarROI`,`SEG_Roles_CON_GenerarFlujoEfectivo`,`SEG_Roles_CON_GenerarPuntoEquilibrio`,`SEG_Roles_INV_crearProducto`,`SEG_Roles_INV_editarProducto`,`SEG_Roles_INV_eliminarProducto`,`SEG_Roles_INV_listarProducto`,`SEG_Roles_INV_crearProveedor`,`SEG_Roles_INV_editarProveedor`,`SEG_Roles_INV_eliminarProveedor`,`SEG_Roles_INV_listarProveedor`,`SEG_Roles_INV_crearAtributo`,`SEG_Roles_INV_editarAtributo`,`SEG_Roles_INV_eliminarAtributo`,`SEG_Roles_INV_listarAtributo`,`SEG_Roles_INV_crearCategoria`,`SEG_Roles_INV_editarCategoria`,`SEG_Roles_INV_eliminarCategoria`,`SEG_Roles_INV_listarCategoria`,`SEG_Roles_INV_crearUnidadMedida`,`SEG_Roles_INV_editarUnidadMedida`,`SEG_Roles_INV_eliminarUnidadMedida`,`SEG_Roles_INV_listarUnidadMedida`,`SEG_Roles_INV_crearCiudad`,`SEG_Roles_INV_editarCiudad`,`SEG_Roles_INV_eliminarCiudad`,`SEG_Roles_INV_listarCiudad`,`SEG_Roles_INV_crearHorario`,`SEG_Roles_INV_editarHorario`,`SEG_Roles_INV_eliminarHorario`,`SEG_Roles_INV_listarHorario`,`SEG_Roles_INV_crearFormaPago`,`SEG_Roles_INV_eliminarFormaPago`,`SEG_Roles_INV_listarFormaPago`,`SEG_Roles_INV_registrarEntradaInventario`,`SEG_Roles_INV_registrarSalidaInventario`,`SEG_Roles_INV_listarEntradaInventario`,`SEG_Roles_INV_listarSalidaInventario`,`SEG_Roles_INV_crearMotivoMovimientoInventario`,`SEG_Roles_INV_editarMotivoMovimientoInventario`,`SEG_Roles_INV_eliminarMotivoMovimientoInventario`,`SEG_Roles_INV_listarMotivoMovimientoInventario`,`SEG_Roles_INV_crearCampoLocal`,`SEG_Roles_INV_editarCampoLocal`,`SEG_Roles_INV_eliminarCampoLocal`,`SEG_Roles_INV_listarCampoLocal`,`SEG_Roles_INV_agregarProveedorProducto`,`SEG_Roles_INV_quitarProveedorProducto`,`SEG_Roles_INV_cambiarEstadoOrdenCompra`,`SEG_Roles_INV_agregarProveedorFormaPago`,`SEG_Roles_INV_quitarProveedorFormaPago`,`SEG_Roles_VEN_CrearCaja`,`SEG_Roles_VEN_AbrirCaja`,`SEG_Roles_VEN_BorrarCaja`,`SEG_Roles_VEN_EditarCaja`,`SEG_Roles_VEN_VerCaja`,`SEG_Roles_VEN_CrearPeriodoDeCierre`,`SEG_Roles_VEN_BorrarPeriodoDeCierre`,`SEG_Roles_VEN_EditarPeriodoDeCierre`,`SEG_Roles_VEN_VerPeriodoDeCierre`,`SEG_Roles_VEN_AbrirAperturaDeCaja`,`SEG_Roles_VEN_CerrarAperturaDeCaja`,`SEG_Roles_VEN_VerAperturaDeCierre`,`SEG_Roles_VEN_CrearDescuentos`,`SEG_Roles_VEN_EditarDescuentos`,`SEG_Roles_VEN_EliminarDescuentos`,`SEG_Roles_VEN_VerDescuentos`,`SEG_Roles_VEN_ConfigurarVentas`,`SEG_Roles_VEN_GestionarVentas`,`SEG_Roles_VEN_EliminarProductoDeVentas`,`SEG_Roles_VEN_EditarCantidadDeVentas`,`SEG_Roles_VEN_GuardarVentas`,`SEG_Roles_VEN_ListarVentas`,`SEG_Roles_VEN_VerVentas`,`SEG_Roles_VEN_IniciarDevolucion`,`SEG_Roles_VEN_AutorizarDevolucion`,`SEG_Roles_VEN_ListarDevoluciones`,`SEG_Roles_VEN_DetalleDeVentas`,`SEG_Roles_VEN_DetalleDeDevolucion`,`SEG_Roles_INV_ListarHistorial`,`SEG_Roles_INV_VerMenuMovimiento`) VALUES (3,'Oficial de Inventario',NULL,NULL,NULL,NULL,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,1,1,1,1,1,0,0,0,1,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1);
