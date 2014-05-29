/*
-- Query: 
-- Date: 2014-02-18 17:53
*/
INSERT INTO `INV_UnidadMedida` (`INV_UnidadMedida_ID`,`INV_UnidadMedida_Nombre`,`INV_UnidadMedida_Descripcion`,`INV_UnidadMedida_FechaCreacion`,`INV_UnidadMedida_UsuarioCreacion`,`INV_UnidadMedida_FechaModificacion`,`INV_UnidadMedida_UsuarioModificacion`,`INV_UnidadMedida_Activo`) VALUES (1,'Volumen','Peso Volumetrico',now(),substring_index(user(),'@',1),now(),substring_index(user(),'@',1),'1');
INSERT INTO `INV_UnidadMedida` (`INV_UnidadMedida_ID`,`INV_UnidadMedida_Nombre`,`INV_UnidadMedida_Descripcion`,`INV_UnidadMedida_FechaCreacion`,`INV_UnidadMedida_UsuarioCreacion`,`INV_UnidadMedida_FechaModificacion`,`INV_UnidadMedida_UsuarioModificacion`,`INV_UnidadMedida_Activo`) VALUES (2,'Masa','Masa del Articulo',now(),substring_index(user(),'@',1),now(),substring_index(user(),'@',1),'1');
INSERT INTO `INV_UnidadMedida` (`INV_UnidadMedida_ID`,`INV_UnidadMedida_Nombre`,`INV_UnidadMedida_Descripcion`,`INV_UnidadMedida_FechaCreacion`,`INV_UnidadMedida_UsuarioCreacion`,`INV_UnidadMedida_FechaModificacion`,`INV_UnidadMedida_UsuarioModificacion`,`INV_UnidadMedida_Activo`) VALUES (3,'Cantidad','Unidades en el Articulo',now(),substring_index(user(),'@',1),now(),substring_index(user(),'@',1),'1');
