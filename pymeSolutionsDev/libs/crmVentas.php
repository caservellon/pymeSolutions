<?php

class crmVentas {

    /*
    Función para buscar personas, se llama cuando se quiere elegir el cliente que compra.
    Parámetro: Cualquier criterio de búsqueda
    Valor de Retorno: TODOS los posibles clientes.
    */

    public function searchPerson($param) {
        return Search($param);
    }

    /*
    Función para obtener los detalles del cliente seleccionado.
    Parámetro: Id del cliente, se obtiene de la consulta retornada por Buscar
    Valor de Retorno: El único cliente que corresponde al ID, con toda su información pues toda se necesita
                      cuando se imprime la factura.
    */

    public function getPerson($ID) {
        return DB::table('CRM_Personas')->where('ID',$ID)->first();
    }

    private function search($param) {
        return DB::table('CRM_Personas')
                    ->where('CRM_Personas_Nombre', 'like',$param)
                    ->orWhere('CRM_Personas_Numero','like',$param)
                    ->orWhere('CRM_Personas_Direccion','like',$param)
                    ->orWhere('CRM_Personas_', 'like',$param)->get()
                    //...
    }

}