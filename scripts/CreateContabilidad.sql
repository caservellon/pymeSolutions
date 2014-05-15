-- -----------------------------------------------------
-- Table `pymeERP`.`CON_UnidadMonetaria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_UnidadMonetaria` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_UnidadMonetaria` (
  `CON_UnidadMonetaria_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_UnidadMonetaria_Nombre` VARCHAR(45) NOT NULL,
  `CON_UnidadMonetaria_Observacion` VARCHAR(255) NULL DEFAULT NULL,
  `CON_UnidadMonetaria_TasaConversion` DECIMAL(4,2) NOT NULL,
  `CON_UnidadMonetaria_FechaCreacion` DATETIME NULL,
  `CON_UnidadMonetaria_FechaModificacion` DATETIME NULL,
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
  `CON_ClasificacionCuenta_Nombre` VARCHAR(64) NOT NULL,
  `CON_ClasificacionCuenta_FechaCreacion` DATETIME NOT NULL,
  `CON_ClasificacionCuenta_FechaModificacion` DATETIME NOT NULL,
  `CON_ClasificacionCuenta_Categoria` VARCHAR(1) NOT NULL,
  `CON_ClasificacionCuenta_Subcategoria` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`CON_ClasificacionCuenta_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_CatalogoContable`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_CatalogoContable` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_CatalogoContable` (
  `CON_CatalogoContable_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_CatalogoContable_Codigo` VARCHAR(3) NOT NULL,
  `CON_CatalogoContable_Nombre` VARCHAR(120) NOT NULL,
  `CON_CatalogoContable_UsuarioCreacion` VARCHAR(45) NOT NULL,
  `CON_CatalogoContable_NaturalezaSaldo` TINYINT(1) NOT NULL,
  `CON_CatalogoContable_Estado` TINYINT(1) NOT NULL DEFAULT 0,
  `CON_CatalogoContable_FechaCreacion` DATETIME NOT NULL,
  `CON_CatalogoContable_FechaModificacion` DATETIME NOT NULL,
  `CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID` INT NOT NULL,
  `CON_CatalogoContable_CodigoSubcuenta` VARCHAR(2) NULL,
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
  `CON_CuentaMotivo_FechaCreacion` DATETIME,
  `CON_CuentaMotivo_FechaModificacion` DATETIME,
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
  `CON_LibroDiario_Monto` DECIMAL(11,2) NOT NULL,
  `CON_MotivoTransaccion_ID` INT NOT NULL,
  `CON_LibroDiario_AsientoReversion` TINYINT NULL DEFAULT 0,
  `CON_LibroDiario_Revertido` TINYINT NULL DEFAULT NULL,
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
  `CON_Subcuenta_Codigo` VARCHAR(2) NOT NULL,
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
-- Table `pymeERP`.`CON_ClasificacionPeriodo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_ClasificacionPeriodo` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_ClasificacionPeriodo` (
  `CON_ClasificacionPeriodo_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_ClasificacionPeriodo_Nombre` VARCHAR(45) NOT NULL,
  `CON_ClasificacionPeriodo_CatidadDias` INT NOT NULL,
  `CON_ClasificacionPeriodo_FechaCreacion` DATETIME NOT NULL,
  `CON_ClasificacionPeriodo_FechaModificacion` DATETIME NOT NULL,
  `deleted_at` DATETIME NULL,
  PRIMARY KEY (`CON_ClasificacionPeriodo_ID`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `pymeERP`.`CON_PeriodoContable`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_PeriodoContable` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_PeriodoContable` (
  `CON_PeriodoContable_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_PeriodoContable_FechaInicio` DATETIME NOT NULL,
  `CON_PeriodoContable_FechaFinal` DATETIME NOT NULL,
  `CON_PeriodoContable_FechaCreacion` DATETIME NOT NULL,
  `CON_PeriodoContable_FechaModificacion` DATETIME NOT NULL,
  `CON_ClasificacionPeriodo_ID` INT NOT NULL,
  PRIMARY KEY (`CON_PeriodoContable_ID`, `CON_ClasificacionPeriodo_ID`),
  INDEX `fk_CON_PeriodoContable_CON_ClasificacionPeriodo1_idx` (`CON_ClasificacionPeriodo_ID` ASC),
  CONSTRAINT `fk_CON_PeriodoContable_CON_ClasificacionPeriodo1`
    FOREIGN KEY (`CON_ClasificacionPeriodo_ID`)
    REFERENCES `pymeERP`.`CON_ClasificacionPeriodo` (`CON_ClasificacionPeriodo_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CON_LibroMayor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CON_LibroMayor` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_LibroMayor` (
  `CON_LibroMayor_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_PeriodoContable_CON_PeriodoContable_ID` INT NOT NULL,
  `CON_LibroMayor_FechaCreacion` DATETIME NOT NULL,
  `CON_LibroMayor_FechaModificacion` DATETIME NOT NULL,
  PRIMARY KEY (`CON_LibroMayor_ID`, `CON_PeriodoContable_CON_PeriodoContable_ID`),
  INDEX `fk_CON_LibroMayor_CON_PeriodoContable1_idx` (`CON_PeriodoContable_CON_PeriodoContable_ID` ASC),
  CONSTRAINT `fk_CON_LibroMayor_CON_PeriodoContable1`
    FOREIGN KEY (`CON_PeriodoContable_CON_PeriodoContable_ID`)
    REFERENCES `pymeERP`.`CON_PeriodoContable` (`CON_PeriodoContable_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  `CON_BalanceGeneral_ID` INT NOT NULL,
  `CON_CatalogoContable_ID` INT NOT NULL,
  `CON_DetalleBalance_Saldo` FLOAT NOT NULL,
  `CON_DetalleBalance_FechaCreacion` DATETIME NOT NULL,
  `CON_DetalleBalance_FechaModificacion` DATETIME NOT NULL,
  PRIMARY KEY (`CON_BalanceGeneral_ID`, `CON_CatalogoContable_ID`),
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

DROP TABLE IF EXISTS `pymeERP`.`CON_ConceptoMotivo` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CON_ConceptoMotivo` (
  `CON_ConceptoMotivo_ID` INT NOT NULL AUTO_INCREMENT,
  `CON_ConceptoMotivo_Concepto` VARCHAR(45) NOT NULL,
  `CON_MotivoTransaccion_ID` INT NOT NULL,
  PRIMARY KEY (`CON_ConceptoMotivo_ID`),
  INDEX `fk_CON_ConceptoMotivo_CON_MotivoTransaccion1_idx` (`CON_MotivoTransaccion_ID` ASC),
  CONSTRAINT `fk_CON_ConceptoMotivo_CON_MotivoTransaccion1`
    FOREIGN KEY (`CON_MotivoTransaccion_ID`)
    REFERENCES `pymeERP`.`CON_MotivoTransaccion` (`CON_MotivoTransaccion_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


DROP PROCEDURE IF EXISTS pymeERP.CON_Mayorizacion;

DELIMITER $$
CREATE PROCEDURE `CON_Mayorizacion`(IN ID_PeriodoContable INTEGER, IN FechaFinal DATETIME)
BEGIN

    DECLARE Debe float default 0;
    DECLARE Haber float default 0;
    DECLARE ID_Haber INTEGER default 0;
    DECLARE ID_Debe  INTEGER default 0;
    DECLARE ID_Cuenta INTEGER default 0;
    DECLARE SaldoFinal float default 0;
    DECLARE Deudor_Acreedor INTEGER default 1;
    DECLARE finished INTEGER DEFAULT 0;
    DECLARE ID_LibroMayor INTEGER default 0;



    DECLARE cuentaT_cursor CURSOR FOR 
    (select * from
        (SELECT 
            CM.CON_CatalogoContable_ID,
                sum(L2.CON_LibroDiario_Monto) Haber
        FROM
            pymeERP.CON_LibroDiario as L2
        INNER JOIN pymeERP.CON_MotivoTransaccion as M ON M.CON_MotivoTransaccion_ID = L2.CON_MotivoTransaccion_ID
        INNER JOIN pymeERP.CON_CuentaMotivo as CM ON M.CON_MotivoTransaccion_ID = CM.CON_MotivoTransaccion_ID
        WHERE
             (CM.CON_CuentaMotivo_DebeHaber = 1
                XOR L2.CON_LibroDiario_AsientoReversion = 1)
                AND L2.CON_LibroDiario_FechaCreacion <= FechaFinal
        GROUP BY CM.CON_CatalogoContable_ID
        ORDER BY CM.CON_CatalogoContable_ID) as Haber
    LEFT JOIN
        (SELECT 
            sum(L.CON_LibroDiario_Monto) Debe,
                CM.CON_CatalogoContable_ID
        FROM
            pymeERP.CON_LibroDiario as L
        INNER JOIN pymeERP.CON_MotivoTransaccion as M ON M.CON_MotivoTransaccion_ID = L.CON_MotivoTransaccion_ID
        INNER JOIN pymeERP.CON_CuentaMotivo as CM ON M.CON_MotivoTransaccion_ID = CM.CON_MotivoTransaccion_ID
        INNER JOIN pymeERP.CON_CatalogoContable as CC ON CC.CON_CatalogoContable_ID = CM.CON_CatalogoContable_ID
        WHERE
             (CM.CON_CuentaMotivo_DebeHaber = 0
                XOR L.CON_LibroDiario_AsientoReversion = 1)
                AND L.CON_LibroDiario_FechaCreacion <= FechaFinal
        GROUP BY CM.CON_CatalogoContable_ID) as Debe ON Haber.CON_CatalogoContable_ID = Debe.CON_CatalogoContable_ID)
    UNION
    (select * from
        (SELECT 
                CM.CON_CatalogoContable_ID,
                    sum(L2.CON_LibroDiario_Monto) Haber
            FROM
                pymeERP.CON_LibroDiario as L2
            INNER JOIN pymeERP.CON_MotivoTransaccion as M ON M.CON_MotivoTransaccion_ID = L2.CON_MotivoTransaccion_ID
            INNER JOIN pymeERP.CON_CuentaMotivo as CM ON M.CON_MotivoTransaccion_ID = CM.CON_MotivoTransaccion_ID
            WHERE
                 (CM.CON_CuentaMotivo_DebeHaber = 1
                    XOR L2.CON_LibroDiario_AsientoReversion = 1)
                    AND L2.CON_LibroDiario_FechaCreacion <= FechaFinal
            GROUP BY CM.CON_CatalogoContable_ID
            ORDER BY CM.CON_CatalogoContable_ID) as Haber
     RIGHT JOIN
            (SELECT 
                sum(L.CON_LibroDiario_Monto) Debe,
                    CM.CON_CatalogoContable_ID
            FROM
                pymeERP.CON_LibroDiario as L
            INNER JOIN pymeERP.CON_MotivoTransaccion as M ON M.CON_MotivoTransaccion_ID = L.CON_MotivoTransaccion_ID
            INNER JOIN pymeERP.CON_CuentaMotivo as CM ON M.CON_MotivoTransaccion_ID = CM.CON_MotivoTransaccion_ID
            INNER JOIN pymeERP.CON_CatalogoContable as CC ON CC.CON_CatalogoContable_ID = CM.CON_CatalogoContable_ID
            WHERE
                 (CM.CON_CuentaMotivo_DebeHaber = 0
                    XOR L.CON_LibroDiario_AsientoReversion = 1)
                    AND L.CON_LibroDiario_FechaCreacion <= FechaFinal
            GROUP BY CM.CON_CatalogoContable_ID) as Debe ON Haber.CON_CatalogoContable_ID = Debe.CON_CatalogoContable_ID);

      -- DECLARE EXIT HANDLER FOR SQLEXCEPTION,SQLWARNING
         -- BEGIN
            -- ROLLBACK;
         -- END;

    DECLARE CONTINUE HANDLER 
    FOR NOT FOUND SET finished = 1;

    -- START TRANSACTION;

    
     INSERT INTO `pymeERP`.`CON_LibroMayor`
        (`CON_PeriodoContable_CON_PeriodoContable_ID`,
        `CON_LibroMayor_FechaCreacion`,
        `CON_LibroMayor_FechaModificacion`)
        VALUES
        (
        ID_PeriodoContable,
        Now(),
        Now());
    

    SELECT CON_LibroMayor_ID INTO ID_LibroMayor 
    FROM `pymeERP`.`CON_LibroMayor` as LM
    WHERE LM.CON_PeriodoContable_CON_PeriodoContable_ID=ID_PeriodoContable LIMIT 1;


    OPEN cuentaT_cursor;
    get_cuentaT: LOOP

        FETCH cuentaT_cursor INTO ID_Haber,Haber,Debe,ID_Debe;

        IF finished = 1 THEN 
            LEAVE get_cuentaT;
        END IF;

        IF ID_Haber IS NULL THEN
             SET ID_Cuenta= ID_Debe;
             SET Haber=0;
        ELSEIF ID_Debe IS NULL THEN
            SET ID_Cuenta=ID_Haber;
            SET Debe=0;
        ELSE 
            SET ID_Cuenta=ID_Haber;
        END IF;

        IF Debe>Haber THEN 
            SET SaldoFinal=Debe-Haber;
            SET Deudor_Acreedor=0;
        ELSEIF Haber>Debe THEN
            SET SaldoFinal=Haber-Debe;
            SET Deudor_Acreedor=1;
        END IF;

        INSERT INTO 
            `pymeERP`.`CON_CuentaT` (`CON_LibroMayor_ID`,`CON_CatalogoContable_ID`, `CON_CuentaT_SaldoFinal`, `CON_CuentaT_AcreedorDeudor`, `CON_CuentaT_FechaModificacion`, `CON_CuentaT_FechaCreacion`) 
                                    VALUES (ID_LibroMayor,ID_Cuenta,SaldoFinal,Deudor_Acreedor, Now(), Now());
        
    END LOOP get_cuentaT;

    CLOSE cuentaT_cursor;
    -- COMMIT;

 
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE `CON_EstadoResultados`(IN PeriodoContable_ID int)
BEGIN

  DECLARE ventas float;
  DECLARE Desc_Dev float;
  DECLARE Ingresos_op float;
  DECLARE costo_ventas float;
  DECLARE Utilidad_Bruta float;
  DECLARE Gasto_ventas float DEFAULT 0;
  DECLARE Gastos_operacional float;
  DECLARE Utilidad_operacional float;
  DECLARE Gasto_Financiero float;
  DECLARE Utilidad_ISR float;
  DECLARE Impuesto float;
  DECLARE Utilidad_neta float;

  -- DECLARE EXIT HANDLER FOR SQLEXCEPTION,SQLWARNING
         -- BEGIN
            -- ROLLBACK;
         -- END;

  SELECT 
    SUM(CT.CON_CuentaT_SaldoFinal) Venta
  into ventas
FROM
    pymeERP.CON_CuentaT as CT
        INNER JOIN
    pymeERP.CON_LibroMayor as M ON M.CON_LibroMayor_ID = CT.CON_LibroMayor_ID
WHERE
    (M.CON_PeriodoContable_CON_PeriodoContable_ID = PeriodoContable_ID)
        AND (CT.CON_CatalogoContable_ID = 60
        OR CT.CON_CatalogoContable_ID = 61
        OR CT.CON_CatalogoContable_ID = 62);

  
  
  SELECT 
    SUM(CT.CON_CuentaT_SaldoFinal) Venta
  into Desc_Dev
  FROM
    pymeERP.CON_CuentaT as CT
        INNER JOIN
    pymeERP.CON_LibroMayor as M ON M.CON_LibroMayor_ID = CT.CON_LibroMayor_ID
  WHERE
    M.CON_PeriodoContable_CON_PeriodoContable_ID = PeriodoContable_ID
        AND (CT.CON_CatalogoContable_ID = 63
        OR CT.CON_CatalogoContable_ID = 64
        OR CT.CON_CatalogoContable_ID = 65);

  IF(ventas is NULL) THEN
  set ventas = 0;
  END IF;

    

  IF(Desc_Dev is NULL) THEN
  set Desc_Dev = 0;
  END IF;

  SET Ingresos_op = ventas - Desc_Dev;

  
  SELECT SUM(CT.CON_CuentaT_SaldoFinal) Venta
into costo_ventas
    FROM pymeERP.CON_CuentaT CT 
    INNER JOIN  pymeERP.CON_LibroMayor as M ON M.CON_LibroMayor_ID=CT.CON_LibroMayor_ID 
    WHERE (M.CON_PeriodoContable_CON_PeriodoContable_ID=PeriodoContable_ID) AND (CT.CON_CatalogoContable_ID = 72);



  if(costo_ventas is NULL)THEN
   set costo_ventas = 0;
  END IF;

  set Gasto_ventas = 0;

  set Utilidad_Bruta = Ingresos_op-costo_ventas-Gasto_ventas;

  SELECT SUM(CT.CON_CuentaT_SaldoFinal) Venta
  into Gastos_operacional
    FROM pymeERP.CON_CuentaT CT 
    INNER JOIN  pymeERP.CON_LibroMayor as M ON M.CON_LibroMayor_ID=CT.CON_LibroMayor_ID 
    WHERE (M.CON_PeriodoContable_CON_PeriodoContable_ID=PeriodoContable_ID) AND (CT.CON_CatalogoContable_ID = 73);



  IF(Gastos_operacional is NULL) THEN
  set Gastos_operacional =0;
  END IF;

  set Utilidad_operacional = Utilidad_Bruta - Gastos_operacional;



    
    SELECT SUM(CT.CON_CuentaT_SaldoFinal) Venta
    into Gasto_Financiero
    FROM pymeERP.CON_CuentaT CT 
    INNER JOIN  pymeERP.CON_LibroMayor as M ON M.CON_LibroMayor_ID=CT.CON_LibroMayor_ID 
    WHERE (M.CON_PeriodoContable_CON_PeriodoContable_ID=PeriodoContable_ID) AND (CT.CON_CatalogoContable_ID = 74);
  

    IF(Gasto_Financiero is NULL) THEN
    set Gasto_Financiero = 0;
    END IF;

    set Utilidad_ISR = Utilidad_operacional - Gasto_Financiero;

    IF(Utilidad_ISR < 0)THEN
    set Impuesto = 0;
    set Utilidad_neta= Utilidad_ISR;
    ELSE
    set Impuesto = Utilidad_ISR*0.25;
    set Utilidad_neta = Utilidad_ISR - Impuesto;
    END IF;

    -- START TRANSACTION;

    INSERT INTO `pymeERP`.`CON_EstadoResultado` (`CON_PeriodoContable_ID`, `CON_EstadoResultados_Ingresos`, `CON_EstadoResultados_CostoVentas`, `CON_EstadoResultados_UtilidadBruta`, `CON_EstadoResultados_GastosdeVentas`, `CON_EstadoResultados_GastosAdministrativos`, `CON_EstadoResultados_UtilidadOperacion`, `CON_EstadoResultados_GastoFinanciero`, `CON_EstadoResultados_UtilidadAntesImpuesto`, `CON_EstadoResultados_Impuesto`, `CON_EstadoResultados_UtilidadPerdidaFinal`, `CON_EstadoResultados_FechaCreacion`, `CON_EstadoResultados_FechaModificacion`) 
    VALUES (PeriodoContable_ID, Ingresos_op, costo_ventas , Utilidad_Bruta, Gasto_ventas, Gastos_operacional, Utilidad_operacional, Gasto_Financiero, Utilidad_ISR, Impuesto, Utilidad_neta, Now(), Now());
    
    -- COMMIT;
  END$$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE `CON_BalanceGeneral`(IN ID_PeriodoContable INTEGER)
BEGIN
  DECLARE TotalActivosC INTEGER DEFAULT 0;
  DECLARE TotalActivosNC INTEGER DEFAULT 0;
  DECLARE TotalPasivosC INTEGER DEFAULT 0;
  DECLARE TotalPasivosNC INTEGER DEFAULT 0;
  DECLARE CapitalFinal INTEGER DEFAULT 0;
  DECLARE finished INTEGER DEFAULT 0;

  DECLARE saldoFinal FLOAT DEFAULT 0;
  DECLARE idCuenta   INTEGER DEFAULT 0;
  DECLARE idClasif   INTEGER DEFAULT 0;
  DECLARE cuentas_cursor CURSOR FOR   
    (SELECT
      CT.CON_CuentaT_SaldoFinal,
      CC.CON_CatalogoContable_ID,
      ClC.CON_ClasificacionCuenta_ID
    from
      pymeERP.CON_LibroMayor as L
        INNER JOIN
      pymeERP.CON_CuentaT as CT ON L.CON_LibroMayor_ID = CT.CON_LibroMayor_ID
        INNER JOIN
      pymeERP.CON_CatalogoContable as CC ON CC.CON_CatalogoContable_ID = CT.CON_CatalogoContable_ID
        INNER JOIN 
      pymeERP.CON_ClasificacionCuenta as ClC ON ClC.CON_ClasificacionCuenta_ID=CC.CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID
    WHERE ClC.CON_ClasificacionCuenta_ID BETWEEN 1 AND 5
    ORDER BY ClC.CON_ClasificacionCuenta_ID);
    
   -- DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
    -- BEGIN
      -- ROLLBACK;
    -- END;
  
    DECLARE CONTINUE HANDLER 
    FOR NOT FOUND SET finished = 1;
    
    -- START TRANSACTION;
  
INSERT INTO `pymeERP`.`CON_BalanceGeneral`
(`CON_PeriodoContable_ID`,
`CON_BalanceGeneral_TotalActivosC`,
`CON_BalanceGeneral_TotalPasivosC`,
`CON_BalanceGeneral_TotalActivosNC`,
`CON_BalanceGeneral_TotalPasivosNC`,
`CON_BalanceGeneral_CapitalFinal`,
`CON_BalanceGeneral_FechaCreacion`,
`CON_BalanceGeneral_FechaModificacion`)
VALUES
(ID_PeriodoContable,0,0,0,0,0,
Now(),
Now());


    open cuentas_cursor;

    get_cuenta : LOOP
      
      FETCH cuentas_cursor INTO saldoFinal,idCuenta,idClasif;

      IF finished = 1 THEN 
        LEAVE get_cuenta;
      END IF;

      INSERT INTO `pymeERP`.`CON_DetalleBalance`
      (`CON_CatalogoContable_ID`,
      `CON_DetalleBalance_Saldo`,
      `CON_DetalleBalance_FechaCreacion`,
      `CON_DetalleBalance_FechaModificacion`,
      `CON_BalanceGeneral_ID`)
      VALUES
      (idCuenta,
      saldoFinal,
      Now(),
      Now(),
      ID_PeriodoContable);

      CASE idClasif
        WHEN 1 THEN 
          SET TotalActivosC=TotalActivosC+saldoFinal;
        WHEN 2 THEN
          SET TotalActivosNC=TotalActivosNC+saldoFinal;
        WHEN 3 THEN
          SET TotalActivosNC=TotalActivosNC+saldoFinal;
        WHEN 4 THEN 
          SET TotalPasivosC=TotalPasivosC+saldoFinal;
        WHEN 5 THEN 
          SET TotalPasivosNC=TotalPasivosNC+saldoFinal;
        ELSE BEGIN END;
      END CASE;


    END LOOP get_cuenta;
    close cuentas_cursor;

    UPDATE `pymeERP`.`CON_BalanceGeneral`
    SET
    `CON_BalanceGeneral_TotalActivosC` = TotalActivosC,
    `CON_BalanceGeneral_TotalPasivosC` = TotalPasivosC,
    `CON_BalanceGeneral_TotalActivosNC` = TotalActivosNC,
    `CON_BalanceGeneral_TotalPasivosNC` = TotalPasivosNC,
    `CON_BalanceGeneral_CapitalFinal` = TotalActivosC+TotalActivosNC-TotalPasivosC-TotalPasivosNC
    WHERE `CON_PeriodoContable_ID` = ID_PeriodoContable;
    -- COMMIT;

END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE `CON_NuevoPeriodo`(IN ID_PeriodoContable INTEGER)
BEGIN

  DECLARE FechaFinal_Old datetime;
  DECLARE FechaInicio_New datetime;
  DECLARE FechaFinal_New datetime;
  DECLARE ID_ClasificacionPeriodo integer;
  DECLARE CantidadDias integer;

  -- DECLARE EXIT HANDLER FOR SQLEXCEPTION,SQLWARNING
         -- BEGIN
            -- ROLLBACK;
      -- SELECT 1;
         -- END;

  SELECT PC.CON_PeriodoContable_FechaFinal,PC.CON_ClasificacionPeriodo_ID, CP.CON_ClasificacionPeriodo_CatidadDias
    INTO  FechaFinal_Old, ID_ClasificacionPeriodo, CantidadDias
    FROM CON_PeriodoContable as PC
    INNER JOIN CON_ClasificacionPeriodo as CP
    ON PC.CON_ClasificacionPeriodo_ID=CP.CON_ClasificacionPeriodo_ID
    WHERE PC.CON_PeriodoContable_ID=ID_PeriodoContable;

  SET FechaInicio_New= DATE_ADD(FechaFinal_Old, INTERVAL 1 DAY);
  SET FechaFinal_New=DATE_ADD(FechaInicio_New, INTERVAL CantidadDias DAY);

  -- START TRANSACTION;

    INSERT INTO `pymeERP`.`CON_PeriodoContable`
    (
    `CON_PeriodoContable_FechaInicio`,
    `CON_PeriodoContable_FechaFinal`,
    `CON_PeriodoContable_FechaCreacion`,
    `CON_PeriodoContable_FechaModificacion`,
    `CON_ClasificacionPeriodo_ID`)
    VALUES
    (FechaInicio_New,
    FechaFinal_New,
    Now(),
    Now(),
    ID_ClasificacionPeriodo);


  -- COMMIT;
  SELECT 0;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE `CON_BalanzaComprobacion`(IN ID_PeriodoContable integer)
BEGIN
  SELECT 
    CC.CON_CatalogoContable_Nombre,
    CT.CON_CuentaT_SaldoFinal,
    CT.CON_CuentaT_AcreedorDeudor
  from
    pymeERP.CON_LibroMayor as L
      INNER JOIN
    pymeERP.CON_CuentaT as CT ON L.CON_LibroMayor_ID = CT.CON_LibroMayor_ID
      INNER JOIN
    pymeERP.CON_CatalogoContable as CC ON CC.CON_CatalogoContable_ID = CT.CON_CatalogoContable_ID
  WHERE
    L.CON_PeriodoContable_CON_PeriodoContable_ID = ID_PeriodoContable;
END$$
DELIMITER ;


