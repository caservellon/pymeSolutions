
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
  `SEG_Roles_CRM_CrearPersona` TINYINT(1) NULL,
  `SEG_Roles_CRM_VerPersona` TINYINT(1) NULL,
  `SEG_Roles_CRM_EditarPersona` TINYINT(1) NULL,
  `SEG_Roles_CRM_EliminarPersona` TINYINT(1) NULL,
  `SEG_Roles_CRM_CrearEmpresa` TINYINT(1) NULL,
  `SEG_Roles_CRM_VerEmpresa` TINYINT(1) NULL,
  `SEG_Roles_CRM_EditarEmpresa` TINYINT(1) NULL,
  `SEG_Roles_CRM_EliminarEmpresa` TINYINT(1) NULL,
  `SEG_Roles_CRM_Configuracion` TINYINT(1) NULL,
  `SEG_Roles_VEN_AbrirCaja` TINYINT(1) NULL,
  `SEG_Roles_VEN_CrearCaja` TINYINT(1) NULL,
  `SEG_Roles_VEN_CerrarCaja` TINYINT(1) NULL,
  `SEG_Roles_VEN_ModificarCaja` TINYINT(1) NULL,
  `SEG_Roles_VEN_EliminarCaja` TINYINT(1) NULL,
  `SEG_Roles_VEN_RegistrarVenta` TINYINT(1) NULL,
  `SEG_Roles_VEN_RegistrarDevolucion` TINYINT(1) NULL,
  `SEG_Roles_VEN_EditarVenta` TINYINT(1) NULL,
  `SEG_Roles_VEN_EditarDevolucion` TINYINT(1) NULL,
  `SEG_Roles_VEN_VerVentas` TINYINT(1) NULL,
  `SEG_Roles_VEN_VerDevolucion` TINYINT(1) NULL,
  `SEG_Roles_VEN_AgregarDescuento` TINYINT(1) NULL,
  `SEG_Roles_VEN_EliminarDescuento` TINYINT(1) NULL,
  `SEG_Roles_VEN_EditarDescuento` TINYINT(1) NULL,
  `SEG_Roles_VEN_VerDescuento` TINYINT(1) NULL,
  `SEG_Roles_COM_NuevoEstadoOrden` TINYINT(1) NULL,
  `SEG_Roles_COM_AlmacenaEstadoOrden` TINYINT(1) NULL,
  `SEG_Roles_IndexEstadoOrden` TINYINT(1) NULL,
  `SEG_Roles_EditEstadoOrden` TINYINT(1) NULL,
  `SEG_Roles_COM_ListaTransiciones` TINYINT(1) NULL,
  `SEG_Roles_COM_EditaTransiciones` TINYINT(1) NULL,
  `SEG_Roles_ListaEstado` TINYINT(1) NULL,
  `SEG_Roles_COM_NuevaTransicion` TINYINT(1) NULL,
  `SEG_Roles_COM_AlmacenaTransicion` TINYINT(1) NULL,
  `SEG_Roles_COM_ActualizarTransicion` TINYINT(1) NULL,
  `SEG_Roles_COM_OrdenComprasnCotizacion` TINYINT(1) NULL,
  `SEG_Roles_COM_FormOrdenComprasnCotizacion` TINYINT(1) NULL,
  `SEG_Roles_COM_GuardarOCsnCot` TINYINT(1) NULL,
  `SEG_Roles_COM_OrdenCompracnCotizacion` TINYINT(1) NULL,
  `SEG_Roles_COM_CompararCotizacion` TINYINT(1) NULL,
  `SEG_Roles_COM_OrdenCompracnCotizacionForm` TINYINT(1) NULL,
  `SEG_Roles_COM_OCcnCot` TINYINT(1) NULL,
  `SEG_Roles_COM_ListarOrdenCompra` TINYINT(1) NULL,
  `SEG_Roles_COM_AutorizarOrdenCompra` TINYINT(1) NULL,
  `SEG_Roles_COM_autorizarOrden` TINYINT(1) NULL,
  `SEG_Roles_COM_cancelarOrden` TINYINT(1) NULL,
  `SEG_Roles_COM_ListaOrdenCompra` TINYINT(1) NULL,
  `SEG_Roles_COM_AdministrarDetalle` TINYINT(1) NULL,
  `SEG_Roles_COM_AdministrarOC` TINYINT(1) NULL,
  `SEG_Roles_COM_HistorialOrdenes` TINYINT(1) NULL,
  `SEG_Roles_COM_HistorialOrden` TINYINT(1) NULL,
  `SEG_Roles_COM_GenerarPagoLC` TINYINT(1) NULL,
  `SEG_Roles_COM_DetallePago` TINYINT(1) NULL,
  `SEG_Roles_COM_GuardarPago` TINYINT(1) NULL,
  `SEG_Roles_COM_search_index` TINYINT(1) NULL,
  `SEG_Roles_COM_Search_cotizaciones` TINYINT(1) NULL,
  `SEG_Roles_COM_indexCampoLocal` TINYINT(1) NULL,
  `SEG_Roles_COM_createCampoLocal` TINYINT(1) NULL,
  `SEG_Roles_COM_editCampoLocal` TINYINT(1) NULL,
  `SEG_Roles_COM_destroyCampoLocal` TINYINT(1) NULL,
  `SEG_Roles_COM_indexSC` TINYINT(1) NULL,
  `SEG_Roles_COM_vistaCrearSC` TINYINT(1) NULL,
  `SEG_Roles_COM_vistaReordenSC` TINYINT(1) NULL,
  `SEG_Roles_COM_mostrarProveedorSC` TINYINT(1) NULL,
  `SEG_Roles_COM_editSC` TINYINT(1) NULL,
  `SEG_Roles_COM_search_indexSC` TINYINT(1) NULL,
  `SEG_Roles_COM_detalleSC` TINYINT(1) NULL,
  `SEG_Roles_COM_VistaMenuCotizaciones` TINYINT(1) NULL,
  `SEG_Roles_COM_CapturarCotizacion` TINYINT(1) NULL,
  `SEG_Roles_COM_VistaCapturarCotizacion` TINYINT(1) NULL,
  `SEG_Roles_COM_VistaCapturarCotizacionCapturar` TINYINT(1) NULL,
  `SEG_Roles_COM_CapturarCotizacionCapturar` TINYINT(1) NULL,
  `SEG_Roles_COM_VCCCMCC` TINYINT(1) NULL,
  `SEG_Roles_COM_VistaTodasCotizaciones` TINYINT(1) NULL,
  `SEG_Roles_COM_TodasCotizaciones` TINYINT(1) NULL,
  `SEG_Roles_COM_VistaDetallesCotizacion` TINYINT(1) NULL,
  `SEG_Roles_COM_VistaHabilitarInhabilitar` TINYINT(1) NULL,
  `SEG_Roles_COM_VHIMECC` TINYINT(1) NULL,
  `SEG_Roles_COM_DetallesCotizacion` TINYINT(1) NULL,
  `SEG_Roles_COM_HabilitarInhabilitar` TINYINT(1) NULL,
  `SEG_Roles_COM_search_indexCOT` TINYINT(1) NULL,
  `SEG_Roles_COM_VistaTodasOrdenesCompra` TINYINT(1) NULL,
  `SEG_Roles_COM_VistaDetallesOrdenCompra` TINYINT(1) NULL,
  `SEG_Roles_COM_VistaNuevaOrdenCompra` TINYINT(1) NULL,
  `SEG_Roles_COM_DetallesOrdenCompra` TINYINT(1) NULL,
  `SEG_Roles_CON_AgregarAsiento` TINYINT(1) NULL,
  `SEG_Roles_CON_AgregarMotivo` TINYINT(1) NULL,
  `SEG_Roles_CON_LibroDiario` TINYINT(1) NULL,
  `SEG_Roles_CON_RevertirAsiento` TINYINT(1) NULL COMMENT '		',
  `SEG_Roles_CON_FiltrarAsientos` TINYINT(1) NULL,
  `SEG_Roles_CON_CierreDePeriodo` TINYINT(1) NULL,
  `SEG_Roles_CON_VerConfiguracion` TINYINT(1) NULL,
  `SEG_Roles_CON_VerCatalogoContable` TINYINT(1) NULL,
  `SEG_Roles_CON_AgregarCuenta` TINYINT(1) NULL,
  `SEG_Roles_CON_EditarCeunta` TINYINT(1) NULL,
  `SEG_Roles_CON_ListarSubcuentas` TINYINT(1) NULL,
  `SEG_Roles_CON_AgregarSubcuentas` TINYINT(1) NULL,
  `SEG_Roles_CON_VerPeriodoContable` TINYINT(1) NULL,
  `SEG_Roles_CON_AgregarPeriodoContable` TINYINT(1) NULL COMMENT '\n',
  `SEG_Roles_CON_EditarPeriodoContable` TINYINT(1) NULL,
  `SEG_Roles_CON_VerUnidadesMonetarias` TINYINT(1) NULL,
  `SEG_Roles_CON_AgregarUnidadesMonetarias` TINYINT(1) NULL,
  `SEG_Roles_CON_EditarUnidadesMonetarias` TINYINT(1) NULL,
  `SEG_Roles_CON_VerDocumnetosContables` TINYINT(1) NULL,
  `SEG_Roles_CON_VerEstadoResultados` TINYINT(1) NULL,
  `SEG_Roles_CON_VerCapitalContable` TINYINT(1) NULL,
  `SEG_Roles_CON_VerBalanceGeneral` TINYINT(1) NULL,
  `SEG_Roles_CON_VerBalanzaComprobacion` TINYINT(1) NULL,
  `SEG_Roles_CON_VerBalanzaComprobacionAjustada` TINYINT(1) NULL,
  `SEG_Roles_CON_VerROI` TINYINT(1) NULL,
  `SEG_Roles_CON_VerFlujoEfectivo` TINYINT(1) NULL,
  `SEG_Roles_CON_VerPuntoEquilibrio` TINYINT(1) NULL,
  `SEG_Roles_CON_VerConceptos` TINYINT(1) NULL,
  `SEG_Roles_CON_GenerarDocumentosContables` TINYINT(1) NULL,
  `SEG_Roles_CON_GenerarROI` TINYINT(1) NULL,
  `SEG_Roles_CON_GenerarFlujoEfectivo` TINYINT(1) NULL,
  `SEG_Roles_CON_GenerarPuntoEquilibrio` TINYINT(1) NULL,
  `SEG_Roles_CON_AgregarConcepto` TINYINT(1) NULL,
  `SEG_Roles_CON_EditarConcepto` TINYINT(1) NULL,
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
  `SEG_Error_ID` INT NOT NULL,
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
  `SEG_Config_ID` INT NOT NULL,
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
  `SEG_PassToken_ID` INT NOT NULL,
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
