/*
-- Query: 
-- Date: 2014-02-17 09:17
*/
INSERT INTO `VEN_DescuentoEspecial` (`VEN_DescuentoEspecial_id`,`VEN_DescuentoEspecial_Codigo`,`VEN_DescuentoEspecial_Nombre`,`VEN_DescuentoEspecial_Valor`,`VEN_DescuentoEspecial_FechaInicio`,`VEN_DescuentoEspecial_FechaFinal`,`VEN_DescuentoEspecial_Precedencia`,`VEN_DescuentoEspecial_Estado`) VALUES (1,'3Edad','Descuento por ley para la tercera edad','25',now(),DATE_ADD(NOW(), INTERVAL 1 MONTH),'1','1');
INSERT INTO `VEN_DescuentoEspecial` (`VEN_DescuentoEspecial_id`,`VEN_DescuentoEspecial_Codigo`,`VEN_DescuentoEspecial_Nombre`,`VEN_DescuentoEspecial_Valor`,`VEN_DescuentoEspecial_FechaInicio`,`VEN_DescuentoEspecial_FechaFinal`,`VEN_DescuentoEspecial_Precedencia`,`VEN_DescuentoEspecial_Estado`) VALUES (2,'MonthEnd','Descuento por fin de mes','35',now(),DATE_ADD(NOW(), INTERVAL 1 MONTH),'2','0');
INSERT INTO `VEN_DescuentoEspecial` (`VEN_DescuentoEspecial_id`,`VEN_DescuentoEspecial_Codigo`,`VEN_DescuentoEspecial_Nombre`,`VEN_DescuentoEspecial_Valor`,`VEN_DescuentoEspecial_FechaInicio`,`VEN_DescuentoEspecial_FechaFinal`,`VEN_DescuentoEspecial_Precedencia`,`VEN_DescuentoEspecial_Estado`) VALUES (3,'Estudiante','Descuento para estudiantes','5',now(),DATE_ADD(NOW(), INTERVAL 1 YEAR),'3','1');
