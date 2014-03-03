
-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_DescuentoEspecial`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_DescuentoEspecial` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_DescuentoEspecial` (
  `VEN_DescuentoEspecial_id` INT NOT NULL,
  `VEN_DescuentoEspecial_Codigo` VARCHAR(45) NULL,
  `VEN_DescuentoEspecial_Nombre` VARCHAR(45) NULL,
  `VEN_DescuentoEspecial_Valor` DECIMAL(10,2) NULL,
  `VEN_DescuentoEspecial_FechaInicio` DATETIME NULL,
  `VEN_DescuentoEspecial_FechaFinal` DATETIME NULL,
  `VEN_DescuentoEspecial_Precedencia` INT NULL,
  `VEN_DescuentoEspecial_Estado` INT NULL,
  PRIMARY KEY (`VEN_DescuentoEspecial_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_PeriodoCierreDeCaja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_PeriodoCierreDeCaja` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_PeriodoCierreDeCaja` (
  `VEN_PeriodoCierreDeCaja_id` INT NOT NULL,
  `VEN_PeriodoCierreDeCaja_Codigo` VARCHAR(45) NULL,
  `VEN_PeriodoCierreDeCaja_ValorHoras` INT NULL,
  `VEN_PeriodoCierreDeCaja_Estado` INT NULL,
  `VEN_PeriodoCierreDeCaja_HoraPartida` TIME NULL,
  PRIMARY KEY (`VEN_PeriodoCierreDeCaja_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_FormaPago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_FormaPago` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_FormaPago` (
  `VEN_FormaPago_id` INT NOT NULL,
  `VEN_FormaPago_Descripcion` VARCHAR(45) NULL,
  `VEN_FormaPago_Codigo` VARCHAR(45) NULL,
  PRIMARY KEY (`VEN_FormaPago_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_Caja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_Caja` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_Caja` (
  `VEN_Caja_id` INT NOT NULL,
  `VEN_Caja_Codigo` VARCHAR(45) NULL,
  `VEN_Caja_Numero` INT NULL,
  `VEN_Caja_Estado` INT NULL,
  `VEN_Caja_SaldoInicial` DECIMAL(10,2) NULL,
  PRIMARY KEY (`VEN_Caja_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_Venta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_Venta` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_Venta` (
  `VEN_Venta_id` INT NOT NULL,
  `VEN_Venta_Codigo` VARCHAR(45) NULL,
  `VEN_Venta_DescuentoCliente` DECIMAL(10,2) NULL,
  `VEN_Venta_TotalDescuentoProductos` DECIMAL(10,2) NULL,
  `VEN_Venta_ISV` DECIMAL(10,2) NULL,
  `VEN_Venta_Subtotal` DECIMAL(10,2) NULL,
  `VEN_Venta_Total` DECIMAL(10,2) NULL,
  `VEN_Venta_TotalCambio` DECIMAL(10,2) NULL,
  `VEN_FormaPago_VEN_FormaPago_id` INT NOT NULL,
  `VEN_Caja_VEN_Caja_id` INT NOT NULL,
  PRIMARY KEY (`VEN_Venta_id`, `VEN_FormaPago_VEN_FormaPago_id`, `VEN_Caja_VEN_Caja_id`),
  INDEX `fk_VEN_Venta_VEN_FormaPago1_idx` (`VEN_FormaPago_VEN_FormaPago_id` ASC),
  INDEX `fk_VEN_Venta_VEN_Caja1_idx` (`VEN_Caja_VEN_Caja_id` ASC),
  CONSTRAINT `fk_VEN_Venta_VEN_FormaPago1`
    FOREIGN KEY (`VEN_FormaPago_VEN_FormaPago_id`)
    REFERENCES `pymeERP`.`VEN_FormaPago` (`VEN_FormaPago_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VEN_Venta_VEN_Caja1`
    FOREIGN KEY (`VEN_Caja_VEN_Caja_id`)
    REFERENCES `pymeERP`.`VEN_Caja` (`VEN_Caja_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_DetalleDeVenta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_DetalleDeVenta` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_DetalleDeVenta` (
  `VEN_DetalleDeVenta_id` INT NOT NULL,
  `VEN_DetalleDeVenta_CantidadVendida` INT NULL,
  `VEN_DetalleDeVenta_PrecioVenta` DECIMAL(10,2) NULL,
  `VEN_Venta_VEN_Venta_id` INT NOT NULL,
  PRIMARY KEY (`VEN_DetalleDeVenta_id`, `VEN_Venta_VEN_Venta_id`),
  INDEX `fk_VEN_DetalleDeVenta_VEN_Venta1_idx` (`VEN_Venta_VEN_Venta_id` ASC),
  CONSTRAINT `fk_VEN_DetalleDeVenta_VEN_Venta1`
    FOREIGN KEY (`VEN_Venta_VEN_Venta_id`)
    REFERENCES `pymeERP`.`VEN_Venta` (`VEN_Venta_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_AperturaCaja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_AperturaCaja` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_AperturaCaja` (
  `VEN_AperturaCaja_id` INT NOT NULL,
  `VEN_AperturaCaja_Codigo` VARCHAR(45) NULL,
  `VEN_Caja_VEN_Caja_id` INT NOT NULL,
  PRIMARY KEY (`VEN_AperturaCaja_id`, `VEN_Caja_VEN_Caja_id`),
  INDEX `fk_VEN_AperturaCaja_VEN_Caja1_idx` (`VEN_Caja_VEN_Caja_id` ASC),
  CONSTRAINT `fk_VEN_AperturaCaja_VEN_Caja1`
    FOREIGN KEY (`VEN_Caja_VEN_Caja_id`)
    REFERENCES `pymeERP`.`VEN_Caja` (`VEN_Caja_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_CierreCaja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_CierreCaja` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_CierreCaja` (
  `VEN_CierreCaja_id` INT NOT NULL,
  `VEN_CierreCaja_TotalVentas` DECIMAL(10,2) NULL,
  `VEN_CierreCaja_SaldoInicial` DECIMAL(10,2) NULL,
  `VEN_CierreCaja_SaldoFinal` DECIMAL(10,2) NULL,
  `VEN_Caja_VEN_Caja_id` INT NOT NULL,
  `VEN_AperturaCaja_VEN_AperturaCaja_id` INT NOT NULL,
  `VEN_AperturaCaja_VEN_Caja_VEN_Caja_id` INT NOT NULL,
  PRIMARY KEY (`VEN_CierreCaja_id`, `VEN_Caja_VEN_Caja_id`, `VEN_AperturaCaja_VEN_AperturaCaja_id`, `VEN_AperturaCaja_VEN_Caja_VEN_Caja_id`),
  INDEX `fk_VEN_CierreCaja_VEN_Caja1_idx` (`VEN_Caja_VEN_Caja_id` ASC),
  INDEX `fk_VEN_CierreCaja_VEN_AperturaCaja1_idx` (`VEN_AperturaCaja_VEN_AperturaCaja_id` ASC, `VEN_AperturaCaja_VEN_Caja_VEN_Caja_id` ASC),
  CONSTRAINT `fk_VEN_CierreCaja_VEN_Caja1`
    FOREIGN KEY (`VEN_Caja_VEN_Caja_id`)
    REFERENCES `pymeERP`.`VEN_Caja` (`VEN_Caja_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VEN_CierreCaja_VEN_AperturaCaja1`
    FOREIGN KEY (`VEN_AperturaCaja_VEN_AperturaCaja_id` , `VEN_AperturaCaja_VEN_Caja_VEN_Caja_id`)
    REFERENCES `pymeERP`.`VEN_AperturaCaja` (`VEN_AperturaCaja_id` , `VEN_Caja_VEN_Caja_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_Devolucion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_Devolucion` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_Devolucion` (
  `VEN_Devolucion_id` INT NOT NULL,
  `VEN_Devolucion_Codigo` VARCHAR(45) NULL,
  `VEN_Devolucion_Monto` DECIMAL(10,2) NULL,
  PRIMARY KEY (`VEN_Devolucion_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_DetalleDevolucion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_DetalleDevolucion` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_DetalleDevolucion` (
  `VEN_DetalleDevolucion_id` INT NOT NULL,
  `VEN_DetalleDevolucion_Cantidad` DOUBLE NULL,
  `VEN_Devolucion_VEN_Devolucion_id` INT NOT NULL,
  PRIMARY KEY (`VEN_DetalleDevolucion_id`, `VEN_Devolucion_VEN_Devolucion_id`),
  INDEX `fk_VEN_DetalleDevolucion_VEN_Devolucion1_idx` (`VEN_Devolucion_VEN_Devolucion_id` ASC),
  CONSTRAINT `fk_VEN_DetalleDevolucion_VEN_Devolucion1`
    FOREIGN KEY (`VEN_Devolucion_VEN_Devolucion_id`)
    REFERENCES `pymeERP`.`VEN_Devolucion` (`VEN_Devolucion_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_EstadoBono`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_EstadoBono` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_EstadoBono` (
  `VEN_EstadoBono_id` INT NOT NULL,
  `VEN_EstadoBono_Codigo` VARCHAR(45) NULL,
  `VEN_EstadoBono_Nombre` VARCHAR(45) NULL,
  `VEN_EstadoBono_Descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`VEN_EstadoBono_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_BonoDeCompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_BonoDeCompra` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_BonoDeCompra` (
  `VEN_BonoDeCompra_id` INT NOT NULL,
  `VEN_BonoDeCompra_Numero` VARCHAR(45) NULL,
  `VEN_BonoDeCompra_Valor` DECIMAL(10,2) NULL,
  `VEN_EstadoBono_VEN_EstadoBono_id` INT NOT NULL,
  `VEN_Devolucion_VEN_Devolucion_id` INT NOT NULL,
  PRIMARY KEY (`VEN_BonoDeCompra_id`, `VEN_EstadoBono_VEN_EstadoBono_id`, `VEN_Devolucion_VEN_Devolucion_id`),
  INDEX `fk_VEN_BonoDeCompra_VEN_EstadoBono1_idx` (`VEN_EstadoBono_VEN_EstadoBono_id` ASC),
  INDEX `fk_VEN_BonoDeCompra_VEN_Devolucion1_idx` (`VEN_Devolucion_VEN_Devolucion_id` ASC),
  CONSTRAINT `fk_VEN_BonoDeCompra_VEN_EstadoBono1`
    FOREIGN KEY (`VEN_EstadoBono_VEN_EstadoBono_id`)
    REFERENCES `pymeERP`.`VEN_EstadoBono` (`VEN_EstadoBono_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VEN_BonoDeCompra_VEN_Devolucion1`
    FOREIGN KEY (`VEN_Devolucion_VEN_Devolucion_id`)
    REFERENCES `pymeERP`.`VEN_Devolucion` (`VEN_Devolucion_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`VEN_DescuentoEspecial_has_VEN_Venta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pymeERP`.`VEN_DescuentoEspecial_has_VEN_Venta` ;

CREATE TABLE IF NOT EXISTS `pymeERP`.`VEN_DescuentoEspecial_has_VEN_Venta` (
  `VEN_DescuentoEspecial_VEN_DescuentoEspecial_id` INT NOT NULL,
  `VEN_Venta_VEN_Venta_id` INT NOT NULL,
  PRIMARY KEY (`VEN_DescuentoEspecial_VEN_DescuentoEspecial_id`, `VEN_Venta_VEN_Venta_id`),
  INDEX `fk_VEN_DescuentoEspecial_has_VEN_Venta_VEN_Venta1_idx` (`VEN_Venta_VEN_Venta_id` ASC),
  INDEX `fk_VEN_DescuentoEspecial_has_VEN_Venta_VEN_DescuentoEspecia_idx` (`VEN_DescuentoEspecial_VEN_DescuentoEspecial_id` ASC),
  CONSTRAINT `fk_VEN_DescuentoEspecial_has_VEN_Venta_VEN_DescuentoEspecial`
    FOREIGN KEY (`VEN_DescuentoEspecial_VEN_DescuentoEspecial_id`)
    REFERENCES `pymeERP`.`VEN_DescuentoEspecial` (`VEN_DescuentoEspecial_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VEN_DescuentoEspecial_has_VEN_Venta_VEN_Venta1`
    FOREIGN KEY (`VEN_Venta_VEN_Venta_id`)
    REFERENCES `pymeERP`.`VEN_Venta` (`VEN_Venta_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

