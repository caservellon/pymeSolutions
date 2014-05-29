/*
-- Query: 
-- Date: 2014-02-18 17:28
*/
INSERT INTO `INV_FormaPago` (`INV_FormaPago_ID`,`INV_FormaPago_Nombre`,`INV_FormaPago_Efectivo`,`INV_FormaPago_Credito`,`INV_FormaPago_DiasCredito`,`INV_FormaPago_UsuarioCreacion`,`INV_FormaPago_FechaModificacion`,`INV_FormaPago_UsuarioModificacion`,`INV_FormaPago_Activo`) VALUES (1,'Quincenal','0','1',15,substring_index(user(),'@',1),now(),substring_index(user(),'@',1),'1');
INSERT INTO `INV_FormaPago` (`INV_FormaPago_ID`,`INV_FormaPago_Nombre`,`INV_FormaPago_Efectivo`,`INV_FormaPago_Credito`,`INV_FormaPago_DiasCredito`,`INV_FormaPago_UsuarioCreacion`,`INV_FormaPago_FechaModificacion`,`INV_FormaPago_UsuarioModificacion`,`INV_FormaPago_Activo`) VALUES (2,'Mensual','0','1',30,substring_index(user(),'@',1),now(),substring_index(user(),'@',1),'1');
INSERT INTO `INV_FormaPago` (`INV_FormaPago_ID`,`INV_FormaPago_Nombre`,`INV_FormaPago_Efectivo`,`INV_FormaPago_Credito`,`INV_FormaPago_DiasCredito`,`INV_FormaPago_UsuarioCreacion`,`INV_FormaPago_FechaModificacion`,`INV_FormaPago_UsuarioModificacion`,`INV_FormaPago_Activo`) VALUES (3,'Semestral','0','1',60,substring_index(user(),'@',1),now(),substring_index(user(),'@',1),'1');
INSERT INTO `INV_FormaPago` (`INV_FormaPago_ID`,`INV_FormaPago_Nombre`,`INV_FormaPago_Efectivo`,`INV_FormaPago_Credito`,`INV_FormaPago_DiasCredito`,`INV_FormaPago_UsuarioCreacion`,`INV_FormaPago_FechaModificacion`,`INV_FormaPago_UsuarioModificacion`,`INV_FormaPago_Activo`) VALUES (4,'Trimestral','0','1',90,substring_index(user(),'@',1),now(),substring_index(user(),'@',1),'1');
