<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdenComprasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('OrdenCompras', function(Blueprint $table) {
			$table->increments('id');
			$table->int('COM_OrdenCompra_IdOrdenCompra');
			$table->text('COM_OrdenCompra_Codigo');
			$table->date('COM_OrdenCompra_FechaEmision');
			$table->date('COM_OrdenCompra_FechaEntrega');
			$table->date('COM_OrdenCompra_DireccionEntrega');
			$table->int('COM_OrdenCompra_Activo');
			$table->int('COM_OrdenCompra_Total');
			$table->date('COM_OrdenCompra_FechaCreacion');
			$table->date('COM_OrdenCompra_FechaModificacion');
			$table->int('COM_Cotizacion_IdCotizacion');
			$table->int('COM_Usuario_IdUsuarioCreo');
			$table->int('COM_Proveedor_IdProveedor');
			$table->int('Usuario_idUsuarioModifico');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('OrdenCompras');
	}

}
