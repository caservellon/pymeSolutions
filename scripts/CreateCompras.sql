-- -----------------------------------------------------
-- Table `pymeERP`.`COM_SolicitudCotizacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_SolicitudCotizacion` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_SolicitudCotizacion` (
  `COM_SolicitudCotizacion_IdSolicitudCotizacion` INT NOT NULL AUTO_INCREMENT,
  `COM_SolicitudCotizacion_Codigo` VARCHAR(16) NOT NULL,
  `COM_SolicitudCotizacion_FechaEmision` DATETIME NOT NULL,
  `COM_SolicitudCotizacion_DireccionEntrega` VARCHAR(120) NOT NULL,
  `COM_SolicitudCotizacion_FechaEntrega` DATETIME NOT NULL,
  `COM_SolicitudCotizacion_FormaPago` INT NOT NULL,
  `COM_SolicitudCotizacion_CantidadPago` INT NULL,
  `COM_SolicitudCotizacion_PeriodoGracia` INT NULL,
  `COM_SolicitudCotizacion_Recibido` TINYINT(1) NULL,
  `COM_SolicitudCotizacion_Imprimir` TINYINT(1) NULL,
  `COM_SolicitudCotizacion_Activo` TINYINT(1) NOT NULL,
  `COM_SolicitudCotizacion_FechaCreacion` DATE NOT NULL,
  `COM_SolicitudCotizacion_FechaModificacion` DATE NULL,
  `COM_Usuario_idUsuarioCreo` VARCHAR(64) NOT NULL,
  `Proveedor_idProveedor` INT NOT NULL,
  `Usuario_idUsuarioModifico` VARCHAR(64) NULL,
  PRIMARY KEY (`COM_SolicitudCotizacion_IdSolicitudCotizacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_Cotizacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_Cotizacion` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_Cotizacion` (
  `COM_Cotizacion_IdCotizacion` INT NOT NULL AUTO_INCREMENT,
  `COM_Cotizacion_Codigo` VARCHAR(16) NOT NULL,
  `COM_Cotizacion_FechaEmision` DATETIME NOT NULL,
  `COM_Cotizacion_FechaEntrega` DATETIME NOT NULL,
  `COM_Cotizacion_Activo` TINYINT(1) NOT NULL,
  `COM_Cotizacion_Total` DECIMAL(19,2) NOT NULL,
  `COM_Cotizacion_Vigencia` DATETIME NOT NULL,
  `COM_Cotizacion_IdFormaPago` INT NULL,
  `COM_Cotizacion_CantidadPago` INT NOT NULL,
  `COM_Cotizacion_PeriodoGracia` INT NOT NULL,
  `COM_Cotizacion_NumeroCotizacion` VARCHAR(45) NOT NULL,
  `COM_Cotizacion_FechaCreacion` DATETIME NOT NULL,
  `COM_Cotizacion_Vigente` TINYINT(1) NOT NULL,
  `COM_Cotizacion_FechaModificacion` DATETIME NULL,
  `COM_Cotizacion_idSolicitudCotizacion` INT NOT NULL,
  `COM_Usuario_idUsuarioCreo` VARCHAR(64) NOT NULL,
  `COM_Proveedor_idProveedor` INT NOT NULL,
  `Usuario_idUsuarioModifico` VARCHAR(64) NULL,
  `COM_Cotizacion_ISV` DECIMAL(19,2) NOT NULL,
  PRIMARY KEY (`COM_Cotizacion_IdCotizacion`),
  INDEX `fk_Cotizacion_SolicitudCotizacion1_idx` (`COM_Cotizacion_idSolicitudCotizacion` ASC),
  UNIQUE INDEX `COM_Cotizacion_Codigo_UNIQUE` (`COM_Cotizacion_Codigo` ASC),
  CONSTRAINT `fk_Cotizacion_SolicitudCotizacion1`
    FOREIGN KEY (`COM_Cotizacion_idSolicitudCotizacion`)
    REFERENCES `pymeERP`.`COM_SolicitudCotizacion` (`COM_SolicitudCotizacion_IdSolicitudCotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_OrdenCompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_OrdenCompra` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_OrdenCompra` (
  `COM_OrdenCompra_IdOrdenCompra` INT NOT NULL AUTO_INCREMENT,
  `COM_OrdenCompra_Codigo` VARCHAR(16) NOT NULL,
  `COM_OrdenCompra_FechaEmision` DATETIME NOT NULL,
  `COM_OrdenCompra_FechaEntrega` DATETIME NOT NULL,
  `COM_OrdenCompra_DireccionEntrega` VARCHAR(120) NOT NULL,
  `COM_OrdenCompra_Activo` TINYINT(1) NOT NULL,
  `COM_OrdenCompra_Total` DECIMAL(19,2) NOT NULL,
  `COM_OrdenCompra_FechaCreacion` DATETIME NOT NULL,
  `COM_OrdenCompra_FormaPago` INT NOT NULL,
  `COM_OrdenCompra_CantidadPago` INT NOT NULL,
  `COM_OrdenCompra_PeriodoGracia` INT NOT NULL,
  `COM_OrdenCompra_FechaModificacion` DATETIME NULL,
  `COM_OrdenCompra_IdCotizacion` INT NULL,
  `COM_Usuario_IdUsuarioCreo` VARCHAR(64) NOT NULL,
  `COM_Proveedor_IdProveedor` INT NOT NULL,
  `Usuario_idUsuarioModifico` VARCHAR(64) NULL,
  `COM_OrdenCompra_ISV` DECIMAL(19,2) NOT NULL,
  PRIMARY KEY (`COM_OrdenCompra_IdOrdenCompra`),
  INDEX `fk_OrdenCompra_Cotizacion1_idx` (`COM_OrdenCompra_IdCotizacion` ASC),
  UNIQUE INDEX `COM_OrdenCompra_Codigo_UNIQUE` (`COM_OrdenCompra_Codigo` ASC),
  CONSTRAINT `fk_OrdenCompra_Cotizacion1`
    FOREIGN KEY (`COM_OrdenCompra_IdCotizacion`)
    REFERENCES `pymeERP`.`COM_Cotizacion` (`COM_Cotizacion_IdCotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_OrdenPago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_OrdenPago` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_OrdenPago` (
  `COM_OrdenPago_IdOrdenPago` INT NOT NULL AUTO_INCREMENT,
  `COM_OrdenPago_Codigo` VARCHAR(16) NOT NULL,
  `COM_OrdenPago_Observacion` INT NULL,
  `COM_OrdenCompra_idOrdenCompra` INT NOT NULL,
  `COM_OrdenPago_Activo` INT NOT NULL,
  `COM_Usuario_idUsuarioCreo` VARCHAR(64) NOT NULL,
  `COM_OrdenCompra_FechaCreo` DATETIME NOT NULL,
  `Usuario_idUsuarioModifico` VARCHAR(64) NULL,
  `COM_OrdenCompra_FechaModifico` DATETIME  NULL,
  `COM_OrdenCompra_FechaPagar` DATETIME  NOT NULL,
  `COM_OrdenCompra_Monto` DECIMAL(19,2) NOT NULL,
  `COM_Proveedor_IdProveedor` INT NOT NULL,
  `COM_OrdenCompra_FormaPago` INT NOT NULL,
  PRIMARY KEY (`COM_OrdenPago_IdOrdenPago`),
  INDEX `fk_OrdenPago_OrdenCompra1_idx` (`COM_OrdenCompra_idOrdenCompra` ASC),
  UNIQUE INDEX `COM_OrdenPago_Codigo_UNIQUE` (`COM_OrdenPago_Codigo` ASC),
  CONSTRAINT `fk_OrdenPago_OrdenCompra1`
    FOREIGN KEY (`COM_OrdenCompra_idOrdenCompra`)
    REFERENCES `pymeERP`.`COM_OrdenCompra` (`COM_OrdenCompra_IdOrdenCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_DetalleSolicitudCotizacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_DetalleSolicitudCotizacion` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_DetalleSolicitudCotizacion` (
  `idDetalleSolicitudCotizacion` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT NOT NULL,
  `SolicitudCotizacion_idSolicitudCotizacion` INT NOT NULL,
  `Producto_idProducto` INT NOT NULL,
  `COM_Usuario_idUsuarioCreo` VARCHAR(64) NOT NULL,
  `Usuario_idUsuarioModifico` VARCHAR(64) NULL,
  PRIMARY KEY (`idDetalleSolicitudCotizacion`),
  INDEX `fk_DetalleSolicitudCotizacion_SolicitudCotizacion_idx` (`SolicitudCotizacion_idSolicitudCotizacion` ASC),
  CONSTRAINT `fk_DetalleSolicitudCotizacion_SolicitudCotizacion`
    FOREIGN KEY (`SolicitudCotizacion_idSolicitudCotizacion`)
    REFERENCES `pymeERP`.`COM_SolicitudCotizacion` (`COM_SolicitudCotizacion_IdSolicitudCotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_Detalle_Cotizacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_DetalleCotizacion` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_DetalleCotizacion` (
  `COM_DetalleCotizacion_IdDetalleCotizacion` INT NOT NULL AUTO_INCREMENT,
  `COM_DetalleCotizacion_Codigo` VARCHAR(16) NOT NULL,
  `COM_DetalleCotizacion_Cantidad` INT NOT NULL,
  `COM_DetalleCotizacion_PrecioUnitario` DECIMAL(19,2) NOT NULL,
  `COM_DetalleCotizacion_IdCotizacion` INT NOT NULL,
  `COM_Producto_Id_Producto` INT NOT NULL,
  `COM_Usuario_idUsuarioCreo` VARCHAR(64) NOT NULL,
  `Usuario_idUsuarioModifico` VARCHAR(64) NULL,
  PRIMARY KEY (`COM_DetalleCotizacion_IdDetalleCotizacion`),
  INDEX `fk_DetalleCotizacion_Cotizacion1_idx` (`COM_DetalleCotizacion_IdCotizacion` ASC),
  UNIQUE INDEX `COM_DetalleCotizacion_Codigo_UNIQUE` (`COM_DetalleCotizacion_Codigo` ASC),
  CONSTRAINT `fk_DetalleCotizacion_Cotizacion1`
    FOREIGN KEY (`COM_DetalleCotizacion_IdCotizacion`)
    REFERENCES `pymeERP`.`COM_Cotizacion` (`COM_Cotizacion_IdCotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_DetalleOrdenCompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_DetalleOrdenCompra` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_DetalleOrdenCompra` (
  `COM_DetalleOrdenCompra_IdDetalleOrdenCompra` INT NOT NULL AUTO_INCREMENT,
  `COM_DetalleOrdenCompra_Codigo` VARCHAR(16) NOT NULL,
  `COM_DetalleOrdenCompra_Cantidad` INT NOT NULL,
  `COM_DetalleOrdenCompra_PrecioUnitario` DECIMAL(19,2) NOT NULL,
  `COM_DetalleOrdenCompra_idOrdenCompra` INT NOT NULL,
  `COM_Producto_idProducto` INT NOT NULL,
  `COM_Usuario_idUsuarioCreo` VARCHAR(64) NOT NULL,
  `Usuario_idUsuarioModifico` VARCHAR(64) NULL,
  PRIMARY KEY (`COM_DetalleOrdenCompra_IdDetalleOrdenCompra`),
  INDEX `fk_DetalleOrdenCompra_OrdenCompra1_idx` (`COM_DetalleOrdenCompra_idOrdenCompra` ASC),
  UNIQUE INDEX `COM_DetalleOrdenCompra_Codigo_UNIQUE` (`COM_DetalleOrdenCompra_Codigo` ASC),
  CONSTRAINT `fk_DetalleOrdenCompra_OrdenCompra1`
    FOREIGN KEY (`COM_DetalleOrdenCompra_idOrdenCompra`)
    REFERENCES `pymeERP`.`COM_OrdenCompra` (`COM_OrdenCompra_IdOrdenCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_EstadoOrdenCompra` (
  `COM_EstadoOrdenCompra_IdEstadoOrdenCompra` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_EstadoOrdenCompra_Codigo` VARCHAR(16) NOT NULL ,
  `COM_EstadoOrdenCompra_Nombre` VARCHAR(45) NOT NULL ,
  `COM_EstadoOrdenCompra_Observacion` TEXT NOT NULL ,
  `COM_EstadoOrdenCompra_Activo` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra`) )
ENGINE = InnoDB;


CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_TransicionEstado` (
  `COM_TransicionEstado_Id` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_TransicionEstado_Codigo` VARCHAR(16) NOT NULL ,
  `COM_TransicionEstado_Activo` TINYINT(1) NULL DEFAULT NULL ,
  `COM_TransicionEstado_IdOrdenCompra` INT(11) NOT NULL ,
  `COM_Usuario_idUsuarioCreo` VARCHAR(64) NOT NULL ,
  `COM_TransicionEstado_FechaCreo` DATETIME NOT NULL ,
  `COM_TransicionEstado_Observacion` TEXT NULL DEFAULT NULL ,
  `COM_EstadoOrdenCompra_IdEstAnt` INT(11) NOT NULL ,
  `COM_EstadoOrdenCompra_IdEstAct` INT(11) NOT NULL ,
  PRIMARY KEY (`COM_TransicionEstado_Id`) ,
  INDEX `fk_TransicionEstado_OrdenCompra1_idx` (`COM_TransicionEstado_IdOrdenCompra` ASC) ,
  UNIQUE INDEX `COM_TransicionEstado_Codigo_UNIQUE` (`COM_TransicionEstado_Codigo` ASC) ,
  INDEX `fk_COM_TransicionEstado_COM_EstadoOrdenCompra1_idx` (`COM_EstadoOrdenCompra_IdEstAnt` ASC) ,
  INDEX `fk_COM_TransicionEstado_COM_EstadoOrdenCompra2_idx` (`COM_EstadoOrdenCompra_IdEstAct` ASC) ,
  CONSTRAINT `fk_TransicionEstado_OrdenCompra1`
    FOREIGN KEY (`COM_TransicionEstado_IdOrdenCompra` )
    REFERENCES `pymeERP`.`COM_OrdenCompra` (`COM_OrdenCompra_IdOrdenCompra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COM_TransicionEstado_COM_EstadoOrdenCompra1`
    FOREIGN KEY (`COM_EstadoOrdenCompra_IdEstAnt` )
    REFERENCES `pymeERP`.`COM_EstadoOrdenCompra` (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COM_TransicionEstado_COM_EstadoOrdenCompra2`
    FOREIGN KEY (`COM_EstadoOrdenCompra_IdEstAct` )
    REFERENCES `pymeERP`.`COM_EstadoOrdenCompra` (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_OrdenCompra_TransicionEstado` (
  `COM_OrdenCompra_TransicionEstado_Id` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_OrdenCompra_TransicionEstado_Observacion` TEXT NOT NULL ,
  `COM_OrdenCompra_TransicionEstado_EstadoActual` INT(11) NOT NULL ,
  `COM_OrdenCompra_TransicionEstado_EstadoPrevio` INT(11) NOT NULL ,
  `COM_OrdenCompra_TransicionEstado_EstadoPosterior` INT(11) NOT NULL ,
  `COM_TransicionEstado_Activo` TINYINT(1) NOT NULL ,
  INDEX `fk_OrdenCompra_TransicionEstado_EstadoOrdenCompra1_idx` (`COM_OrdenCompra_TransicionEstado_EstadoPrevio` ASC) ,
  INDEX `fk_OrdenCompra_TransicionEstado_EstadoOrdenCompra2_idx` (`COM_OrdenCompra_TransicionEstado_EstadoPosterior` ASC) ,
  INDEX `fk_OrdenCompra_TransicionEstado_EstadoOrdenCompra3_idx` (`COM_OrdenCompra_TransicionEstado_EstadoActual` ASC) ,
  PRIMARY KEY (`COM_OrdenCompra_TransicionEstado_Id`) ,
  CONSTRAINT `fk_OrdenCompra_TransicionEstado_EstadoOrdenCompra1`
    FOREIGN KEY (`COM_OrdenCompra_TransicionEstado_EstadoPrevio` )
    REFERENCES `pymeERP`.`COM_EstadoOrdenCompra` (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OrdenCompra_TransicionEstado_EstadoOrdenCompra2`
    FOREIGN KEY (`COM_OrdenCompra_TransicionEstado_EstadoPosterior` )
    REFERENCES `pymeERP`.`COM_EstadoOrdenCompra` (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OrdenCompra_TransicionEstado_EstadoOrdenCompra3`
    FOREIGN KEY (`COM_OrdenCompra_TransicionEstado_EstadoActual` )
    REFERENCES `pymeERP`.`COM_EstadoOrdenCompra` (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `pymeERP`.`COM_ValorCampoLocal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_ValorCampoLocal` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_ValorCampoLocal` (
  `COM_ValorCampoLocal_IdValorCampoLocal` INT NOT NULL AUTO_INCREMENT,
  `COM_ValorCampoLocal_Valor` VARCHAR(64) NOT NULL,
  `COM_CampoLocal_IdCampoLocal` INT NOT NULL,
  `COM_OrdenCompra_IdOrdenCompra` INT NULL,
  `COM_SolicitudCotizacion_IdSolicitudCotizacion` INT NULL,
  `COM_Cotizacion_IdCotizacion` INT NULL,
  `COM_Usuario_idUsuarioCreo` VARCHAR(64) NOT NULL,
  `Usuario_idUsuarioModifico` VARCHAR(64) NULL,
  PRIMARY KEY (`COM_ValorCampoLocal_IdValorCampoLocal`),
  INDEX `fk_ValorCampoLocal_CampoLocal1_idx` (`COM_CampoLocal_IdCampoLocal` ASC),
  INDEX `fk_ValorCampoLocal_OrdenCompra1_idx` (`COM_OrdenCompra_IdOrdenCompra` ASC),
  INDEX `fk_ValorCampoLocal_SolicitudCotizacion1_idx` (`COM_SolicitudCotizacion_IdSolicitudCotizacion` ASC),
  INDEX `fk_ValorCampoLocal_Cotizacion1_idx` (`COM_Cotizacion_IdCotizacion` ASC),
  CONSTRAINT `fk_ValorCampoLocal_CampoLocal1`
    FOREIGN KEY (`COM_CampoLocal_IdCampoLocal`)
    REFERENCES `pymeERP`.`GEN_CampoLocal` (`GEN_CampoLocal_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ValorCampoLocal_OrdenCompra1`
    FOREIGN KEY (`COM_OrdenCompra_IdOrdenCompra`)
    REFERENCES `pymeERP`.`COM_OrdenCompra` (`COM_OrdenCompra_IdOrdenCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ValorCampoLocal_SolicitudCotizacion1`
    FOREIGN KEY (`COM_SolicitudCotizacion_IdSolicitudCotizacion`)
    REFERENCES `pymeERP`.`COM_SolicitudCotizacion` (`COM_SolicitudCotizacion_IdSolicitudCotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ValorCampoLocal_Cotizacion1`
    FOREIGN KEY (`COM_Cotizacion_IdCotizacion`)
    REFERENCES `pymeERP`.`COM_Cotizacion` (`COM_Cotizacion_IdCotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


