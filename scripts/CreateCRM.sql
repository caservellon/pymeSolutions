-- -----------------------------------------------------
-- Table `pymeERP`.`CRM_Personas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CRM_Personas` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CRM_Personas` (
  `CRM_Personas_ID` INT NOT NULL,
  `CRM_Personas_codigo` VARCHAR(45) NULL,
  `CRM_Personas_Nombres` VARCHAR(45) NULL,
  `CRM_Personas_Apellidos` VARCHAR(45) NULL,
  `CRM_Personas_Direccion` VARCHAR(45) NULL,
  `CRM_Personas_Email` VARCHAR(45) NULL,
  `CRM_Personas_Celular` VARCHAR(45) NULL,
  `CRM_Personas_Fijo` VARCHAR(45) NULL,
  `CRM_Personas_Descuento` DOUBLE NULL,
  `CRM_Personas_Foto` BLOB NULL,
  PRIMARY KEY (`CRM_Personas_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CRM_Empresas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CRM_Empresas` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CRM_Empresas` (
  `CRM_Empresas_ID` INT NOT NULL,
  `CRM_Empresas_Codigo` VARCHAR(45) NULL,
  `CRM_Empresas_Nombre` VARCHAR(45) NULL,
  `CRM_Empresas_Direccion` VARCHAR(45) NULL,
  `CRM_Empresas_Logo` BLOB NULL,
  `CRM_Empresas_Descuento` DOUBLE NULL,
  `CRM_Personas_CRM_Personas_ID` INT NULL,
  PRIMARY KEY (`CRM_Empresas_ID`),
  INDEX `fk_CRM_Empresas_CRM_Personas1_idx` (`CRM_Personas_CRM_Personas_ID` ASC),
  CONSTRAINT `fk_CRM_Empresas_CRM_Personas1`
    FOREIGN KEY (`CRM_Personas_CRM_Personas_ID`)
    REFERENCES `pymeERP`.`CRM_Personas` (`CRM_Personas_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CRM_Campaign`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CRM_Campaign` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CRM_Campaign` (
  `CRM_Campaign_ID` INT NOT NULL,
  `CRM_Campaign_Codigo` VARCHAR(45) NULL,
  `CRM_Campaign_Titulo` VARCHAR(45) NULL,
  `CRM_Campaign_Cuerpo` VARCHAR(45) NULL,
  `CRM_Campaign_FechaLanzamiento` VARCHAR(45) NULL,
  PRIMARY KEY (`CRM_Campaign_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`CRM_TipoDocumento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`CRM_TipoDocumento` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`CRM_TipoDocumento` (
  `CRM_TipoDocumento_ID` INT NOT NULL,
  `CRM_TipoDocumento_Codigo` VARCHAR(45) NULL,
  `CRM_TipoDocumento_Nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`CRM_TipoDocumento_ID`))
ENGINE = InnoDB;

