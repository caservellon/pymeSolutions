/*
-- Query: 
-- Date: 2014-02-18 17:41
*/
INSERT INTO `INV_Horario` (`INV_Horario_ID`,`INV_Horario_Nombre`,`INV_Horario_Tipo`,`INV_Horario_FechaInicio`,`INV_Horario_FechaFinal`,`INV_Horario_FechaCreacion`,`INV_Horario_UsuarioCreacion`,`INV_Horario_FechaModificacion`,`INV_Horario_UsuarioModificacion`, `INV_Horario_Activo`) VALUES (1,'Dia',NULL,now(),DATE_ADD(NOW(), INTERVAL 1 DAY),now(),substring_index(user(),'@',1),now(),substring_index(user(),'@',1),1);
INSERT INTO `INV_Horario` (`INV_Horario_ID`,`INV_Horario_Nombre`,`INV_Horario_Tipo`,`INV_Horario_FechaInicio`,`INV_Horario_FechaFinal`,`INV_Horario_FechaCreacion`,`INV_Horario_UsuarioCreacion`,`INV_Horario_FechaModificacion`,`INV_Horario_UsuarioModificacion`, `INV_Horario_Activo`) VALUES (2,'Mensual',NULL,now(),DATE_ADD(NOW(), INTERVAL 1 MONTH),now(),substring_index(user(),'@',1),now(),substring_index(user(),'@',1),1);
INSERT INTO `INV_Horario` (`INV_Horario_ID`,`INV_Horario_Nombre`,`INV_Horario_Tipo`,`INV_Horario_FechaInicio`,`INV_Horario_FechaFinal`,`INV_Horario_FechaCreacion`,`INV_Horario_UsuarioCreacion`,`INV_Horario_FechaModificacion`,`INV_Horario_UsuarioModificacion`, `INV_Horario_Activo`) VALUES (3,'Quincenal',NULL,now(),DATE_ADD(NOW(), INTERVAL 15 DAY),now(),substring_index(user(),'@',1),now(),substring_index(user(),'@',1),1);
