
-- -----------------------------------------------------
-- Table `pymeERP`.`SEG_Roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`SEG_Roles` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`SEG_Roles` (
  `SEG_Roles_ID` INT NOT NULL AUTO_INCREMENT,
  `SEG_Roles_Nombre` VARCHAR(45) NULL,
  `SEG_Roles_FechaCreacion` DATETIME NULL,
  `SEG_Roles_FechaModificacion` DATETIME NULL,
  `SEG_Roles_UsuarioCreacion` VARCHAR(45) NULL,
  `SEG_Roles_UsuarioModificacion` VARCHAR(45) NULL,
  `SEG_Roles_Estado` TINYINT(1) NULL,
  `SEG_Roles_CRM_CrearPersona` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CRM_VerPersona` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CRM_EditarPersona` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CRM_EliminarPersona` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CRM_CrearEmpresa` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CRM_VerEmpresa` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CRM_EditarEmpresa` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CRM_EliminarEmpresa` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CRM_Configuracion` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_NuevoEstadoOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_AlmacenarEstadoOrden` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_IndexEstadoOrden` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_EditEstadoOrden` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_ModificarTransicionesEstado` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_detalleTransicionesEstado` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_nuevaTransicionEstado` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_detalleNuevaTransicion` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_GuardarTransicionEstado` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_ActualizarTransicionEstado` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_indexOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_nuevaOrdenCompraSinCotizacion` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_DetalleNuevaOrdenCompras` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_GuardarNuevaOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_nuevaOrdenCompraConCotizacion` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_CompararCotizaciones` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_detalleNuevaOrdenCompraConCotizacion` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_guardarNuevaOrdenCompraConCotizacion` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_ListarAutorizarOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_detalleAutorizarOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_guardarAutorizarOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_cancelarOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_ListaAdministrarOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_AdministrarDetalleOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_guardarAdministrarOC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_ListarHistorialOrdenes` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_detalleHistorialOrden` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_ListarPagoOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_DetallePagoOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_GuardarPagoOrdenPago` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_VerPlanPagoOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_detallePlanPagoOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_detalleDevolucionCompras` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_ListaDevolucionCompras` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_GuardarDevolucionCompras` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_indexImprimirOC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_ImprimirOC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_search_index` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_Search_cotizaciones` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_indexCampoLocal` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_createCampoLocal` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_editCampoLocal` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_destroyCampoLocal` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_indexSC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_vistaCrearSC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_vistaReordenSC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_crearSC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_editSC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_search_indexSC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_buscaCualquierProveedorSC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_buscaCualquierProductoSC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_detalleSC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_indexImprimirSC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_ImprimirSC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_VistaMenuCotizaciones` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_CapturarCotizacion` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_VistaCapturarCotizacion` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_VistaCapturarCotizacionCapturar` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_CapturarCotizacionCapturar` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_VCCCMCC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_VistaTodasCotizaciones` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_TodasCotizaciones` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_VistaDetallesCotizacion` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_VistaHabilitarInhabilitar` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_VHIMECC` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_DetallesCotizacion` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_HabilitarInhabilitar` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_search_indexCOT` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_VistaTodasOrdenesCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_VistaDetallesOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_VistaNuevaOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_COM_DetallesOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_AgregarAsiento` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_AgregarMotivo` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_LibroDiario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_RevertirAsiento` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_FiltrarAsientos` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_CierreDePeriodo` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerConfiguracion` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerCatalogoContable` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_AgregarCuenta` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_EditarCeunta` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_ListarSubcuentas` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_AgregarSubcuentas` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerPeriodoContable` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_AgregarPeriodoContable` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_EditarPeriodoContable` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerUnidadesMonetarias` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_AgregarUnidadesMonetarias` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_EditarUnidadesMonetarias` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerDocumnetosContables` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerEstadoResultados` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerCapitalContable` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerBalanceGeneral` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerBalanzaComprobacion` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerBalanzaComprobacionAjustada` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerROI` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerFlujoEfectivo` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerPuntoEquilibrio` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_VerConceptos` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_GenerarDocumentosContables` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_GenerarROI` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_GenerarFlujoEfectivo` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_GenerarPuntoEquilibrio` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_AgregarConcepto` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_CON_EditarConcepto` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_crearProducto` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_editarProducto` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_eliminarProducto` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_listarProducto` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_crearProveedor` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_editarProveedor` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_eliminarProveedor` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_listarProveedor` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_crearAtributo` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_editarAtributo` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_eliminarAtributo` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_listarAtributo` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_crearCategoria` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_editarCategoria` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_eliminarCategoria` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_listarCategoria` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_crearUnidadMedida` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_editarUnidadMedida` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_eliminarUnidadMedida` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_listarUnidadMedida` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_crearCiudad` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_editarCiudad` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_eliminarCiudad` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_listarCiudad` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_crearHorario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_editarHorario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_eliminarHorario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_listarHorario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_crearFormaPago` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_eliminarFormaPago` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_listarFormaPago` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_registrarEntradaInventario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_registrarSalidaInventario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_listarEntradaInventario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_listarSalidaInventario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_crearMotivoMovimientoInventario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_editarMotivoMovimientoInventario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_eliminarMotivoMovimientoInventario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_listarMotivoMovimientoInventario` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_crearCampoLocal` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_editarCampoLocal` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_eliminarCampoLocal` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_listarCampoLocal` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_agregarProveedorProducto` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_quitarProveedorProducto` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_cambiarEstadoOrdenCompra` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_CrearCaja` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_AbrirCaja` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_BorrarCaja` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_EditarCaja` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_VerCaja` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_CrearPeriodoDeCierre` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_BorrarPeriodoDeCierre` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_EditarPeriodoDeCierre` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_VerPeriodoDeCierre` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_AbrirAperturaDeCaja` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_CerrarAperturaDeCaja` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_VerAperturaDeCierre` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_CrearDescuentos` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_EditarDescuentos` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_EliminarDescuentos` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_VerDescuentos` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_ConfigurarVentas` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_POSVentas` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_EliminarProductoDeVentas` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_EditarCantidadDeVentas` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_GuardarVentas` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_ListarVentas` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_VEN_VerVentas` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_agregarProveedorFormaPago` TINYINT(1) NULL DEFAULT 0,
  `SEG_Roles_INV_quitarProveedorFormaPago` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`SEG_Roles_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`SEG_Perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`SEG_Perfil` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`SEG_Perfil` (
  `SEG_Perfil_ID` INT NOT NULL AUTO_INCREMENT,
  `SEG_Perfil_NombreCompleto` VARCHAR(80) NULL,
  `SEG_Perfil_EmailAlterno` VARCHAR(50) NULL,
  `SEG_Perfil_Telefono` VARCHAR(45) NULL,
  `SEG_Perfil_Celular` VARCHAR(45) NULL,
  `SEG_Perfil_Direccion` TEXT NULL,
  `SEG_Perfil_Imagen` VARCHAR(45) NULL,
  PRIMARY KEY (`SEG_Perfil_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`SEG_Usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`SEG_Usuarios` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`SEG_Usuarios` (
  `SEG_Usuarios_ID` INT NOT NULL AUTO_INCREMENT,
  `SEG_Usuarios_Nombre` VARCHAR(50) NULL,
  `SEG_Usuarios_Email` VARCHAR(50) NULL,
  `SEG_Usuarios_Contrasena` VARCHAR(100) NULL,
  `SEG_Usuarios_Username` VARCHAR(45) NULL,
  `SEG_Usuarios_UltimaSesion` DATETIME NULL,
  `SEG_Usuarios_Token` VARCHAR(100) NULL,
  `SEG_Usuarios_IP1` VARCHAR(16) NULL,
  `SEG_Usuarios_IP2` VARCHAR(16) NULL,
  `SEG_Usuarios_IP3` VARCHAR(16) NULL,
  `SEG_Usuarios_Activo` TINYINT(1) NULL,
  `SEG_Usuarios_FechaInicioBloqueo` DATETIME NULL,
  `SEG_Usuarios_FechaFinBloqueo` DATETIME NULL,
  `SEG_Usuarios_FechaCreacion` DATETIME NULL,
  `SEG_Usuarios_FechaModificacion` DATETIME NULL,
  `SEG_Usuarios_UsuarioCreacion` VARCHAR(45) NULL,
  `SEG_Usuarios_UsuarioModificacion` VARCHAR(45) NULL,
  `SEG_Roles_SEG_Roles_ID` INT NULL,
  `SEG_Perfil_SEG_Perfil_ID` INT NULL,
  PRIMARY KEY (`SEG_Usuarios_ID`),
  INDEX `fk_SEG_Usuarios_SEG_Roles1_idx` (`SEG_Roles_SEG_Roles_ID` ASC),
  INDEX `fk_SEG_Usuarios_SEG_Perfil1_idx` (`SEG_Perfil_SEG_Perfil_ID` ASC),
  CONSTRAINT `fk_SEG_Usuarios_SEG_Roles1`
    FOREIGN KEY (`SEG_Roles_SEG_Roles_ID`)
    REFERENCES `pymeERP`.`SEG_Roles` (`SEG_Roles_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SEG_Usuarios_SEG_Perfil1`
    FOREIGN KEY (`SEG_Perfil_SEG_Perfil_ID`)
    REFERENCES `pymeERP`.`SEG_Perfil` (`SEG_Perfil_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`SEG_Error`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`SEG_Error` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`SEG_Error` (
  `SEG_Error_ID` INT NOT NULL AUTO_INCREMENT,
  `SEG_Error_Codigo` VARCHAR(45) NULL,
  `SEG_Error_FechaSuceso` VARCHAR(45) NULL,
  `SEG_Error_URL` VARCHAR(45) NULL,
  `SEG_Error_Encabezado` VARCHAR(45) NULL,
  `SEG_Error_Descripcion` VARCHAR(45) NULL,
  `SEG_Error_Stacktrace` VARCHAR(45) NULL,
  `SEG_Error_IP` VARCHAR(45) NULL,
  `SEG_Usuarios_SEG_Usuarios_ID` INT NOT NULL,
  PRIMARY KEY (`SEG_Error_ID`),
  INDEX `fk_SEG_Error_SEG_Usuarios1_idx` (`SEG_Usuarios_SEG_Usuarios_ID` ASC),
  CONSTRAINT `fk_SEG_Error_SEG_Usuarios1`
    FOREIGN KEY (`SEG_Usuarios_SEG_Usuarios_ID`)
    REFERENCES `pymeERP`.`SEG_Usuarios` (`SEG_Usuarios_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`SEG_Config`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`SEG_Config` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`SEG_Config` (
  `SEG_Config_ID` INT NOT NULL AUTO_INCREMENT,
  `SEG_Config_NombreEmpresa` VARCHAR(45) NULL,
  `SEG_Config_Direccion` VARCHAR(45) NULL,
  `SEG_Config_Telefono` VARCHAR(45) NULL,
  `SEG_Config_Telefono2` VARCHAR(45) NULL,
  `SEG_Config_Dominio` VARCHAR(45) NULL,
  `SEG_Config_EmailContacto` VARCHAR(45) NULL,
  `SEG_Config_EmailCompras` VARCHAR(45) NULL,
  `SEG_Config_EmailVentas` VARCHAR(45) NULL,
  `SEG_Config_Descripcion` VARCHAR(45) NULL,
  `SEG_Config_FechaModificacion` VARCHAR(45) NULL,
  `SEG_Usuarios_SEG_Usuarios_ID` INT NOT NULL,
  PRIMARY KEY (`SEG_Config_ID`),
  INDEX `fk_SEG_Config_SEG_Usuarios1_idx` (`SEG_Usuarios_SEG_Usuarios_ID` ASC),
  CONSTRAINT `fk_SEG_Config_SEG_Usuarios1`
    FOREIGN KEY (`SEG_Usuarios_SEG_Usuarios_ID`)
    REFERENCES `pymeERP`.`SEG_Usuarios` (`SEG_Usuarios_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`SEG_PassToken`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`SEG_PassToken` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`SEG_PassToken` (
  `SEG_PassToken_ID` INT NOT NULL AUTO_INCREMENT,
  `SEG_PassToken_Token` VARCHAR(200) NULL,
  `SEG_PassToken_FechaCreacion` DATETIME NULL,
  `SEG_PassToken_IP` VARCHAR(45) NULL,
  `SEG_Usuarios_SEG_Usuarios_ID` INT NOT NULL,
  PRIMARY KEY (`SEG_PassToken_ID`),
  INDEX `fk_SEG_PassToken_SEG_Usuarios1_idx` (`SEG_Usuarios_SEG_Usuarios_ID` ASC),
  CONSTRAINT `fk_SEG_PassToken_SEG_Usuarios1`
    FOREIGN KEY (`SEG_Usuarios_SEG_Usuarios_ID`)
    REFERENCES `pymeERP`.`SEG_Usuarios` (`SEG_Usuarios_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
