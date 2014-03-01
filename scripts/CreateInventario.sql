
-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Horario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Horario` (
  `INV_Horario_ID` INT NOT NULL ,
  `INV_Horario_Nombre` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_Horario_Tipo` INT NULL DEFAULT NULL ,
  `INV_Horario_FechaInicio` DATETIME NULL DEFAULT NULL ,
  `INV_Horario_FechaFinal` DATETIME NULL DEFAULT NULL ,
  `INV_Horario_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Horario_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Horario_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_Horario_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  PRIMARY KEY (`INV_Horario_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Categoria` (
  `INV_Categoria_ID` INT NOT NULL ,
  `INV_Categoria_Codigo` VARCHAR(16) NULL DEFAULT NULL ,
  `INV_Categoria_Nombre` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_Categoria_Descripcion` VARCHAR(256) NULL DEFAULT NULL ,
  `INV_Categoria_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Categoria_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Categoria_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_Categoria_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Categoria_Activo` BIT NULL DEFAULT NULL ,
  `INV_Categoria_IDCategoriaPadre` INT NOT NULL ,
  `INV_Categoria_HorarioDescuento_ID` INT NOT NULL ,
  PRIMARY KEY (`INV_Categoria_ID`, `INV_Categoria_IDCategoriaPadre`, `INV_Categoria_HorarioDescuento_ID`) ,
  INDEX `fk_INV_Categoria_INV_Categoria_idx` (`INV_Categoria_IDCategoriaPadre` ASC) ,
  INDEX `fk_INV_Categoria_INV_Horario_idx` (`INV_Categoria_HorarioDescuento_ID` ASC) ,
  CONSTRAINT `fk_INV_Categoria_INV_Categoria`
    FOREIGN KEY (`INV_Categoria_IDCategoriaPadre` )
    REFERENCES `pymeERP`.`INV_Categoria` (`INV_Categoria_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_INV_Categoria_INV_Horario`
    FOREIGN KEY (`INV_Categoria_HorarioDescuento_ID` )
    REFERENCES `pymeERP`.`INV_Horario` (`INV_Horario_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_UnidadMedida`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_UnidadMedida` (
  `INV_UnidadMedida_ID` INT NOT NULL ,
  `INV_UnidadMedida_Nombre` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_UnidadMedida_Descripcion` VARCHAR(256) NULL DEFAULT NULL ,
  `INV_UnidadMedida_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_UnidadMedida_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_UnidadMedida_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_UnidadMedida_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_UnidadMedida_Activo` BIT NULL DEFAULT NULL ,
  PRIMARY KEY (`INV_UnidadMedida_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Producto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Producto` (
  `INV_Producto_ID` INT NOT NULL ,
  `INV_Producto_Codigo` VARCHAR(16) NULL DEFAULT NULL ,
  `INV_Producto_Nombre` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_Producto_Descripcion` VARCHAR(512) NULL DEFAULT NULL ,
  `INV_Producto_PrecioVenta` DECIMAL(19,4) NULL DEFAULT NULL ,
  `INV_Producto_MargenGanancia` FLOAT NULL DEFAULT NULL ,
  `INV_Producto_PrecioCosto` DECIMAL(19,4) NULL DEFAULT NULL ,
  `INV_Producto_Cantidad` INT(10) NULL DEFAULT NULL ,
  `INV_Producto_Impuesto1` FLOAT NULL DEFAULT NULL ,
  `INV_Producto_Impuesto2` FLOAT NULL DEFAULT NULL ,
  `INV_Producto_RutaImagen` VARCHAR(256) NULL DEFAULT NULL ,
  `INV_Producto_Comentarios` VARCHAR(512) NULL DEFAULT NULL ,
  `INV_Producto_PuntoReorden` INT(10) NULL DEFAULT NULL ,
  `INV_Producto_NivelReposicion` INT(10) NULL DEFAULT NULL ,
  `INV_Producto_TipoCodigoBarras` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Producto_ValorCodigoBarras` VARCHAR(512) NULL DEFAULT NULL ,
  `INV_Producto_ValorDescuento` DECIMAL(19,4) NULL DEFAULT NULL ,
  `INV_Producto_PorcentajeDescuento` FLOAT NULL DEFAULT NULL ,
  `INV_Producto_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Producto_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Producto_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_Producto_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Producto_Activo` BIT NULL DEFAULT NULL ,
  `INV_Categoria_ID` INT NOT NULL ,
  `INV_Categoria_IDCategoriaPadre` INT NOT NULL ,
  `INV_UnidadMedida_ID` INT NOT NULL ,
  `INV_HorarioBloqueo_ID` INT NOT NULL ,
  PRIMARY KEY (`INV_Producto_ID`, `INV_Categoria_ID`, `INV_Categoria_IDCategoriaPadre`, `INV_UnidadMedida_ID`, `INV_HorarioBloqueo_ID`) ,
  INDEX `fk_INV_Producto_INV_Categoria1_idx` (`INV_Categoria_ID` ASC, `INV_Categoria_IDCategoriaPadre` ASC) ,
  INDEX `fk_INV_Producto_INV_UnidadMedida1_idx` (`INV_UnidadMedida_ID` ASC) ,
  INDEX `fk_INV_Producto_INV_Horario1_idx` (`INV_HorarioBloqueo_ID` ASC) ,
  CONSTRAINT `fk_INV_Producto_INV_Categoria1`
    FOREIGN KEY (`INV_Categoria_ID` , `INV_Categoria_IDCategoriaPadre` )
    REFERENCES `pymeERP`.`INV_Categoria` (`INV_Categoria_ID` , `INV_Categoria_IDCategoriaPadre` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_INV_Producto_INV_UnidadMedida1`
    FOREIGN KEY (`INV_UnidadMedida_ID` )
    REFERENCES `pymeERP`.`INV_UnidadMedida` (`INV_UnidadMedida_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_INV_Producto_INV_Horario1`
    FOREIGN KEY (`INV_HorarioBloqueo_ID` )
    REFERENCES `pymeERP`.`INV_Horario` (`INV_Horario_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Atributo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Atributo` (
  `INV_Atributo_ID` INT NOT NULL ,
  `INV_Atributo_Codigo` VARCHAR(16) NULL DEFAULT NULL ,
  `INV_Atributo_Nombre` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_Atributo_TipoDato` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Atributo_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Atributo_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Atributo_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_Atributo_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Atributo_Activo` BIT NULL DEFAULT NULL ,
  PRIMARY KEY (`INV_Atributo_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Producto_Atributo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Producto_Atributo` (
  `INV_Atributo_ID` INT NOT NULL ,
  `INV_Producto_ID` INT NOT NULL ,
  `INV_Producto_Atributo_Valor` VARCHAR(512) NULL DEFAULT NULL ,
  `INV_Producto_Atributo_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Producto_Atributo_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Producto_Atributo_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_Producto_Atributo_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  PRIMARY KEY (`INV_Atributo_ID`, `INV_Producto_ID`) ,
  INDEX `fk_INV_Producto_Atributo_INV_Producto1_idx` (`INV_Producto_ID` ASC) ,
  CONSTRAINT `fk_INV_Producto_Atributo_INV_Atributo1`
    FOREIGN KEY (`INV_Atributo_ID` )
    REFERENCES `pymeERP`.`INV_Atributo` (`INV_Atributo_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_INV_Producto_Atributo_INV_Producto1`
    FOREIGN KEY (`INV_Producto_ID` )
    REFERENCES `pymeERP`.`INV_Producto` (`INV_Producto_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_ValoresPredefinidosAtributo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_ValoresPredefinidosAtributo` (
  `INV_ValoresPredefinidosAtributo_ID` INT NOT NULL ,
  `INV_Atributo_ID` INT NOT NULL ,
  `INV_ValoresPredefinidosAtributo_Valor` VARCHAR(512) NULL DEFAULT NULL ,
  `INV_ValoresPredefinidosAtributo_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_ValoresPredefinidosAtributo_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_ValoresPredefinidosAtributo_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_ValoresPredefinidosAtributo_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  PRIMARY KEY (`INV_ValoresPredefinidosAtributo_ID`, `INV_Atributo_ID`) ,
  INDEX `fk_INV_ValoresPredefinidosAtributo_INV_Atributo1_idx` (`INV_Atributo_ID` ASC) ,
  CONSTRAINT `fk_INV_ValoresPredefinidosAtributo_INV_Atributo1`
    FOREIGN KEY (`INV_Atributo_ID` )
    REFERENCES `pymeERP`.`INV_Atributo` (`INV_Atributo_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Ciudad`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Ciudad` (
  `INV_Ciudad_ID` INT NOT NULL ,
  `INV_Ciudad_Codigo` VARCHAR(16) NULL DEFAULT NULL ,
  `INV_Ciudad_Nombre` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_Ciudad_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Ciudad_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Ciudad_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_Ciudad_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Ciudad_Activo` BIT NULL DEFAULT NULL ,
  PRIMARY KEY (`INV_Ciudad_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Proveedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Proveedor` (
  `INV_Proveedor_ID` INT NOT NULL ,
  `INV_Proveedor_Codigo` VARCHAR(16) NULL DEFAULT NULL ,
  `INV_Proveedor_Nombre` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_Proveedor_Direccion` VARCHAR(512) NULL DEFAULT NULL ,
  `INV_Proveedor_Telefono` VARCHAR(16) NULL DEFAULT NULL ,
  `INV_Proveedor_Email` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_Proveedor_PaginaWeb` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_Proveedor_RepresentanteVentas` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_Proveedor_TelefonoRepresentanteVentas` VARCHAR(16) NULL DEFAULT NULL ,
  `INV_Proveedor_Comentarios` VARCHAR(512) NULL DEFAULT NULL ,
  `INV_Proveedor_RutaImagen` VARCHAR(256) NULL DEFAULT NULL ,
  `INV_Proveedor_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Proveedor_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Proveedor_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_Proveedor_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Proveedor_Activo` BIT NULL DEFAULT NULL ,
  `INV_Ciudad_ID` INT NOT NULL ,
  PRIMARY KEY (`INV_Proveedor_ID`, `INV_Ciudad_ID`) ,
  INDEX `fk_INV_Proveedor_INV_Ciudad1_idx` (`INV_Ciudad_ID` ASC) ,
  CONSTRAINT `fk_INV_Proveedor_INV_Ciudad1`
    FOREIGN KEY (`INV_Ciudad_ID` )
    REFERENCES `pymeERP`.`INV_Ciudad` (`INV_Ciudad_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = ' /* comment truncated */ /* /* comment truncated */ /*INV_Ciudad_INV_Ciudad_ID*/*/';


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Producto_Proveedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Producto_Proveedor` (
  `INV_Producto_Proveedor_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Producto_Proveedor_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Producto_Proveedor_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_Producto_Proveedor_UsuarioModificacion` VARCHAR(64) NULL ,
  `INV_Producto_ID` INT NOT NULL ,
  `INV_Proveedor_ID` INT NOT NULL ,
  PRIMARY KEY (`INV_Producto_ID`, `INV_Proveedor_ID`) ,
  INDEX `fk_INV_Producto_has_INV_Proveedor_INV_Proveedor1_idx` (`INV_Proveedor_ID` ASC) ,
  INDEX `fk_INV_Producto_has_INV_Proveedor_INV_Producto1_idx` (`INV_Producto_ID` ASC) ,
  CONSTRAINT `fk_INV_Producto_has_INV_Proveedor_INV_Producto1`
    FOREIGN KEY (`INV_Producto_ID` )
    REFERENCES `pymeERP`.`INV_Producto` (`INV_Producto_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_INV_Producto_has_INV_Proveedor_INV_Proveedor1`
    FOREIGN KEY (`INV_Proveedor_ID` )
    REFERENCES `pymeERP`.`INV_Proveedor` (`INV_Proveedor_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = ' /* comment truncated */ /* /* comment truncated */ /*INV_Proveedor_INV_Proveedor_ID*/*/';


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_FormaPago`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_FormaPago` (
  `INV_FormaPago_ID` INT NOT NULL ,
  `INV_FormaPago_Nombre` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_FormaPago_Efectivo` BIT NULL DEFAULT NULL ,
  `INV_FormaPago_Credito` BIT NULL DEFAULT NULL ,
  `INV_FormaPago_DiasCredito` INT(10) NULL DEFAULT NULL ,
  `INV_FormaPago_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_FormaPago_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_FormaPago_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_FormaPago_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_FormaPago_Activo` BIT NULL DEFAULT NULL ,
  PRIMARY KEY (`INV_FormaPago_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Proveedor_FormaPago`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Proveedor_FormaPago` (
  `INV_Proveedor_FormaPago_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Proveedor_FormaPago_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Proveedor_FormaPago_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_Proveedor_FormaPago_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_FormaPago_ID` INT NOT NULL ,
  `INV_Proveedor_ID` INT NOT NULL ,
  PRIMARY KEY (`INV_FormaPago_ID`, `INV_Proveedor_ID`) ,
  INDEX `fk_INV_Proveedor_FormaPago_INV_Proveedor1_idx` (`INV_Proveedor_ID` ASC) ,
  CONSTRAINT `fk_INV_Proveedor_FormaPago_INV_FormaPago1`
    FOREIGN KEY (`INV_FormaPago_ID` )
    REFERENCES `pymeERP`.`INV_FormaPago` (`INV_FormaPago_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_INV_Proveedor_FormaPago_INV_Proveedor1`
    FOREIGN KEY (`INV_Proveedor_ID` )
    REFERENCES `pymeERP`.`INV_Proveedor` (`INV_Proveedor_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Proveedor_CampoLocal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Proveedor_CampoLocal` (
  `INV_Proveedor_CampoLocal_ID` INT NOT NULL ,
  `INV_Proveedor_CampoLocal_Valor` VARCHAR(2048) NULL DEFAULT NULL ,
  `INV_Proveedor_CampoLocal_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Proveedor_CampoLocal_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Proveedor_CampoLocal_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_Proveedor_CampoLocal_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Proveedor_INV_Proveedor_ID` INT NOT NULL ,
  `INV_Proveedor_INV_Ciudad_ID` INT NOT NULL ,
  PRIMARY KEY (`INV_Proveedor_CampoLocal_ID`, `INV_Proveedor_INV_Proveedor_ID`, `INV_Proveedor_INV_Ciudad_ID`) ,
  INDEX `fk_INV_Proveedor_CampoLocal_INV_Proveedor1_idx` (`INV_Proveedor_INV_Proveedor_ID` ASC, `INV_Proveedor_INV_Ciudad_ID` ASC) ,
  CONSTRAINT `fk_INV_Proveedor_CampoLocal_INV_Proveedor1`
    FOREIGN KEY (`INV_Proveedor_INV_Proveedor_ID` , `INV_Proveedor_INV_Ciudad_ID` )
    REFERENCES `pymeERP`.`INV_Proveedor` (`INV_Proveedor_ID` , `INV_Ciudad_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Reporte`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Reporte` (
  `INV_Reporte_ID` INT NOT NULL COMMENT ' /* comment truncated */ /* /* comment truncated */ /* */*/' ,
  `INV_Reporte_Numero` DECIMAL(19,0) NULL DEFAULT NULL ,
  `INV_Reporte_Encabezado` VARCHAR(512) NULL DEFAULT NULL ,
  `INV_Reporte_FechaInicio` DATETIME NULL DEFAULT NULL ,
  `INV_Reporte_FechaFinal` DATETIME NULL DEFAULT NULL ,
  `INV_Reporte_Consulta` VARCHAR(512) NULL DEFAULT NULL ,
  `INV_Reporte_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Reporte_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Reporte_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_Reporte_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  PRIMARY KEY (`INV_Reporte_ID`) ,
  UNIQUE INDEX `INV_Reporte_Numero_UNIQUE` (`INV_Reporte_Numero` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Producto_CampoLocal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Producto_CampoLocal` (
  `INV_Producto_CampoLocal_ProveedorID` INT NOT NULL ,
  `INV_Producto_CampoLocal_IDCampoLocal` INT NOT NULL ,
  `INV_Producto_CampoLocal_Valor` VARCHAR(2048) NULL DEFAULT NULL ,
  `INV_Producto_CampoLocal_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Producto_CampoLocal_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Producto_CampoLocal_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_Producto_CampoLocal_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Producto_ID` INT NOT NULL ,
  `INV_Categoria_ID` INT NOT NULL ,
  `INV_Producto_INV_Categoria_IDCategoriaPadre` INT NOT NULL ,
  `INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID` INT NOT NULL ,
  `INV_Producto_INV_Horario_INV_Horario_ID` INT NOT NULL ,
  PRIMARY KEY (`INV_Producto_CampoLocal_ProveedorID`, `INV_Producto_CampoLocal_IDCampoLocal`, `INV_Producto_ID`, `INV_Categoria_ID`, `INV_Producto_INV_Categoria_IDCategoriaPadre`, `INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID`, `INV_Producto_INV_Horario_INV_Horario_ID`) ,
  INDEX `fk_INV_Producto_CampoLocal_INV_Producto1_idx` (`INV_Producto_ID` ASC, `INV_Categoria_ID` ASC, `INV_Producto_INV_Categoria_IDCategoriaPadre` ASC, `INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID` ASC, `INV_Producto_INV_Horario_INV_Horario_ID` ASC) ,
  CONSTRAINT `fk_INV_Producto_CampoLocal_INV_Producto1`
    FOREIGN KEY (`INV_Producto_ID` , `INV_Categoria_ID` , `INV_Producto_INV_Categoria_IDCategoriaPadre` , `INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID` , `INV_Producto_INV_Horario_INV_Horario_ID` )
    REFERENCES `pymeERP`.`INV_Producto` (`INV_Producto_ID` , `INV_Categoria_ID` , `INV_Categoria_IDCategoriaPadre` , `INV_UnidadMedida_ID` , `INV_HorarioBloqueo_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_MotivoMovimiento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_MotivoMovimiento` (
  `INV_MotivoMovimiento_ID` INT NOT NULL ,
  `INV_MotivoMovimiento_Nombre` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_MotivoMovimiento_IDTransaccion` INT NULL DEFAULT NULL ,
  `INV_MotivoMovimiento_TipoMovimiento` INT NULL DEFAULT NULL ,
  `INV_MotivoMovimiento_Observaciones` VARCHAR(512) NULL DEFAULT NULL ,
  `INV_MotivoMovimiento_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_MotivoMovimiento_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_MotivoMovimiento_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_MotivoMovimiento_UsuarioModificacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_MotivoMovimiento_Activo` BIT NULL DEFAULT NULL ,
  PRIMARY KEY (`INV_MotivoMovimiento_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_Movimiento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_Movimiento` (
  `INV_Movimiento_ID` INT NOT NULL ,
  `INV_Movimiento_Numero` DECIMAL(19,0) NULL DEFAULT NULL ,
  `INV_Movimiento_IDTransaccion` INT NULL DEFAULT NULL ,
  `INV_Movimiento_IDOrdenCompra` INT NULL DEFAULT NULL ,
  `INV_Movimiento_Observaciones` VARCHAR(512) NULL DEFAULT NULL ,
  `INV_Movimiento_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_Movimiento_UsuarioCreacion` VARCHAR(64) NULL DEFAULT NULL ,
  `INV_Movimiento_FechaModificacion` DATETIME NULL ,
  `INV_Movimiento_UsuarioModificacion` VARCHAR(64) NULL ,
  `INV_MotivoMovimiento_INV_MotivoMovimiento_ID` INT NOT NULL ,
  PRIMARY KEY (`INV_Movimiento_ID`, `INV_MotivoMovimiento_INV_MotivoMovimiento_ID`) ,
  INDEX `fk_INV_Movimiento_INV_MotivoMovimiento1_idx` (`INV_MotivoMovimiento_INV_MotivoMovimiento_ID` ASC) ,
  CONSTRAINT `fk_INV_Movimiento_INV_MotivoMovimiento1`
    FOREIGN KEY (`INV_MotivoMovimiento_INV_MotivoMovimiento_ID` )
    REFERENCES `pymeERP`.`INV_MotivoMovimiento` (`INV_MotivoMovimiento_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pymeERP`.`INV_DetalleMovimiento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pymeERP`.`INV_DetalleMovimiento` (
  `INV_DetalleMovimiento_ID` INT NOT NULL ,
  `INV_DetalleMovimiento_IDProducto` INT NOT NULL ,
  `INV_DetalleMovimiento_CodigoProducto` VARCHAR(16) NULL DEFAULT NULL ,
  `INV_DetalleMovimiento_NombreProducto` VARCHAR(128) NULL DEFAULT NULL ,
  `INV_DetalleMovimiento_CantidadProducto` INT NULL DEFAULT NULL ,
  `INV_DetalleMovimiento_PrecioCosto` DECIMAL(19,4) NULL DEFAULT NULL ,
  `INV_DetalleMovimiento_PrecioVenta` DECIMAL(19,4) NULL DEFAULT NULL ,
  `INV_DetalleMovimiento_FechaCreacion` DATETIME NULL DEFAULT NULL ,
  `INV_DetalleMovimiento_UsuarioCreacion` VARCHAR(64) NULL ,
  `INV_DetalleMovimiento_FechaModificacion` DATETIME NULL DEFAULT NULL ,
  `INV_DetalleMovimiento_UsuarioModificacion` VARCHAR(64) NULL ,
  `INV_Movimiento_ID` INT NOT NULL ,
  `INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID` INT NOT NULL ,
  `INV_Producto_INV_Producto_ID` INT NOT NULL ,
  `INV_Producto_INV_Categoria_ID` INT NOT NULL ,
  `INV_Producto_INV_Categoria_IDCategoriaPadre` INT NOT NULL ,
  `INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID` INT NOT NULL ,
  PRIMARY KEY (`INV_DetalleMovimiento_ID`, `INV_DetalleMovimiento_IDProducto`, `INV_Movimiento_ID`, `INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID`, `INV_Producto_INV_Producto_ID`, `INV_Producto_INV_Categoria_ID`, `INV_Producto_INV_Categoria_IDCategoriaPadre`, `INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID`) ,
  INDEX `fk_INV_DetalleMovimiento_INV_Movimiento1_idx` (`INV_Movimiento_ID` ASC, `INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID` ASC) ,
  INDEX `fk_INV_DetalleMovimiento_INV_Producto1_idx` (`INV_Producto_INV_Producto_ID` ASC, `INV_Producto_INV_Categoria_ID` ASC, `INV_Producto_INV_Categoria_IDCategoriaPadre` ASC, `INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID` ASC) ,
  CONSTRAINT `fk_INV_DetalleMovimiento_INV_Movimiento1`
    FOREIGN KEY (`INV_Movimiento_ID` , `INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID` )
    REFERENCES `pymeERP`.`INV_Movimiento` (`INV_Movimiento_ID` , `INV_MotivoMovimiento_INV_MotivoMovimiento_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_INV_DetalleMovimiento_INV_Producto1`
    FOREIGN KEY (`INV_Producto_INV_Producto_ID` , `INV_Producto_INV_Categoria_ID` , `INV_Producto_INV_Categoria_IDCategoriaPadre` , `INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID` )
    REFERENCES `pymeERP`.`INV_Producto` (`INV_Producto_ID` , `INV_Categoria_ID` , `INV_Categoria_IDCategoriaPadre` , `INV_UnidadMedida_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


