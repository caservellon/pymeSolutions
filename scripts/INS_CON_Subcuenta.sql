-- Drop trigger CodigoCuenta;
DELIMITER $$
 Create trigger CodigoCuenta before insert on CON_CatalogoContable
 for each row
begin
 declare codigo varchar(3);
declare subcodigo varchar(2);
declare subcodigo2 varchar(2);


		Select max(CON_CatalogoContable_Codigo) 
		into codigo 
		from CON_CatalogoContable 
		where CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID = NEW.CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID;
 
 
set subcodigo = '00';
set subcodigo2 = NEW.CON_CatalogoContable_CodigoSubcuenta;
IF subcodigo2 = subcodigo THEN
set codigo = codigo +1;
else
set codigo = NEW.CON_CatalogoContable_Codigo;
END IF;

 IF codigo < 10 AND NEW.CON_CatalogoContable_CodigoSubcuenta = 0 THEN
	set NEW.CON_CatalogoContable_Codigo = CONCAT('00',Codigo);
ELSEIF codigo < 100 AND NEW.CON_CatalogoContable_CodigoSubcuenta = 0 THEN
	set NEW.CON_CatalogoContable_Codigo =  CONCAT('0',Codigo);
 END IF;

 

end;
$$
DELIMITER ;
-- Drop trigger CodigoSubcuenta;

DELIMITER $$
 Create trigger CodigoSubcuenta before insert on CON_Subcuenta
 for each row
begin
declare cuentaID int;
declare tipo int;
declare subcodigo varchar(2);
declare codigo varchar(3);



select CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID 
into tipo
from CON_CatalogoContable
where CON_CatalogoContable_ID=NEW.CON_CatalogoContable_ID;

Select CON_CatalogoContable_Codigo
into codigo
from CON_CatalogoContable
where CON_CatalogoContable_ID=NEW.CON_CatalogoContable_ID;

    select max(CON_CatalogoContable_CodigoSubcuenta)
		into subcodigo
		from CON_CatalogoContable
		where CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID = tipo AND codigo = CON_CatalogoContable_Codigo;




set subcodigo= subcodigo+1;
 IF subcodigo < 10 THEN
	set NEW.`CON_Subcuenta_Codigo` = CONCAT('0',subcodigo);
else
set NEW.`CON_Subcuenta_Codigo` = subcodigo;
 END IF;

end;
$$
DELIMITER ;
-- Drop Trigger Subcuentas;
DELIMITER $$
 Create trigger Subcuentas after insert on CON_Subcuenta
 for each row
begin

declare lovehandle varchar(3);
declare handle varchar(2);
declare punonsito int;
declare punonsote int;
declare tipo int;
declare subcodigo varchar(2);
declare codigo varchar(3);

select CON_CatalogoContable_Codigo into lovehandle
from CON_CatalogoContable where CON_CatalogoContable_ID = NEW.CON_CatalogoContable_ID;

select CON_CatalogoContable_NaturalezaSaldo into punonsito 
from CON_CatalogoContable where CON_CatalogoContable_ID = NEW.CON_CatalogoContable_ID;

select CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID into punonsote
from CON_CatalogoContable where CON_CatalogoContable_ID = NEW.CON_CatalogoContable_ID;


select CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID 
into tipo
from CON_CatalogoContable
where CON_CatalogoContable_ID=NEW.CON_CatalogoContable_ID;

Select CON_CatalogoContable_Codigo
into codigo
from CON_CatalogoContable
where CON_CatalogoContable_ID=NEW.CON_CatalogoContable_ID;

    select max(CON_CatalogoContable_CodigoSubcuenta)
		into subcodigo
		from CON_CatalogoContable
		where CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID = tipo AND codigo = CON_CatalogoContable_Codigo;




set subcodigo= subcodigo+1;
 IF subcodigo < 10 THEN
	set subcodigo = CONCAT('0',subcodigo);
