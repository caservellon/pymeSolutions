

-- -----------------------------------------------------
-- Table `pymeERP`.`COM_SolicitudCotizacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_SolicitudCotizacion` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_SolicitudCotizacion` (
  `COM_SolicitudCotizacion_IdSolicitudCotizacion` INT NOT NULL AUTO_INCREMENT,
  `COM_SolicitudCotizacion_Codigo` VARCHAR(16) NOT NULL,
  `COM_SolicitudCotizacion_FechaEmision` DATE NOT NULL,
  `COM_SolicitudCotizacion_DireccionEntrega` VARCHAR(120) NOT NULL,
  `COM_SolicitudCotizacion_FechaEntrega` DATE NOT NULL,
  `COM_SolicitudCotizacion_Recibido` BIT NULL,
  `COM_SolicitudCotizacion_Activo` BIT NOT NULL,
  `COM_SolicitudCotizacion_FechaCreacion` DATE NOT NULL,
  `COM_SolicitudCotizacion_FechaModificacion` DATE NULL,
  `COM_Usuario_idUsuarioCreo` INT NOT NULL,
  `Proveedor_idProveedor` INT NOT NULL,
  `Usuario_idUsuarioModifico` INT NULL,
  PRIMARY KEY (`COM_SolicitudCotizacion_IdSolicitudCotizacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_Cotizacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_Cotizacion` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_Cotizacion` (
  `COM_Cotizacion_IdCotizacion` INT NOT NULL,
  `COM_Cotizacion_Codigo` VARCHAR(16) NOT NULL,
  `COM_Cotizacion_FechaEmision` DATE NOT NULL,
  `COM_Cotizacion_FechaEntrega` DATE NOT NULL,
  `COM_Cotizacion_Activo` BIT NOT NULL,
  `COM_Cotizacion_Total` FLOAT NOT NULL,
  `COM_Cotizacion_Vigencia` DATE NOT NULL,
  `COM_Cotizacion_NumeroCotizacion` VARCHAR(45) NOT NULL,
  `COM_Cotizacion_FechaCreacion` DATE NOT NULL,
  `COM_Cotizacion_FechaModificacion` DATE NULL,
  `COM_SolicitudCotizacion_idSolicitudCotizacion` INT NOT NULL,
  `COM_Usuario_idUsuarioCreo` INT NOT NULL,
  `COM_Proveedor_idProveedor` INT NOT NULL,
  `Usuario_idUsuarioModifico` INT NULL,
  PRIMARY KEY (`COM_Cotizacion_IdCotizacion`),
  INDEX `fk_Cotizacion_SolicitudCotizacion1_idx` (`COM_SolicitudCotizacion_idSolicitudCotizacion` ASC),
  UNIQUE INDEX `COM_Cotizacion_Codigo_UNIQUE` (`COM_Cotizacion_Codigo` ASC),
  CONSTRAINT `fk_Cotizacion_SolicitudCotizacion1`
    FOREIGN KEY (`COM_SolicitudCotizacion_idSolicitudCotizacion`)
    REFERENCES `pymeERP`.`COM_SolicitudCotizacion` (`COM_SolicitudCotizacion_IdSolicitudCotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_OrdenCompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_OrdenCompra` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_OrdenCompra` (
  `COM_OrdenCompra_IdOrdenCompra` INT NOT NULL,
  `COM_OrdenCompra_Codigo` VARCHAR(16) NOT NULL,
  `COM_OrdenCompra_FechaEmision` DATE NOT NULL,
  `COM_OrdenCompra_FechaEntrega` DATE NOT NULL,
  `COM_OrdenCompra_DireccionEntrega` VARCHAR(120) NOT NULL,
  `COM_OrdenCompra_Activo` BIT NOT NULL,
  `COM_OrdenCompra_Total` FLOAT NOT NULL,
  `COM_OrdenCompra_FechaCreacion` DATE NOT NULL,
  `COM_OrdenCompra_FechaModificacion` DATE NULL,
  `COM_Cotizacion_IdCotizacion` INT NULL,
  `COM_Usuario_IdUsuarioCreo` INT NOT NULL,
  `COM_Proveedor_IdProveedor` BLOB NOT NULL,
  `Usuario_idUsuarioModifico` INT NULL,
  PRIMARY KEY (`COM_OrdenCompra_IdOrdenCompra`),
  INDEX `fk_OrdenCompra_Cotizacion1_idx` (`COM_Cotizacion_IdCotizacion` ASC),
  UNIQUE INDEX `COM_OrdenCompra_Codigo_UNIQUE` (`COM_OrdenCompra_Codigo` ASC),
  CONSTRAINT `fk_OrdenCompra_Cotizacion1`
    FOREIGN KEY (`COM_Cotizacion_IdCotizacion`)
    REFERENCES `pymeERP`.`COM_Cotizacion` (`COM_Cotizacion_IdCotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_OrdenPago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_OrdenPago` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_OrdenPago` (
  `COM_OrdenPago_IdOrdenPago` INT NOT NULL,
  `COM_OrdenPago_Codigo` VARCHAR(16) NOT NULL,
  `COM_OrdenPago_Observacion` INT NULL,
  `COM_OrdenCompra_idOrdenCompra` INT NOT NULL,
  `COM_OrdenPago_Activo` BIT NOT NULL,
  `COM_Usuario_idUsuarioCreo` INT NOT NULL,
  `Usuario_idUsuarioModifico` INT NULL,
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
  `idDetalleSolicitudCotizacion` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `SolicitudCotizacion_idSolicitudCotizacion` INT NOT NULL,
  `Producto_idProducto` INT NOT NULL,
  `COM_Usuario_idUsuarioCreo` INT NOT NULL,
  `Usuario_idUsuarioModifico` INT NULL,
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
DROP TABLE IF EXISTS `pymeERP`.`COM_Detalle_Cotizacion` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_Detalle_Cotizacion` (
  `COM_DetalleCotizacion_IdDetalleCotizacion` INT NOT NULL,
  `COM_DetalleCotizacion_Codigo` VARCHAR(16) NOT NULL,
  `COM_DetalleCotizacion_Cantidad` INT NOT NULL,
  `COM_DetalleCotizacion_PrecioUnitario` FLOAT NOT NULL,
  `COM_Cotizacion_IdCotizacion` INT NOT NULL,
  `COM_Producto_Id_Producto` INT NOT NULL,
  `COM_Usuario_idUsuarioCreo` INT NOT NULL,
  `Usuario_idUsuarioModifico` INT NULL,
  PRIMARY KEY (`COM_DetalleCotizacion_IdDetalleCotizacion`),
  INDEX `fk_DetalleCotizacion_Cotizacion1_idx` (`COM_Cotizacion_IdCotizacion` ASC),
  UNIQUE INDEX `COM_DetalleCotizacion_Codigo_UNIQUE` (`COM_DetalleCotizacion_Codigo` ASC),
  CONSTRAINT `fk_DetalleCotizacion_Cotizacion1`
    FOREIGN KEY (`COM_Cotizacion_IdCotizacion`)
    REFERENCES `pymeERP`.`COM_Cotizacion` (`COM_Cotizacion_IdCotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_DetalleOrdenCompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_DetalleOrdenCompra` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_DetalleOrdenCompra` (
  `COM_DetalleOrdenCompra_IdDetalleOrdenCompra` INT NOT NULL,
  `COM_DetalleOrdenCompra_Codigo` VARCHAR(16) NOT NULL,
  `COM_DetalleOrdenCompra_Cantidad` INT NOT NULL,
  `COM_DetalleOrdenCompra_PrecioUnitario` FLOAT NOT NULL,
  `COM_OrdenCompra_idOrdenCompra` INT NOT NULL,
  `COM_Producto_idProducto` INT NOT NULL,
  `COM_Usuario_idUsuarioCreo` INT NOT NULL,
  `Usuario_idUsuarioModifico` INT NULL,
  PRIMARY KEY (`COM_DetalleOrdenCompra_IdDetalleOrdenCompra`),
  INDEX `fk_DetalleOrdenCompra_OrdenCompra1_idx` (`COM_OrdenCompra_idOrdenCompra` ASC),
  UNIQUE INDEX `COM_DetalleOrdenCompra_Codigo_UNIQUE` (`COM_DetalleOrdenCompra_Codigo` ASC),
  CONSTRAINT `fk_DetalleOrdenCompra_OrdenCompra1`
    FOREIGN KEY (`COM_OrdenCompra_idOrdenCompra`)
    REFERENCES `pymeERP`.`COM_OrdenCompra` (`COM_OrdenCompra_IdOrdenCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`GEN_CampoLocal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`GEN_CampoLocal` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`GEN_CampoLocal` (
  `GEN_CampoLocal_IdCampoLocal` INT NOT NULL,
  `GEN_CampoLocal_Codigo` VARCHAR(16) NOT NULL,
  `GEN_CampoLocal_Activo` BIT NOT NULL,
  `GEN_CampoLocal_Nombre` VARCHAR(256) NOT NULL,
  `GEN_CampoLocal_Tipo` VARCHAR(45) NOT NULL,
  `GEN_CampoLocal_Requerido` BIT NOT NULL,
  `GEN_CampoLocal_ParametroBusqueda` BIT NOT NULL,
  `GEN_Usuario_idUsuarioCreo` INT NOT NULL,
  `Usuario_idUsuarioModifico` INT NULL,
  PRIMARY KEY (`GEN_CampoLocal_IdCampoLocal`),
  UNIQUE INDEX `COM_CampoLocal_Codigo_UNIQUE` (`GEN_CampoLocal_Codigo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_EstadoOrdenCompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_EstadoOrdenCompra` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_EstadoOrdenCompra` (
  `COM_EstadoOrdenCompra_IdEstadoOrdenCompra` INT NOT NULL,
  `COM_EstadoOrdenCompra_Codigo` VARCHAR(16) NOT NULL,
  `COM_EstadoOrdenCompra_Nombre` VARCHAR(45) NOT NULL,
  `COM_EstadoOrdenCompra_Observacion` TEXT NOT NULL,
  `COM_EstadoOrdenCompra_Activo` BIT NOT NULL,
  PRIMARY KEY (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_OrdenCompra_TransicionEstado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_OrdenCompra_TransicionEstado` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_OrdenCompra_TransicionEstado` (
  `COM_OrdenCompra_TransicionEstado_Id` INT NOT NULL AUTO_INCREMENT,
  `COM_OrdenCompra_TransicionEstado_Observacion` TEXT NOT NULL,
  `COM_OrdenCompra_TransicionEstado_EstadoActual` INT NOT NULL,
  `COM_OrdenCompra_TransicionEstado_EstadoPrevio` INT NOT NULL,
  `COM_OrdenCompra_TransicionEstado_EstadoPosterior` INT NOT NULL,
  INDEX `fk_OrdenCompra_TransicionEstado_EstadoOrdenCompra1_idx` (`COM_OrdenCompra_TransicionEstado_EstadoPrevio` ASC),
  INDEX `fk_OrdenCompra_TransicionEstado_EstadoOrdenCompra2_idx` (`COM_OrdenCompra_TransicionEstado_EstadoPosterior` ASC),
  INDEX `fk_OrdenCompra_TransicionEstado_EstadoOrdenCompra3_idx` (`COM_OrdenCompra_TransicionEstado_EstadoActual` ASC),
  PRIMARY KEY (`COM_OrdenCompra_TransicionEstado_Id`),
  CONSTRAINT `fk_OrdenCompra_TransicionEstado_EstadoOrdenCompra1`
    FOREIGN KEY (`COM_OrdenCompra_TransicionEstado_EstadoPrevio`)
    REFERENCES `pymeERP`.`COM_EstadoOrdenCompra` (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OrdenCompra_TransicionEstado_EstadoOrdenCompra2`
    FOREIGN KEY (`COM_OrdenCompra_TransicionEstado_EstadoPosterior`)
    REFERENCES `pymeERP`.`COM_EstadoOrdenCompra` (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OrdenCompra_TransicionEstado_EstadoOrdenCompra3`
    FOREIGN KEY (`COM_OrdenCompra_TransicionEstado_EstadoActual`)
    REFERENCES `pymeERP`.`COM_EstadoOrdenCompra` (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_TransicionEstado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_TransicionEstado` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_TransicionEstado` (
  `COM_TransicionEstado_Id` INT NOT NULL,
  `COM_TransicionEstado_Codigo` VARCHAR(16) NULL,
  `COM_TransicionEstado_Activo` BIT NULL,
  `COM_OrdenCompra_IdOrdenCompra` INT NOT NULL,
  `COM_OrdenCompra_TransicionEstado_Id` INT NOT NULL,
  `COM_Usuario_idUsuarioCreo` INT NOT NULL,
  `Usuario_idUsuarioModifico` INT NULL,
  PRIMARY KEY (`COM_TransicionEstado_Id`),
  INDEX `fk_TransicionEstado_OrdenCompra1_idx` (`COM_OrdenCompra_IdOrdenCompra` ASC),
  INDEX `fk_COM_TransicionEstado_COM_OrdenCompra_TransicionEstado1_idx` (`COM_OrdenCompra_TransicionEstado_Id` ASC),
  CONSTRAINT `fk_TransicionEstado_OrdenCompra1`
    FOREIGN KEY (`COM_OrdenCompra_IdOrdenCompra`)
    REFERENCES `pymeERP`.`COM_OrdenCompra` (`COM_OrdenCompra_IdOrdenCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COM_TransicionEstado_COM_OrdenCompra_TransicionEstado1`
    FOREIGN KEY (`COM_OrdenCompra_TransicionEstado_Id`)
    REFERENCES `pymeERP`.`COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`COM_ValorCampoLocal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`COM_ValorCampoLocal` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`COM_ValorCampoLocal` (
  `COM_ValorCampoLocal_IdValorCampoLocal` INT NOT NULL,
  `COM_ValorCampoLocal_Valor` INT NOT NULL,
  `COM_CampoLocal_IdCampoLocal` INT NOT NULL,
  `COM_OrdenCompra_IdOrdenCompra` INT NULL,
  `COM_SolicitudCotizacion_IdSolicitudCotizacion` INT NULL,
  `COM_Cotizacion_IdCotizacion` INT NULL,
  `COM_ValorCampoLocalcol` VARCHAR(45) NULL,
  `COM_Usuario_idUsuarioCreo` INT NOT NULL,
  `Usuario_idUsuarioModifico` INT NULL,
  PRIMARY KEY (`COM_ValorCampoLocal_IdValorCampoLocal`),
  INDEX `fk_ValorCampoLocal_CampoLocal1_idx` (`COM_CampoLocal_IdCampoLocal` ASC),
  INDEX `fk_ValorCampoLocal_OrdenCompra1_idx` (`COM_OrdenCompra_IdOrdenCompra` ASC),
  INDEX `fk_ValorCampoLocal_SolicitudCotizacion1_idx` (`COM_SolicitudCotizacion_IdSolicitudCotizacion` ASC),
  INDEX `fk_ValorCampoLocal_Cotizacion1_idx` (`COM_Cotizacion_IdCotizacion` ASC),
  CONSTRAINT `fk_ValorCampoLocal_CampoLocal1`
    FOREIGN KEY (`COM_CampoLocal_IdCampoLocal`)
    REFERENCES `pymeERP`.`GEN_CampoLocal` (`GEN_CampoLocal_IdCampoLocal`)
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



