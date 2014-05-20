INSERT INTO `COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`, `COM_OrdenCompra_TransicionEstado_Observacion`, `COM_OrdenCompra_TransicionEstado_EstadoActual`, `COM_OrdenCompra_TransicionEstado_EstadoPrevio`, `COM_OrdenCompra_TransicionEstado_EstadoPosterior`, `COM_TransicionEstado_Activo`) VALUES ('1', ' La orden esta en espera de ser autorizada o cancelada', '3', '1', '4','1');
INSERT INTO `COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`, `COM_OrdenCompra_TransicionEstado_Observacion`, `COM_OrdenCompra_TransicionEstado_EstadoActual`, `COM_OrdenCompra_TransicionEstado_EstadoPrevio`, `COM_OrdenCompra_TransicionEstado_EstadoPosterior`, `COM_TransicionEstado_Activo`) VALUES ('2', ' La orden esta en espera de ser autorizada o cancelada', '3', '1', '7','1');
INSERT INTO `COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`, `COM_OrdenCompra_TransicionEstado_Observacion`, `COM_OrdenCompra_TransicionEstado_EstadoActual`, `COM_OrdenCompra_TransicionEstado_EstadoPrevio`, `COM_OrdenCompra_TransicionEstado_EstadoPosterior`, `COM_TransicionEstado_Activo`) VALUES ('3', ' La orden esta esperando ser emitida', '4', '3', '5','1');
INSERT INTO `COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`, `COM_OrdenCompra_TransicionEstado_Observacion`, `COM_OrdenCompra_TransicionEstado_EstadoActual`, `COM_OrdenCompra_TransicionEstado_EstadoPrevio`, `COM_OrdenCompra_TransicionEstado_EstadoPosterior`, `COM_TransicionEstado_Activo`) VALUES ('4', ' La orden fue Cancelada', '4', '3', '7','1');
INSERT INTO `COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`, `COM_OrdenCompra_TransicionEstado_Observacion`, `COM_OrdenCompra_TransicionEstado_EstadoActual`, `COM_OrdenCompra_TransicionEstado_EstadoPrevio`, `COM_OrdenCompra_TransicionEstado_EstadoPosterior`, `COM_TransicionEstado_Activo`) VALUES ('5', ' La orden fue Rechazada Por el Proveedor', '5', '4', '6','1');
INSERT INTO `COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`, `COM_OrdenCompra_TransicionEstado_Observacion`, `COM_OrdenCompra_TransicionEstado_EstadoActual`, `COM_OrdenCompra_TransicionEstado_EstadoPrevio`, `COM_OrdenCompra_TransicionEstado_EstadoPosterior`, `COM_TransicionEstado_Activo`) VALUES ('6', ' La orden esta en proceso de envio', '7', '4', '8','1');
INSERT INTO `COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`, `COM_OrdenCompra_TransicionEstado_Observacion`, `COM_OrdenCompra_TransicionEstado_EstadoActual`, `COM_OrdenCompra_TransicionEstado_EstadoPrevio`, `COM_OrdenCompra_TransicionEstado_EstadoPosterior`, `COM_TransicionEstado_Activo`) VALUES ('7', ' La orden Fue Cancelada', '5', '4', '7','1');
INSERT INTO `COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`, `COM_OrdenCompra_TransicionEstado_Observacion`, `COM_OrdenCompra_TransicionEstado_EstadoActual`, `COM_OrdenCompra_TransicionEstado_EstadoPrevio`, `COM_OrdenCompra_TransicionEstado_EstadoPosterior`, `COM_TransicionEstado_Activo`) VALUES ('8', ' la Orden fue Cancelada', '8', '5', '7','1');
INSERT INTO `COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`, `COM_OrdenCompra_TransicionEstado_Observacion`, `COM_OrdenCompra_TransicionEstado_EstadoActual`, `COM_OrdenCompra_TransicionEstado_EstadoPrevio`, `COM_OrdenCompra_TransicionEstado_EstadoPosterior`, `COM_TransicionEstado_Activo`) VALUES ('9', ' La orden esta en camino', '8', '5', '9','1');
INSERT INTO `COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`, `COM_OrdenCompra_TransicionEstado_Observacion`, `COM_OrdenCompra_TransicionEstado_EstadoActual`, `COM_OrdenCompra_TransicionEstado_EstadoPrevio`, `COM_OrdenCompra_TransicionEstado_EstadoPosterior`, `COM_TransicionEstado_Activo`) VALUES ('10', ' la orden se recibio parcialmente', '9', '8', '11','1');
INSERT INTO `COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`, `COM_OrdenCompra_TransicionEstado_Observacion`, `COM_OrdenCompra_TransicionEstado_EstadoActual`, `COM_OrdenCompra_TransicionEstado_EstadoPrevio`, `COM_OrdenCompra_TransicionEstado_EstadoPosterior`, `COM_TransicionEstado_Activo`) VALUES ('11', ' la orden fue recibida con conformidad', '9', '8', '12','1');
INSERT INTO `COM_OrdenCompra_TransicionEstado` (`COM_OrdenCompra_TransicionEstado_Id`, `COM_OrdenCompra_TransicionEstado_Observacion`, `COM_OrdenCompra_TransicionEstado_EstadoActual`, `COM_OrdenCompra_TransicionEstado_EstadoPrevio`, `COM_OrdenCompra_TransicionEstado_EstadoPosterior`, `COM_TransicionEstado_Activo`) VALUES ('12', ' la orden se rechazo por inconsistencias', '9', '8', '10','1');
