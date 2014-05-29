/*
-- Query: 
-- Date: 2014-02-18 16:46
*/
INSERT INTO `INV_Categoria` (`INV_Categoria_ID`,`INV_Categoria_Codigo`,`INV_Categoria_Nombre`,`INV_Categoria_Descripcion`,`INV_Categoria_FechaCreacion`,`INV_Categoria_UsuarioCreacion`,`INV_Categoria_FechaModificacion`,`INV_Categoria_UsuarioModificacion`,`INV_Categoria_Activo`,`INV_Categoria_IDCategoriaPadre`,`INV_Categoria_HorarioDescuento_ID`) VALUES (1,NULL,'Categoria Padre','Categoría que define las Categorías Padres',now(),substring_index(user(),'@',1),now(),substring_index(user(),'@',1),1,1,1);
INSERT INTO `INV_Categoria` (`INV_Categoria_ID`,`INV_Categoria_Codigo`,`INV_Categoria_Nombre`,`INV_Categoria_Descripcion`,`INV_Categoria_FechaCreacion`,`INV_Categoria_UsuarioCreacion`,`INV_Categoria_FechaModificacion`,`INV_Categoria_UsuarioModificacion`,`INV_Categoria_Activo`,`INV_Categoria_IDCategoriaPadre`,`INV_Categoria_HorarioDescuento_ID`) VALUES (2,NULL,'Categoria Hija','Categoria Hija',now(),substring_index(user(),'@',1),now(),substring_index(user(),'@',1),1,1,1);
