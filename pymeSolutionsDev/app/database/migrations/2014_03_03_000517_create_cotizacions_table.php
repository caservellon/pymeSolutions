<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCotizacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Cotizacions', function(Blueprint $table) {
			$table->increments('COM_Cotizacion_Idcotizacion');
			$table->string('COM_Cotizacion_Codigo', 16);
			$table->date('COM_Cotizacion_FechaEmision');
			$table->date('COM_Cotizacion_FechaEntrega');
			$table->boolean('COM_Cotizacion_Activo');
			$table->float('COM_Cotizacion_Total');
			$table->date('COM_Cotizacion_Vigencia');
			$table->string('COM_Cotizacion_NumeroCotizacion', 45);
			$table->date('COM_Cotizacion_FechaCreacion');
			$table->date('COM_Cotizacion_FechaModificacion');
			$table->int('COM_SolicitudCotizacion_idSolicitudCotizacion');
			$table->int('COM_Usuario_idUsuarioCreo');
			$table->int('COM_Proveedor_idProveedor');
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
		Schema::drop('Cotizacions');
	}

}