else
set subcodigo = subcodigo;
 END IF;


INSERT INTO `pymeERP`.`CON_CatalogoContable`
(
`CON_CatalogoContable_Codigo`,
`CON_CatalogoContable_Nombre`,
`CON_CatalogoContable_UsuarioCreacion`,
`CON_CatalogoContable_NaturalezaSaldo`,
`CON_CatalogoContable_Estado`,
`CON_CatalogoContable_FechaCreacion`,
`CON_CatalogoContable_FechaModificacion`,
`CON_ClasificacionCuenta_CON_ClasificacionCuenta_ID`,
`CON_CatalogoContable_CodigoSubcuenta`)
VALUES
(
lovehandle,
NEW.CON_Subcuenta_Nombre,
'admin',
punonsito,
1,
NOW(),
NOW(),
punonsote,
subcodigo);

end;
$$
DELIMITER ;

INSERT INTO `CON_Subcuenta` (`CON_Subcuenta_ID`,`CON_Subcuenta_Codigo`,`CON_Subcuenta_Nombre`,`CON_Subcuenta_FechaCreacion`,`CON_Subcuenta_FechaModificacion`,`CON_CatalogoContable_ID`) VALUES (1,'01','Caja',Now(),Now(),1);
INSERT INTO `CON_Subcuenta` (`CON_Subcuenta_ID`,`CON_Subcuenta_Codigo`,`CON_Subcuenta_Nombre`,`CON_Subcuenta_FechaCreacion`,`CON_Subcuenta_FechaModificacion`,`CON_CatalogoContable_ID`) VALUES (2,'02','Banco Ficohsa',Now(),Now(),1);
INSERT INTO `CON_Subcuenta` (`CON_Subcuenta_ID`,`CON_Subcuenta_Codigo`,`CON_Subcuenta_Nombre`,`CON_Subcuenta_FechaCreacion`,`CON_Subcuenta_FechaModificacion`,`CON_CatalogoContable_ID`) VALUES (3,'03','Banco CityBank',Now(),Now(),1);
INSERT INTO `CON_Subcuenta` (`CON_Subcuenta_ID`,`CON_Subcuenta_Codigo`,`CON_Subcuenta_Nombre`,`CON_Subcuenta_FechaCreacion`,`CON_Subcuenta_FechaModificacion`,`CON_CatalogoContable_ID`) VALUES (4,'04','Banco Atlantida',Now(),Now(),1);
INSERT INTO `CON_Subcuenta` (`CON_Subcuenta_ID`,`CON_Subcuenta_Codigo`,`CON_Subcuenta_Nombre`,`CON_Subcuenta_FechaCreacion`,`CON_Subcuenta_FechaModificacion`,`CON_CatalogoContable_ID`) VALUES (5,'01','SANAA',Now(),Now(),37);
INSERT INTO `CON_Subcuenta` (`CON_Subcuenta_ID`,`CON_Subcuenta_Codigo`,`CON_Subcuenta_Nombre`,`CON_Subcuenta_FechaCreacion`,`CON_Subcuenta_FechaModificacion`,`CON_CatalogoContable_ID`) VALUES (6,'02','ENEE',Now(),Now(),37);
INSERT INTO `CON_Subcuenta` (`CON_Subcuenta_ID`,`CON_Subcuenta_Codigo`,`CON_Subcuenta_Nombre`,`CON_Subcuenta_FechaCreacion`,`CON_Subcuenta_FechaModificacion`,`CON_CatalogoContable_ID`) VALUES (7,'03','HONDUTEL',Now(),Now(),37);
INSERT INTO `CON_Subcuenta` (`CON_Subcuenta_ID`,`CON_Subcuenta_Codigo`,`CON_Subcuenta_Nombre`,`CON_Subcuenta_FechaCreacion`,`CON_Subcuenta_FechaModificacion`,`CON_CatalogoContable_ID`) VALUES (8,'01','Inventario en Transito',Now(),Now(),5);