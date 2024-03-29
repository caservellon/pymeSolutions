# Initialization script
echo "------------------------START--------------------------" >> ./logs/install.log
DATE=$(date +"%Y/%m/%d %H:%M:%S")
echo "Process started at " $DATE >> ./logs/install.log

echo "****************Creating database****************" >> ./logs/install.log
mysql -u "root" "-proot" < "CreateDB.sql" >> ./logs/install.log 2>&1

echo "Creating General Tables " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "CreateGeneral.sql" >> ./logs/install.log 2>&1

echo "Creating Compras " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "CreateCompras.sql" >> ./logs/install.log 2>&1

echo "Creating Inventario " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "CreateInventario.sql" >> ./logs/install.log 2>&1

echo "Creating Contabilidad " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "CreateContabilidad.sql" >> ./logs/install.log 2>&1

echo "Creating CRM " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "CreateCRM.sql" >> ./logs/install.log 2>&1

echo "Creating Ventas " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "CreateVentas.sql" >> ./logs/install.log 2>&1

echo "Creating Seguridad " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "CreateSeguridad.sql" >> ./logs/install.log 2>&1

echo "****************Populating tables****************" >> ./logs/install.log

echo "Populating CRM " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "INS_CRM_TipoDocumento.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CRM_Personas.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CRM_Empresas.sql" >> ./logs/install.log 2>&1

echo "Populating Compras " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "INS_COM_EstadoOrdencompra.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_COM_OrdenCompra_TrasicionEstado.sql" >> ./logs/install.log 2>&1

echo "Populating Inventario " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Atributo.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Horario.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Categoria.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Ciudad.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_FormaPago.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_UnidadMedida.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Productos.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Proveedores.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_MotivoMovimiento.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Producto_Atributo.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Producto_Proveedor.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_INV_Proveedor_FormaPago.sql" >> ./logs/install.log 2>&1

echo "Populating Contabilidad " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "INS_CON_ClasificacionCuenta.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_CatalogoContable.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_Subcuenta.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_MotivoTransaccion.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_CuentaMotivo.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_UnidadMonetaria.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_ConceptoMotivo.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_CON_MotivoInventario.sql" >> ./logs/install.log 2>&1

echo "Populating Ventas " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "INS_VEN_DescuentoEspecial.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_VEN_EstadoBono.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_VEN_FormaPago.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_VEN_PeriodoCierreDeCaja.sql" >> ./logs/install.log 2>&1

echo "Populating Generales " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "INS_GEN_Mensajes.sql" >> ./logs/install.log 2>&1


echo "Populating Seguridad " >> ./logs/install.log
mysql -u "root" "-proot" "pymeERP" < "INS_SEG_RoleAdmin.sql" >> ./logs/install.log 2>&1
mysql -u "root" "-proot" "pymeERP" < "INS_SEG_Config.sql" >> ./logs/install.log 2>&1

DATE=$(date +"%Y/%m/%d %H:%M:%S")
echo "Process ended at " $DATE >> ./logs/install.log

echo "------------------------END----------------------------" >> ./logs/install.log
