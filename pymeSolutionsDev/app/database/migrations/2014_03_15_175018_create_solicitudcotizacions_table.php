<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolicitudCotizacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('SolicitudCotizacions', function(Blueprint $table) {
			$table->increments('id');
			$table->int('COM_SolicitudCotizacion_IdSolicitudCotizacion');
			$table->string('COM_SolicitudCotizacion_Codigo');
			$table->date('COM_SolicitudCotizacion_FechaEmision');
			$table->date('COM_SolicitudCotizacion_FechaEntrega');
			$table->string('COM_SolicitudCotizacion_DireccionEntrega');
			$table->int('COM_SolicitudCotizacion_Recibido');
			$table->int('COM_SolicitudCotizacion_Activo');
			$table->date('COM_SolicitudCotizacion_FechaCreacion');
			$table->date('COM_SolicitudCotizacio_FechaModificacion');
			$table->int('COM_Usuario_idUsuarioCreo');
			$table->int('Proveedor_idProveedor');
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
		Schema::drop('SolicitudCotizacions');
	}

}
