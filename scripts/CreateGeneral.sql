
-- -----------------------------------------------------
-- Table `pymeERP`.`GEN_CampoLocal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`GEN_CampoLocal` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`GEN_CampoLocal` (
  `GEN_CampoLocal_ID` INT NOT NULL AUTO_INCREMENT,
  `GEN_CampoLocal_Codigo` VARCHAR(60) NOT NULL,
  `GEN_CampoLocal_Activo` TINYINT(1) NOT NULL DEFAULT TRUE,
  `GEN_CampoLocal_Nombre` VARCHAR(256) NOT NULL,
  `GEN_CampoLocal_Tipo` VARCHAR(45) NOT NULL,
  `GEN_CampoLocal_Requerido` TINYINT(1) NOT NULL,
  `GEN_CampoLocal_ParametroBusqueda` TINYINT(1) NOT NULL,
  `GEN_Usuario_idUsuarioCreo` VARCHAR(64) NOT NULL,
  `GEN_CampoLocal_TimeStamp` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `Usuario_idUsuarioModifico` VARCHAR(64) NULL DEFAULT NULL,
  PRIMARY KEY (`GEN_CampoLocal_ID`),
  UNIQUE INDEX `COM_CampoLocal_Codigo_UNIQUE` (`GEN_CampoLocal_Codigo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`GEN_Mensajes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`GEN_Mensajes` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`GEN_Mensajes` (
  `GEN_Mensaje_idMensajes` INT NOT NULL AUTO_INCREMENT,
  `GEN_Mensajes_Codigo` VARCHAR(16) NOT NULL,
  `GEN_Mensajes_Severidad` VARCHAR(20) NOT NULL,
  `GEN_Mensajes_Mensaje` VARCHAR(128) NOT NULL,
  `GEN_Mensajes_Activo` BIT NOT NULL,
  PRIMARY KEY (`GEN_Mensaje_idMensajes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`GEN_Notificaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`GEN_Notificaciones` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`GEN_Notificaciones` (
  `GEN_Notificaciones_IDNotificaciones` INT NOT NULL,
  `GEN_Notificaciones_Activo` BIT NOT NULL,
  `GEN_Notificaciones_FechaCreacion` DATE NOT NULL,
  `GEN_Notificaciones_IdProceso` INT NOT NULL,
  `GEN_Notificaciones_UsuarioNotificar` VARCHAR(64) NOT NULL,
  `GEN_Notificaciones_GEN_idMensajes` INT NOT NULL,
  PRIMARY KEY (`GEN_Notificaciones_IDNotificaciones`),
  INDEX `fk_GEN_Notificaciones_GEN_Mensajes1_idx` (`GEN_Notificaciones_GEN_idMensajes` ASC),
  CONSTRAINT `fk_GEN_Notificaciones_GEN_Mensajes1`
    FOREIGN KEY (`GEN_Notificaciones_GEN_idMensajes`)
    REFERENCES `pymeERP`.`GEN_Mensajes` (`GEN_Mensaje_idMensajes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`GEN_CampoLocalLista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`GEN_CampoLocalLista` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`GEN_CampoLocalLista` (
  `GEN_CampoLocalLista_ID` INT NOT NULL AUTO_INCREMENT,
  `GEN_CampoLocalLista_Valor` VARCHAR(45) NULL,
  `GEN_CampoLocal_GEN_CampoLocal_ID` INT NOT NULL,
  PRIMARY KEY (`GEN_CampoLocalLista_ID`),
  INDEX `fk_GEN_CampoLocalLista_GEN_CampoLocal1_idx` (`GEN_CampoLocal_GEN_CampoLocal_ID` ASC),
  CONSTRAINT `fk_GEN_CampoLocalLista_GEN_CampoLocal1`
    FOREIGN KEY (`GEN_CampoLocal_GEN_CampoLocal_ID`)
    REFERENCES `pymeERP`.`GEN_CampoLocal` (`GEN_CampoLocal_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

