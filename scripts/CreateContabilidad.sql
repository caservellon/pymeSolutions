-- -----------------------------------------------------
-- Table `pymeERP`.`CON_UnidadMonetaria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_UnidadMonetaria` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_UnidadMonetaria` (
  `CON_UnidadMonetaria_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_UnidadMonetaria_Nombre` VARCHAR(45) NOT NULL,
  `CON_UnidadMonetaria_Observacion` VARCHAR(255) NULL,
  `CON_UnidadMonetaria_TasaConversion` FLOAT NOT NULL,
  `CON_UnidadMonetaria_FechaCreacion` DATETIME NOT NULL,
  `CON_UnidadMonetaria_FechaModificacion` DATETIME NOT NULL,
  PRIMARY KEY (`CON_UnidadMonetaria_ID`),
  UNIQUE INDEX `CON_UnidadMonetaria_Nombre_UNIQUE` (`CON_UnidadMonetaria_Nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_MotivoTransaccion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_MotivoTransaccion` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_MotivoTransaccion` (
  `CON_MotivoTransaccion_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_MotivoTransaccion_Codigo` VARCHAR(6) NOT NULL,
  `CON_MotivoTransaccion_Descripcion` VARCHAR(255) NOT NULL,
  `CON_MotivoTransaccion_FechaCreacion` DATETIME NOT NULL,
  `CON_MotivoTransaccion_Fechamodificacion` DATETIME NOT NULL,
  PRIMARY KEY (`CON_MotivoTransaccion_ID`),
  UNIQUE INDEX `CON_MotivoTransaccion_Codigo_UNIQUE` (`CON_MotivoTransaccion_Codigo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_TransaccionContabilidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_TransaccionContabilidad` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_TransaccionContabilidad` (
  `CON_TransaccionContabilidad_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_TransaccionContabilidad_Importe` FLOAT NOT NULL,
  `CON_TransaccionContabilidad_UsuarioCreacion` VARCHAR(64) NOT NULL,
  `CON_TransaccionContabilidad_FechaCreacion` DATETIME NOT NULL,
  `CON_TransaccionContabilidad_FechaModificacion` DATETIME NOT NULL,
  `CON_UnidadMonetaria_ID` INT NOT NULL,
  `CON_MotivoTransaccion_ID` INT NOT NULL,
  PRIMARY KEY (`CON_TransaccionContabilidad_ID`),
  INDEX `CON_UnidadMonetaria_ID_idx` (`CON_UnidadMonetaria_ID` ASC),
  INDEX `CON_MotivoTransaccion_ID_idx` (`CON_MotivoTransaccion_ID` ASC),
  CONSTRAINT `CON_UnidadMonetaria_ID`
    FOREIGN KEY (`CON_UnidadMonetaria_ID`)
    REFERENCES `pymeERP`.`CON_UnidadMonetaria` (`CON_UnidadMonetaria_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `CON_MotivoTransaccion_ID`
    FOREIGN KEY (`CON_MotivoTransaccion_ID`)
    REFERENCES `pymeERP`.`CON_MotivoTransaccion` (`CON_MotivoTransaccion_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_ClasificacionCuenta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_ClasificacionCuenta` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_ClasificacionCuenta` (
  `CON_ClasificacionCuenta_ID` INT NOT NULL,
  `CON_ClasificacionCuenta_Codigo` VARCHAR(10) NOT NULL,
  `CON_ClasificacionCuenta_Nombre` VARCHAR(45) NOT NULL,
  `CON_ClasificacionCuenta_FechaCreacion` DATETIME NOT NULL,
  `CON_ClasificacionCuenta_FechaModificacion` DATETIME NOT NULL,
  PRIMARY KEY (`CON_ClasificacionCuenta_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_CatalogoContable`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_CatalogoContable` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_CatalogoContable` (
  `CON_CatalogoContable_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_CatalogoContable_Codigo` VARCHAR(45) NOT NULL,
  `CON_CatalogoContable_Nombre` VARCHAR(120) NOT NULL,
  `CON_CatalogoContable_UsuarioCreacion` VARCHAR(45) NOT NULL,
  `CON_CatalogoContable_NaturalezaSaldo` TINYINT(1) NOT NULL,
  `CON_CatalogoContable_Estado` TINYINT(1) NOT NULL DEFAULT 0,
  `CON_CatalogoContable_FechaCreacion` DATETIME NOT NULL,
  `CON_CatalogoContable_FechaModificacion` DATETIME NOT NULL,
  `CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID` INT NOT NULL,
  PRIMARY KEY (`CON_CatalogoContable_ID`, `CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID`),
  INDEX `fk_CON_CatalogoContable_CON_ClasificacionCuenta1_idx` (`CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID` ASC),
  CONSTRAINT `fk_CON_CatalogoContable_CON_ClasificacionCuenta1`
    FOREIGN KEY (`CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID`)
    REFERENCES `pymeERP`.`CON_ClasificacionCuenta` (`CON_ClasificacionCuenta_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `pymeERP`.`CON_CuentaMotivo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_CuentaMotivo` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_CuentaMotivo` (
  `CON_CuentaMotivo_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_CuentaMotivo_DebeHaber` TINYINT(1) NOT NULL,
  `CON_CuentaMotivo_FechaCreacion` DATETIME NOT NULL,
  `CON_CuentaMotivo_FechaModificacion` DATETIME NOT NULL,
  `CON_MotivoTransaccion_ID` INT NOT NULL,
  `CON_CatalogoContable_ID` INT NOT NULL,
  PRIMARY KEY (`CON_CuentaMotivo_ID`),
  INDEX `CON_MotivoTransaccion_idx` (`CON_MotivoTransaccion_ID` ASC),
  INDEX `CON_CatalogoContable_ID_idx` (`CON_CatalogoContable_ID` ASC),
  CONSTRAINT `CON_MotivoTransaccion`
    FOREIGN KEY (`CON_MotivoTransaccion_ID`)
    REFERENCES `pymeERP`.`CON_MotivoTransaccion` (`CON_MotivoTransaccion_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `CON_CatalogoContable_ID`
    FOREIGN KEY (`CON_CatalogoContable_ID`)
    REFERENCES `pymeERP`.`CON_CatalogoContable` (`CON_CatalogoContable_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_LibroDiario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_LibroDiario` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_LibroDiario` (
  `CON_LibroDiario_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_LibroDiario_Observacion` VARCHAR(255) NULL DEFAULT NULL,
  `CON_LibroDiario_FechaCreacion` DATETIME NOT NULL,
  `CON_LibroDiario_FechaModificacion` DATETIME NOT NULL,
  `CON_LibroDiario_Monto` FLOAT NOT NULL,
  `CON_MotivoTransaccion_ID` INT NOT NULL,
  PRIMARY KEY (`CON_LibroDiario_ID`),
  INDEX `fk_CON_LibroDiario_CON_MotivoTransaccion1_idx` (`CON_MotivoTransaccion_ID` ASC),
  CONSTRAINT `fk_CON_LibroDiario_CON_MotivoTransaccion1`
    FOREIGN KEY (`CON_MotivoTransaccion_ID`)
    REFERENCES `pymeERP`.`CON_MotivoTransaccion` (`CON_MotivoTransaccion_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_Subcuenta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_Subcuenta` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_Subcuenta` (
  `CON_Subcuenta_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_Subcuenta_Codigo` VARCHAR(45) NOT NULL,
  `CON_Subcuenta_Nombre` VARCHAR(45) NOT NULL,
  `CON_Subcuenta_FechaCreacion` DATETIME NOT NULL,
  `CON_Subcuenta_FechaModificacion` DATETIME NOT NULL,
  `CON_CatalogoContable_ID` INT NOT NULL,
  PRIMARY KEY (`CON_Subcuenta_ID`, `CON_CatalogoContable_ID`),
  INDEX `fk_CON_Subcuenta_CON_CatalogoContable1_idx` (`CON_CatalogoContable_ID` ASC),
  CONSTRAINT `fk_CON_Subcuenta_CON_CatalogoContable1`
    FOREIGN KEY (`CON_CatalogoContable_ID`)
    REFERENCES `pymeERP`.`CON_CatalogoContable` (`CON_CatalogoContable_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_LibroMayor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_LibroMayor` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_LibroMayor` (
  `CON_LibroMayor_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_LibroMayor_FechaCreacion` DATETIME NOT NULL,
  `CON_LibroMayor_FechaModificacion` DATETIME NOT NULL,
  PRIMARY KEY (`CON_LibroMayor_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_CuentaT`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_CuentaT` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_CuentaT` (
  `CON_LibroMayor_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_CatalogoContable_ID` INT NOT NULL,
  `CON_CuentaT_SaldoFinal` FLOAT NOT NULL,
  `CON_CuentaT_AcreedorDeudor` TINYINT(1) NOT NULL,
  `CON_CuentaT_FechaModificacion` DATETIME NOT NULL,
  `CON_CuentaT_FechaCreacion` DATETIME NOT NULL,
  PRIMARY KEY (`CON_LibroMayor_ID`, `CON_CatalogoContable_ID`),
  INDEX `fk_CON_CuentaT_CON_CatalogoContable1_idx` (`CON_CatalogoContable_ID` ASC),
  CONSTRAINT `CON_LibroMayor_ID`
    FOREIGN KEY (`CON_LibroMayor_ID`)
    REFERENCES `pymeERP`.`CON_LibroMayor` (`CON_LibroMayor_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CON_CuentaT_CON_CatalogoContable1`
    FOREIGN KEY (`CON_CatalogoContable_ID`)
    REFERENCES `pymeERP`.`CON_CatalogoContable` (`CON_CatalogoContable_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_ClasificacionPeriodo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_ClasificacionPeriodo` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_ClasificacionPeriodo` (
  `CON_ClasificacionPeriodo_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_ClasificacionPeriodo_Nombre` VARCHAR(45) NOT NULL,
  `CON_ClasificacionPeriodo_CatidadDias` INT NOT NULL,
  `CON_ClasificacionPeriodo_FechaCreacion` DATETIME NOT NULL,
  `CON_ClasificacionPeriodo_FechaModificacion` DATETIME NOT NULL,
  PRIMARY KEY (`CON_ClasificacionPeriodo_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_PeriodoContable`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_PeriodoContable` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_PeriodoContable` (
  `CON_PeriodoContable_ID` INT NOT NULL,
  `CON_PeriodoContable_FechaInicio` DATETIME NOT NULL,
  `CON_PeriodoContable_FechaFinal` DATETIME NOT NULL,
  `CON_PeriodoContable_Nombre` VARCHAR(50) NOT NULL,
  `CON_PeriodoContable_FechaCreacion` DATETIME NOT NULL,
  `CON_PeriodoContable_FechaModificacion` DATETIME NOT NULL,
  `CON_ClasificacionPeriodo_CON_ClasificacionPeriodo_ID` INT NOT NULL,
  PRIMARY KEY (`CON_PeriodoContable_ID`, `CON_ClasificacionPeriodo_CON_ClasificacionPeriodo_ID`),
  INDEX `fk_CON_PeriodoContable_CON_ClasificacionPeriodo1_idx` (`CON_ClasificacionPeriodo_CON_ClasificacionPeriodo_ID` ASC),
  CONSTRAINT `fk_CON_PeriodoContable_CON_ClasificacionPeriodo1`
    FOREIGN KEY (`CON_ClasificacionPeriodo_CON_ClasificacionPeriodo_ID`)
    REFERENCES `pymeERP`.`CON_ClasificacionPeriodo` (`CON_ClasificacionPeriodo_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_EstadoResultado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_EstadoResultado` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_EstadoResultado` (
  `CON_PeriodoContable_ID` INT NOT NULL,
  `CON_EstadoResultados_Ingresos` FLOAT NOT NULL,
  `CON_EstadoResultados_CostoVentas` FLOAT NOT NULL,
  `CON_EstadoResultados_UtilidadBruta` FLOAT NOT NULL,
  `CON_EstadoResultados_GastosdeVentas` FLOAT NOT NULL,
  `CON_EstadoResultados_GastosAdministrativos` FLOAT NOT NULL,
  `CON_EstadoResultados_UtilidadOperacion` FLOAT NOT NULL,
  `CON_EstadoResultados_GastoFinanciero` FLOAT NOT NULL,
  `CON_EstadoResultados_UtilidadAntesImpuesto` FLOAT NOT NULL,
  `CON_EstadoResultados_Impuesto` FLOAT NOT NULL,
  `CON_EstadoResultados_UtilidadPerdidaFinal` FLOAT NOT NULL,
  `CON_EstadoResultados_FechaCreacion` DATETIME NOT NULL,
  `CON_EstadoResultados_FechaModificacion` DATETIME NOT NULL,
  PRIMARY KEY (`CON_PeriodoContable_ID`),
  CONSTRAINT `CON_PeriodoContable_ID`
    FOREIGN KEY (`CON_PeriodoContable_ID`)
    REFERENCES `pymeERP`.`CON_PeriodoContable` (`CON_PeriodoContable_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_CapitalContable`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_CapitalContable` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_CapitalContable` (
  `CON_PeriodoContable_ID` INT NOT NULL,
  `CON_CapitalContable_CapitalInicial` FLOAT NOT NULL,
  `CON_CapitalContable_Ingresos` FLOAT NOT NULL,
  `CON_CapitalContable_UtilidadPerdida` FLOAT NOT NULL,
  `CON_CapitalContable_Retiros` FLOAT NOT NULL,
  `CON_CapitalContable_CapitalFinal` FLOAT NOT NULL,
  `CON_CapitalContable_FechaCreacion` DATETIME NOT NULL,
  `CON_CapitalContable_FechaModificacion` DATETIME NOT NULL,
  PRIMARY KEY (`CON_PeriodoContable_ID`),
  CONSTRAINT `fk_CON_PeriodoContable_ID`
    FOREIGN KEY (`CON_PeriodoContable_ID`)
    REFERENCES `pymeERP`.`CON_PeriodoContable` (`CON_PeriodoContable_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_RetornoInversion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_RetornoInversion` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_RetornoInversion` (
  `CON_RetornoInversion_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_RetornoInversion_UtilidadPerdida` FLOAT NOT NULL,
  `CON_RetornoInversion_CapitalInicial` FLOAT NOT NULL,
  `CON_RetornoInversion_ROI` FLOAT NOT NULL,
  `CON_RetornoInversion_FechaCreacion` DATETIME NOT NULL,
  `CON_RetornoInversion_FechaModificacion` DATETIME NOT NULL,
  `CON_EstadoResultado_CON_PeriodoContable_ID` INT NOT NULL,
  PRIMARY KEY (`CON_RetornoInversion_ID`, `CON_EstadoResultado_CON_PeriodoContable_ID`),
  INDEX `fk_CON_RetornoInversion_CON_EstadoResultado1_idx` (`CON_EstadoResultado_CON_PeriodoContable_ID` ASC),
  CONSTRAINT `fk_CON_RetornoInversion_CON_EstadoResultado1`
    FOREIGN KEY (`CON_EstadoResultado_CON_PeriodoContable_ID`)
    REFERENCES `pymeERP`.`CON_EstadoResultado` (`CON_PeriodoContable_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_PuntoEquilibrio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_PuntoEquilibrio` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_PuntoEquilibrio` (
  `CON_PuntoEquilibrio_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_PuntoEquilibrio_CostoFijoTotal` FLOAT NOT NULL,
  `CON_PuntoEquilibrio_PrecioVentaTotal` FLOAT NOT NULL,
  `CON_PuntoEquilibrio_PuntoEquilibrio` FLOAT NOT NULL,
  `CON_PuntoEquilibrio_FechaCreacion` DATETIME NOT NULL,
  `CON_PuntoEquilibrio_FechaModificacion` DATETIME NOT NULL,
  `CON_LibroMayor_ID` INT NOT NULL,
  PRIMARY KEY (`CON_PuntoEquilibrio_ID`),
  INDEX `CON_LibroMayor_DID_idx` (`CON_LibroMayor_ID` ASC),
  CONSTRAINT `fk_CON_LibroMayor_ID`
    FOREIGN KEY (`CON_LibroMayor_ID`)
    REFERENCES `pymeERP`.`CON_LibroMayor` (`CON_LibroMayor_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_BalanzaComprobacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_BalanzaComprobacion` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_BalanzaComprobacion` (
  `CON_BalanzaComprobacion_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_BalanzaComprobacion_FechaCreacion` DATETIME NOT NULL,
  `CON_BalanzaComprobacion_FechaModificacion` DATETIME NOT NULL,
  `CON_LibroMayor_ID` INT NOT NULL,
  PRIMARY KEY (`CON_BalanzaComprobacion_ID`),
  INDEX `CON_LibroMayor_ID_idx` (`CON_LibroMayor_ID` ASC),
  CONSTRAINT `fk_CON_LibroMayor_ID_fk`
    FOREIGN KEY (`CON_LibroMayor_ID`)
    REFERENCES `pymeERP`.`CON_LibroMayor` (`CON_LibroMayor_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_BalanzaComprobacionAjustada`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_BalanzaComprobacionAjustada` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_BalanzaComprobacionAjustada` (
  `CON_BalanzaComprobacionAjustada_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_BalanzaComprobacionAjustada_FechaCreacion` DATETIME NOT NULL,
  `CON_BalanzaComprobacionAjustada_FechaModificacion` DATETIME NOT NULL,
  `CON_LibroMayor_Id` INT NOT NULL,
  PRIMARY KEY (`CON_BalanzaComprobacionAjustada_ID`),
  INDEX `CON_LibroMayor_Id_idx` (`CON_LibroMayor_Id` ASC),
  CONSTRAINT `CON_LibroMayor_Id_fk`
    FOREIGN KEY (`CON_LibroMayor_Id`)
    REFERENCES `pymeERP`.`CON_LibroMayor` (`CON_LibroMayor_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_CuentaTBalanzaComprobacionAjustada`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_CuentaTBalanzaComprobacionAjustada` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_CuentaTBalanzaComprobacionAjustada` (
  `CON_BalanzaComprobacionAjustada_ID` INT NOT NULL,
  `CON_CuentaTBalanzaComprobacionAjustada_Saldo` FLOAT NOT NULL,
  `CON_CuentaTBalanzaComprobacionAjustada_DebeHaber` TINYINT(1) NOT NULL,
  `CON_CuentaTBalanzaComprobacionAjustada_FechaCreacion` DATETIME NOT NULL,
  `CON_CuentaTBalanzaComprobacionAjustada_FechaModificacion` DATETIME NOT NULL,
  `CON_LibroMayor_ID` INT NOT NULL,
  `CON_CuentaT_ID` INT NOT NULL,
  PRIMARY KEY (`CON_BalanzaComprobacionAjustada_ID`),
  INDEX `CON_CuentaT_ID_idx` (`CON_CuentaT_ID` ASC),
  INDEX `CON_LibroMayor_ID_idx` (`CON_LibroMayor_ID` ASC),
  CONSTRAINT `CON_BalanzaComprobacionAjustada_fk`
    FOREIGN KEY (`CON_BalanzaComprobacionAjustada_ID`)
    REFERENCES `pymeERP`.`CON_BalanzaComprobacionAjustada` (`CON_BalanzaComprobacionAjustada_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `CON_CuentaT_ID_fk`
    FOREIGN KEY (`CON_CuentaT_ID`)
    REFERENCES `pymeERP`.`CON_CuentaT` (`CON_LibroMayor_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CON_LibroMayor_ID_fk_fk`
    FOREIGN KEY (`CON_LibroMayor_ID`)
    REFERENCES `pymeERP`.`CON_LibroMayor` (`CON_LibroMayor_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_BalanceGeneral`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_BalanceGeneral` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_BalanceGeneral` (
  `CON_PeriodoContable_ID` INT NOT NULL,
  `CON_BalanceGeneral_TotalActivosC` FLOAT NOT NULL,
  `CON_BalanceGeneral_TotalPasivosC` FLOAT NOT NULL,
  `CON_BalanceGeneral_TotalActivosNC` FLOAT NOT NULL,
  `CON_BalanceGeneral_TotalPasivosNC` FLOAT NOT NULL,
  `CON_BalanceGeneral_CapitalFinal` FLOAT NOT NULL,
  `CON_BalanceGeneral_FechaCreacion` DATETIME NOT NULL,
  `CON_BalanceGeneral_FechaModificacion` DATETIME NOT NULL,
  PRIMARY KEY (`CON_PeriodoContable_ID`),
  CONSTRAINT `fk_fk_CON_PeriodoContable_ID`
    FOREIGN KEY (`CON_PeriodoContable_ID`)
    REFERENCES `pymeERP`.`CON_PeriodoContable` (`CON_PeriodoContable_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_DetalleBalance`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_DetalleBalance` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_DetalleBalance` (
  `CON_CatalogoContable_ID` INT NOT NULL,
  `CON_DetalleBalance_Saldo` FLOAT NOT NULL,
  `CON_DetalleBalance_FechaCreacion` DATETIME NOT NULL,
  `CON_DetalleBalance_FechaModificacion` DATETIME NOT NULL,
  `CON_BalanceGeneral_ID` INT NOT NULL,
  PRIMARY KEY (`CON_CatalogoContable_ID`),
  INDEX `CON_BalanceGeneral_ID_idx` (`CON_BalanceGeneral_ID` ASC),
  CONSTRAINT `CON_BalanceGeneral_ID`
    FOREIGN KEY (`CON_BalanceGeneral_ID`)
    REFERENCES `pymeERP`.`CON_BalanceGeneral` (`CON_PeriodoContable_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `CON_CatalogoContable`
    FOREIGN KEY (`CON_CatalogoContable_ID`)
    REFERENCES `pymeERP`.`CON_CatalogoContable` (`CON_CatalogoContable_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_FlujoCaja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_FlujoCaja` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_FlujoCaja` (
  `CON_FlujoCaja_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_FlujoCaja_UtilidadPerdidaInicial` FLOAT NOT NULL,
  `CON_FlujoCaja_UtilidadPerdidaFinal` FLOAT NOT NULL,
  `CON_FlujoCaja_FechaCreacion` DATETIME NOT NULL,
  `CON_FlujoCaja_FechaModificacion` DATETIME NOT NULL,
  PRIMARY KEY (`CON_FlujoCaja_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_DetalleFlujoCaja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_DetalleFlujoCaja` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_DetalleFlujoCaja` (
  `CON_FlujoCaja_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_DetalleFlujoCaja_FechaCreacion` DATETIME NOT NULL,
  `CON_DetalleFlujoCaja_FechaModificacion` DATETIME NOT NULL,
  `CON_BalanceGeneral_CON_PeriodoContable_ID` INT NOT NULL,
  PRIMARY KEY (`CON_FlujoCaja_ID`, `CON_BalanceGeneral_CON_PeriodoContable_ID`),
  INDEX `fk_CON_DetalleFlujoCaja_CON_BalanceGeneral1_idx` (`CON_BalanceGeneral_CON_PeriodoContable_ID` ASC),
  CONSTRAINT `CON_FlujoCaja_ID`
    FOREIGN KEY (`CON_FlujoCaja_ID`)
    REFERENCES `pymeERP`.`CON_FlujoCaja` (`CON_FlujoCaja_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CON_DetalleFlujoCaja_CON_BalanceGeneral1`
    FOREIGN KEY (`CON_BalanceGeneral_CON_PeriodoContable_ID`)
    REFERENCES `pymeERP`.`CON_BalanceGeneral` (`CON_PeriodoContable_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_Pago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_Pago` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_Pago` (
  `CON_Pago_ID` INT NOT NULL AUTO_INCREMENT,
  `COM_OrdenPago_ID` INT NOT NULL,
  `CON_Pago_Estado` VARCHAR(10) NOT NULL,
  `CON_Pago_FechaPago` DATETIME NOT NULL,
  `CON_Pago_FechaPagar` DATETIME NOT NULL,
  PRIMARY KEY (`CON_Pago_ID`))
ENGINE = InnoDB;


