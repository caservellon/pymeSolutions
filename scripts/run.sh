# Initialization script
var="./logs/install.log"
mysql -u "root" "-proot" < "CreateDB.sql" >> "${var}" 2>&1
mysql -u "root" "-proot" "pymeERP" < "CreateGeneral.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "CreateInventario.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "CreateVentas.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "CreateCompras.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "CreateContabilidad.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "CreateCRM.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_COM_EstadoOrdencompra.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_COM_OrdenCompra_TrasicionEstado.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Atributo.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Horario.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Categoria.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Ciudad.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_FormaPago.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_UnidadMedida.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_ClasificacionCuenta.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_CatalogoContable.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_Subcuenta.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_MotivoTransaccion.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_CuentaMotivo.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_UnidadMonetaria.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_VEN_DescuentoEspecial.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_VEN_EstadoBono.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_VEN_FormaPago.sql" >> "$var" 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_VEN_PeriodoCierreDeCaja.sql" >> "$var" 2>&1