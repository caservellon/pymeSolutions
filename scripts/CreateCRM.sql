
-- -----------------------------------------------------
-- Table `pymeERP`.`CRM_TipoDocumento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CRM_TipoDocumento` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CRM_TipoDocumento` (
  `CRM_TipoDocumento_ID` INT NOT NULL AUTO_INCREMENT,
  `CRM_TipoDocumento_Codigo` VARCHAR(45) NULL,
  `CRM_TipoDocumento_Nombre` VARCHAR(45) NULL,
  `CRM_TipoDocumento_Validacion` VARCHAR(50) NULL,
  `CRM_TipoDocumento_Eliminado` TINYINT(1) NULL DEFAULT FALSE,
  `CRM_TipoDocumento_Flag` TINYINT(1) NULL,
  PRIMARY KEY (`CRM_TipoDocumento_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CRM_Personas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CRM_Personas` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CRM_Personas` (
  `CRM_Personas_ID` INT NOT NULL AUTO_INCREMENT,
  `CRM_Personas_codigo` VARCHAR(45) NULL,
  `CRM_Personas_Nombres` VARCHAR(45) NULL,
  `CRM_Personas_Apellidos` VARCHAR(45) NULL,
  `CRM_Personas_Direccion` VARCHAR(45) NULL,
  `CRM_Personas_Email` VARCHAR(45) NULL,
  `CRM_Personas_Celular` VARCHAR(45) NULL,
  `CRM_Personas_Fijo` VARCHAR(45) NULL,
  `CRM_Personas_Descuento` DECIMAL(2,2) NULL,
  `CRM_Personas_Foto` BLOB NULL,
  `CRM_Personas_Eliminado` DATETIME NULL,
  `CRM_TipoDocumento_CRM_TipoDocumento_ID` INT NOT NULL,
  `CRM_Personas_Estado` TINYINT(1) NULL,
  `CRM_Personas_FechaCreacion` DATETIME NULL,
  `CRM_Personas_FechaModificacion` DATETIME NULL,
  `CRM_Personas_UsuarioModificacion` VARCHAR(45) NULL,
  PRIMARY KEY (`CRM_Personas_ID`),
  INDEX `fk_CRM_Personas_CRM_TipoDocumento1_idx` (`CRM_TipoDocumento_CRM_TipoDocumento_ID` ASC),
  CONSTRAINT `fk_CRM_Personas_CRM_TipoDocumento1`
    FOREIGN KEY (`CRM_TipoDocumento_CRM_TipoDocumento_ID`)
    REFERENCES `pymeERP`.`CRM_TipoDocumento` (`CRM_TipoDocumento_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CRM_Empresas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CRM_Empresas` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CRM_Empresas` (
  `CRM_Empresas_ID` INT NOT NULL AUTO_INCREMENT,
  `CRM_Empresas_Codigo` VARCHAR(45) NULL,
  `CRM_Empresas_Nombre` VARCHAR(45) NULL,
  `CRM_Empresas_Direccion` VARCHAR(45) NULL,
  `CRM_Empresas_Logo` BLOB NULL,
  `CRM_Empresas_Descuento` DECIMAL(2,2) NULL,
  `CRM_Personas_CRM_Personas_ID` INT NULL,
  `CRM_Empresas_Eliminados` DATETIME NULL,
  `CRM_Empresas_FechaCreacion` DATETIME NULL,
  `CRM_Empresas_FechaModificacion` DATETIME NULL,
  `CRM_Empresas_UsuarioModificacion` VARCHAR(45) NULL,
  `CRM_Empresas_Estado` TINYINT(1) NULL,
  `CRM_TipoDocumento_CRM_TipoDocumento_ID` INT NOT NULL,
  PRIMARY KEY (`CRM_Empresas_ID`),
  INDEX `fk_CRM_Empresas_CRM_Personas1_idx` (`CRM_Personas_CRM_Personas_ID` ASC),
  INDEX `fk_CRM_Empresas_CRM_TipoDocumento1_idx` (`CRM_TipoDocumento_CRM_TipoDocumento_ID` ASC),
  CONSTRAINT `fk_CRM_Empresas_CRM_Personas1`
    FOREIGN KEY (`CRM_Personas_CRM_Personas_ID`)
    REFERENCES `pymeERP`.`CRM_Personas` (`CRM_Personas_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CRM_Empresas_CRM_TipoDocumento1`
    FOREIGN KEY (`CRM_TipoDocumento_CRM_TipoDocumento_ID`)
    REFERENCES `pymeERP`.`CRM_TipoDocumento` (`CRM_TipoDocumento_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CRM_Campaign`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CRM_Campaign` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CRM_Campaign` (
  `CRM_Campaign_ID` INT NOT NULL AUTO_INCREMENT,
  `CRM_Campaign_Codigo` VARCHAR(45) NULL,
  `CRM_Campaign_Titulo` VARCHAR(45) NULL,
  `CRM_Campaign_Cuerpo` VARCHAR(45) NULL,
  `CRM_Campaign_FechaLanzamiento` VARCHAR(45) NULL,
  PRIMARY KEY (`CRM_Campaign_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CRM_ValorCampoLocal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CRM_ValorCampoLocal` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CRM_ValorCampoLocal` (
  `CRM_ValorCampoLocal_ID` INT NOT NULL AUTO_INCREMENT,
  `CRM_ValorCampoLocal_Valor` VARCHAR(45) NULL,
  `CRM_ValorCampoLocal_Creacion` DATETIME NULL,
  `CRM_ValorCampoLocal_Modificacion` DATETIME NULL,
  `CRM_ValorCampoLocal_Usuario` VARCHAR(45) NULL,
  `GEN_CampoLocal_GEN_CampoLocal_ID` INT NOT NULL,
  `CRM_Empresas_CRM_Empresas_ID` INT NULL,
  `CRM_Personas_CRM_Personas_ID` INT NULL,
  PRIMARY KEY (`CRM_ValorCampoLocal_ID`),
  INDEX `fk_CRM_ValorCampoLocal_GEN_CampoLocal1_idx` (`GEN_CampoLocal_GEN_CampoLocal_ID` ASC),
  INDEX `fk_CRM_ValorCampoLocal_CRM_Empresas1_idx` (`CRM_Empresas_CRM_Empresas_ID` ASC),
  INDEX `fk_CRM_ValorCampoLocal_CRM_Personas1_idx` (`CRM_Personas_CRM_Personas_ID` ASC),
  CONSTRAINT `fk_CRM_ValorCampoLocal_GEN_CampoLocal1`
    FOREIGN KEY (`GEN_CampoLocal_GEN_CampoLocal_ID`)
    REFERENCES `pymeERP`.`GEN_CampoLocal` (`GEN_CampoLocal_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CRM_ValorCampoLocal_CRM_Empresas1`
    FOREIGN KEY (`CRM_Empresas_CRM_Empresas_ID`)
    REFERENCES `pymeERP`.`CRM_Empresas` (`CRM_Empresas_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CRM_ValorCampoLocal_CRM_Personas1`
    FOREIGN KEY (`CRM_Personas_CRM_Personas_ID`)
    REFERENCES `pymeERP`.`CRM_Personas` (`CRM_Personas_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

