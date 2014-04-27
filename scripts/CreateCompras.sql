SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `pymeERP` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

USE `pymeERP`;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_SolicitudCotizacion` (
  `COM_SolicitudCotizacion_IdSolicitudCotizacion` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_SolicitudCotizacion_Codigo` VARCHAR(16) NOT NULL ,
  `COM_SolicitudCotizacion_FechaEmision` DATE NOT NULL ,
  `COM_SolicitudCotizacion_DireccionEntrega` VARCHAR(120) NOT NULL ,
  `COM_SolicitudCotizacion_FechaEntrega` DATE NOT NULL ,
  `COM_SolicitudCotizacion_Recibido` TINYINT(1) NULL DEFAULT NULL ,
  `COM_SolicitudCotizacion_Activo` TINYINT(1) NOT NULL ,
  `COM_SolicitudCotizacion_FechaCreacion` DATE NOT NULL ,
  `COM_SolicitudCotizacion_FechaModificacion` DATE NULL DEFAULT NULL ,
  `COM_Usuario_idUsuarioCreo` INT(11) NOT NULL ,
  `Proveedor_idProveedor` INT(11) NOT NULL ,
  `Usuario_idUsuarioModifico` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`COM_SolicitudCotizacion_IdSolicitudCotizacion`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_Cotizacion` (
  `COM_Cotizacion_IdCotizacion` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_Cotizacion_Codigo` VARCHAR(16) NOT NULL ,
  `COM_Cotizacion_FechaEmision` DATE NOT NULL ,
  `COM_Cotizacion_FechaEntrega` DATE NOT NULL ,
  `COM_Cotizacion_Activo` TINYINT(1) NOT NULL ,
  `COM_Cotizacion_Total` FLOAT(11) NOT NULL ,
  `COM_Cotizacion_Vigencia` DATE NOT NULL ,
  `COM_Cotizacion_NumeroCotizacion` VARCHAR(45) NOT NULL ,
  `COM_Cotizacion_FechaCreacion` DATE NOT NULL ,
  `COM_Cotizacion_FechaModificacion` DATE NULL DEFAULT NULL ,
  `COM_SolicitudCotizacion_idSolicitudCotizacion` INT(11) NOT NULL ,
  `COM_Usuario_idUsuarioCreo` INT(11) NOT NULL ,
  `COM_Proveedor_idProveedor` INT(11) NOT NULL ,
  `Usuario_idUsuarioModifico` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`COM_Cotizacion_IdCotizacion`) ,
  INDEX `fk_Cotizacion_SolicitudCotizacion1_idx` (`COM_SolicitudCotizacion_idSolicitudCotizacion` ASC) ,
  UNIQUE INDEX `COM_Cotizacion_Codigo_UNIQUE` (`COM_Cotizacion_Codigo` ASC) ,
  CONSTRAINT `fk_Cotizacion_SolicitudCotizacion1`
    FOREIGN KEY (`COM_SolicitudCotizacion_idSolicitudCotizacion` )
    REFERENCES `pymeERP`.`COM_SolicitudCotizacion` (`COM_SolicitudCotizacion_IdSolicitudCotizacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_OrdenCompra` (
  `COM_OrdenCompra_IdOrdenCompra` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_OrdenCompra_Codigo` VARCHAR(16) NOT NULL ,
  `COM_OrdenCompra_FechaEmision` DATE NOT NULL ,
  `COM_OrdenCompra_FechaEntrega` DATE NOT NULL ,
  `COM_OrdenCompra_DireccionEntrega` VARCHAR(120) NOT NULL ,
  `COM_OrdenCompra_Activo` TINYINT(1) NOT NULL ,
  `COM_OrdenCompra_Total` FLOAT(11) NOT NULL ,
  `COM_OrdenCompra_FechaCreacion` DATE NOT NULL ,
  `COM_OrdenCompra_FechaModificacion` DATE NULL DEFAULT NULL ,
  `COM_Cotizacion_IdCotizacion` INT(11) NULL DEFAULT NULL ,
  `COM_Usuario_IdUsuarioCreo` INT(11) NOT NULL ,
  `COM_Proveedor_IdProveedor` INT(11) NOT NULL ,
  `Usuario_idUsuarioModifico` INT(11) NULL DEFAULT NULL ,
  `COM_OrdenCompra_FormaPago` INT(11) NOT NULL ,
  PRIMARY KEY (`COM_OrdenCompra_IdOrdenCompra`) ,
  INDEX `fk_OrdenCompra_Cotizacion1_idx` (`COM_Cotizacion_IdCotizacion` ASC) ,
  UNIQUE INDEX `COM_OrdenCompra_Codigo_UNIQUE` (`COM_OrdenCompra_Codigo` ASC) ,
  CONSTRAINT `fk_OrdenCompra_Cotizacion1`
    FOREIGN KEY (`COM_Cotizacion_IdCotizacion` )
    REFERENCES `pymeERP`.`COM_Cotizacion` (`COM_Cotizacion_IdCotizacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_OrdenPago` (
  `COM_OrdenPago_IdOrdenPago` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_OrdenPago_Codigo` VARCHAR(16) NOT NULL ,
  `COM_OrdenCompra_idOrdenCompra` INT(11) NOT NULL ,
  `COM_OrdenPago_Activo` BIT(1) NOT NULL ,
  `COM_Usuario_idUsuarioCreo` INT(11) NOT NULL ,
  `COM_OrdenPago_FechaCreo` DATE NULL DEFAULT NULL ,
  PRIMARY KEY (`COM_OrdenPago_IdOrdenPago`) ,
  INDEX `fk_OrdenPago_OrdenCompra1_idx` (`COM_OrdenCompra_idOrdenCompra` ASC) ,
  UNIQUE INDEX `COM_OrdenPago_Codigo_UNIQUE` (`COM_OrdenPago_Codigo` ASC) ,
  CONSTRAINT `fk_OrdenPago_OrdenCompra1`
    FOREIGN KEY (`COM_OrdenCompra_idOrdenCompra` )
    REFERENCES `pymeERP`.`COM_OrdenCompra` (`COM_OrdenCompra_IdOrdenCompra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_DetalleSolicitudCotizacion` (
  `idDetalleSolicitudCotizacion` INT(11) NOT NULL AUTO_INCREMENT ,
  `cantidad` INT(11) NOT NULL ,
  `SolicitudCotizacion_idSolicitudCotizacion` INT(11) NOT NULL ,
  `Producto_idProducto` INT(11) NOT NULL ,
  `COM_Usuario_idUsuarioCreo` INT(11) NOT NULL ,
  `Usuario_idUsuarioModifico` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`idDetalleSolicitudCotizacion`) ,
  INDEX `fk_DetalleSolicitudCotizacion_SolicitudCotizacion_idx` (`SolicitudCotizacion_idSolicitudCotizacion` ASC) ,
  CONSTRAINT `fk_DetalleSolicitudCotizacion_SolicitudCotizacion`
    FOREIGN KEY (`SolicitudCotizacion_idSolicitudCotizacion` )
    REFERENCES `pymeERP`.`COM_SolicitudCotizacion` (`COM_SolicitudCotizacion_IdSolicitudCotizacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_Detalle_Cotizacion` (
  `COM_DetalleCotizacion_IdDetalleCotizacion` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_DetalleCotizacion_Codigo` VARCHAR(16) NOT NULL ,
  `COM_DetalleCotizacion_Cantidad` INT(11) NOT NULL ,
  `COM_DetalleCotizacion_PrecioUnitario` FLOAT(11) NOT NULL ,
  `COM_Cotizacion_IdCotizacion` INT(11) NOT NULL ,
  `COM_Producto_Id_Producto` INT(11) NOT NULL ,
  `COM_Usuario_idUsuarioCreo` INT(11) NOT NULL ,
  `Usuario_idUsuarioModifico` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`COM_DetalleCotizacion_IdDetalleCotizacion`) ,
  INDEX `fk_DetalleCotizacion_Cotizacion1_idx` (`COM_Cotizacion_IdCotizacion` ASC) ,
  UNIQUE INDEX `COM_DetalleCotizacion_Codigo_UNIQUE` (`COM_DetalleCotizacion_Codigo` ASC) ,
  CONSTRAINT `fk_DetalleCotizacion_Cotizacion1`
    FOREIGN KEY (`COM_Cotizacion_IdCotizacion` )
    REFERENCES `pymeERP`.`COM_Cotizacion` (`COM_Cotizacion_IdCotizacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_DetalleOrdenCompra` (
  `COM_DetalleOrdenCompra_IdDetalleOrdenCompra` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_DetalleOrdenCompra_Codigo` VARCHAR(16) NOT NULL ,
  `COM_DetalleOrdenCompra_Cantidad` INT(11) NOT NULL ,
  `COM_DetalleOrdenCompra_PrecioUnitario` FLOAT(11) NOT NULL ,
  `COM_OrdenCompra_idOrdenCompra` INT(11) NOT NULL ,
  `COM_Producto_idProducto` INT(11) NOT NULL ,
  `COM_Usuario_idUsuarioCreo` INT(11) NOT NULL ,
  `Usuario_idUsuarioModifico` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`COM_DetalleOrdenCompra_IdDetalleOrdenCompra`) ,
  INDEX `fk_DetalleOrdenCompra_OrdenCompra1_idx` (`COM_OrdenCompra_idOrdenCompra` ASC) ,
  UNIQUE INDEX `COM_DetalleOrdenCompra_Codigo_UNIQUE` (`COM_DetalleOrdenCompra_Codigo` ASC) ,
  CONSTRAINT `fk_DetalleOrdenCompra_OrdenCompra1`
    FOREIGN KEY (`COM_OrdenCompra_idOrdenCompra` )
    REFERENCES `pymeERP`.`COM_OrdenCompra` (`COM_OrdenCompra_IdOrdenCompra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`GEN_CampoLocal` (
  `GEN_CampoLocal_IdCampoLocal` INT(11) NOT NULL AUTO_INCREMENT ,
  `GEN_CampoLocal_Codigo` VARCHAR(16) NOT NULL ,
  `GEN_CampoLocal_Activo` TINYINT(1) NOT NULL ,
  `GEN_CampoLocal_Nombre` VARCHAR(256) NOT NULL ,
  `GEN_CampoLocal_Tipo` VARCHAR(45) NOT NULL ,
  `GEN_CampoLocal_Requerido` TINYINT(1) NOT NULL ,
  `GEN_CampoLocal_ParametroBusqueda` TINYINT(1) NOT NULL ,
  `GEN_Usuario_idUsuarioCreo` INT(11) NOT NULL ,
  `Usuario_idUsuarioModifico` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`GEN_CampoLocal_IdCampoLocal`) ,
  UNIQUE INDEX `COM_CampoLocal_Codigo_UNIQUE` (`GEN_CampoLocal_Codigo` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_EstadoOrdenCompra` (
  `COM_EstadoOrdenCompra_IdEstadoOrdenCompra` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_EstadoOrdenCompra_Codigo` VARCHAR(16) NOT NULL ,
  `COM_EstadoOrdenCompra_Nombre` VARCHAR(45) NOT NULL ,
  `COM_EstadoOrdenCompra_Observacion` TEXT NOT NULL ,
  `COM_EstadoOrdenCompra_Activo` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_TransicionEstado` (
  `COM_TransicionEstado_Id` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_TransicionEstado_Codigo` VARCHAR(16) NOT NULL ,
  `COM_TransicionEstado_Activo` TINYINT(1) NULL DEFAULT NULL ,
  `COM_OrdenCompra_IdOrdenCompra` INT(11) NOT NULL ,
  `COM_Usuario_idUsuarioCreo` INT(11) NOT NULL ,
  `COM_TransicionEstado_FechaCreo` DATE NOT NULL ,
  `COM_TransicionEstado_Observacion` TEXT NULL DEFAULT NULL ,
  `COM_EstadoOrdenCompra_IdEstAnt` INT(11) NOT NULL ,
  `COM_EstadoOrdenCompra_IdActual` INT(11) NOT NULL ,
  PRIMARY KEY (`COM_TransicionEstado_Id`) ,
  INDEX `fk_TransicionEstado_OrdenCompra1_idx` (`COM_OrdenCompra_IdOrdenCompra` ASC) ,
  UNIQUE INDEX `COM_TransicionEstado_Codigo_UNIQUE` (`COM_TransicionEstado_Codigo` ASC) ,
  INDEX `fk_COM_TransicionEstado_COM_EstadoOrdenCompra1_idx` (`COM_EstadoOrdenCompra_IdEstAnt` ASC) ,
  INDEX `fk_COM_TransicionEstado_COM_EstadoOrdenCompra2_idx` (`COM_EstadoOrdenCompra_IdActual` ASC) ,
  CONSTRAINT `fk_TransicionEstado_OrdenCompra1`
    FOREIGN KEY (`COM_OrdenCompra_IdOrdenCompra` )
    REFERENCES `pymeERP`.`COM_OrdenCompra` (`COM_OrdenCompra_IdOrdenCompra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COM_TransicionEstado_COM_EstadoOrdenCompra1`
    FOREIGN KEY (`COM_EstadoOrdenCompra_IdEstAnt` )
    REFERENCES `pymeERP`.`COM_EstadoOrdenCompra` (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COM_TransicionEstado_COM_EstadoOrdenCompra2`
    FOREIGN KEY (`COM_EstadoOrdenCompra_IdActual` )
    REFERENCES `pymeERP`.`COM_EstadoOrdenCompra` (`COM_EstadoOrdenCompra_IdEstadoOrdenCompra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_OrdenCompra_TransicionEstado` (
  `COM_OrdenCompra_TransicionEstado_Id` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_OrdenCompra_TransicionEstado_Observacion` TEXT NOT NULL ,
  `COM_OrdenCompra_TransicionEstado_EstadoActual` INT(11) NOT NULL ,
  `COM_OrdenCompra_TransicionEstado_EstadoPrevio` INT(11) NOT NULL ,
  `COM_OrdenCompra_TransicionEstado_EstadoPosterior` INT(11) NOT NULL ,
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
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`COM_ValorCampoLocal` (
  `COM_ValorCampoLocal_IdValorCampoLocal` INT(11) NOT NULL AUTO_INCREMENT ,
  `COM_ValorCampoLocal_Valor` VARCHAR(64) NOT NULL ,
  `COM_CampoLocal_IdCampoLocal` INT(11) NOT NULL ,
  `COM_OrdenCompra_IdOrdenCompra` INT(11) NULL DEFAULT NULL ,
  `COM_SolicitudCotizacion_IdSolicitudCotizacion` INT(11) NULL DEFAULT NULL ,
  `COM_Cotizacion_IdCotizacion` INT(11) NULL DEFAULT NULL ,
  `COM_Usuario_idUsuarioCreo` INT(11) NOT NULL ,
  `Usuario_idUsuarioModifico` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`COM_ValorCampoLocal_IdValorCampoLocal`) ,
  INDEX `fk_ValorCampoLocal_CampoLocal1_idx` (`COM_CampoLocal_IdCampoLocal` ASC) ,
  INDEX `fk_ValorCampoLocal_OrdenCompra1_idx` (`COM_OrdenCompra_IdOrdenCompra` ASC) ,
  INDEX `fk_ValorCampoLocal_SolicitudCotizacion1_idx` (`COM_SolicitudCotizacion_IdSolicitudCotizacion` ASC) ,
  INDEX `fk_ValorCampoLocal_Cotizacion1_idx` (`COM_Cotizacion_IdCotizacion` ASC) ,
  CONSTRAINT `fk_ValorCampoLocal_CampoLocal1`
    FOREIGN KEY (`COM_CampoLocal_IdCampoLocal` )
    REFERENCES `pymeERP`.`GEN_CampoLocal` (`GEN_CampoLocal_IdCampoLocal` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ValorCampoLocal_OrdenCompra1`
    FOREIGN KEY (`COM_OrdenCompra_IdOrdenCompra` )
    REFERENCES `pymeERP`.`COM_OrdenCompra` (`COM_OrdenCompra_IdOrdenCompra` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ValorCampoLocal_SolicitudCotizacion1`
    FOREIGN KEY (`COM_SolicitudCotizacion_IdSolicitudCotizacion` )
    REFERENCES `pymeERP`.`COM_SolicitudCotizacion` (`COM_SolicitudCotizacion_IdSolicitudCotizacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ValorCampoLocal_Cotizacion1`
    FOREIGN KEY (`COM_Cotizacion_IdCotizacion` )
    REFERENCES `pymeERP`.`COM_Cotizacion` (`COM_Cotizacion_IdCotizacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`GEN_Notificaciones` (
  `GEN_Notificaciones_IDNotificaciones` INT(11) NOT NULL AUTO_INCREMENT ,
  `GEN_Notificaciones_Activo` TINYINT(1) NOT NULL ,
  `GEN_Notificaciones_FechaCreacion` DATE NOT NULL ,
  `GEN_Notificaciones_IdProceso` INT(11) NOT NULL ,
  `GEN_Notificaciones_UsuarioNotificar` INT(11) NOT NULL ,
  `GEN_Notificaciones_GEN_idMensajes` INT(11) NOT NULL ,
  PRIMARY KEY (`GEN_Notificaciones_IDNotificaciones`) ,
  INDEX `fk_GEN_Notificaciones_GEN_Mensajes1_idx` (`GEN_Notificaciones_GEN_idMensajes` ASC) ,
  CONSTRAINT `fk_GEN_Notificaciones_GEN_Mensajes1`
    FOREIGN KEY (`GEN_Notificaciones_GEN_idMensajes` )
    REFERENCES `pymeERP`.`GEN_Mensajes` (`GEN_Mensaje_idMensajes` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`GEN_Mensajes` (
  `GEN_Mensaje_idMensajes` INT(11) NOT NULL AUTO_INCREMENT ,
  `GEN_Mensajes_Codigo` VARCHAR(16) NOT NULL ,
  `GEN_Mensajes_Severidad` VARCHAR(20) NOT NULL ,
  `GEN_Mensajes_Mensaje` VARCHAR(128) NOT NULL ,
  `GEN_Mensajes_Activo` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`GEN_Mensaje_idMensajes`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `pymeERP`.`GEN_ListaValores` (
  `GEN_ListaValores_IdListaValores` INT(11) NOT NULL AUTO_INCREMENT ,
  `GEN_ListaValores_Nombre` VARCHAR(45) NOT NULL ,
  `GEN_CampoLocal_IdCampoLocal` INT(11) NOT NULL ,
  PRIMARY KEY (`GEN_ListaValores_IdListaValores`) ,
  INDEX `fk_GEN_ListaValores_GEN_CampoLocal1_idx` (`GEN_CampoLocal_IdCampoLocal` ASC) ,
  CONSTRAINT `fk_GEN_ListaValores_GEN_CampoLocal1`
    FOREIGN KEY (`GEN_CampoLocal_IdCampoLocal` )
    REFERENCES `pymeERP`.`GEN_CampoLocal` (`GEN_CampoLocal_IdCampoLocal` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
