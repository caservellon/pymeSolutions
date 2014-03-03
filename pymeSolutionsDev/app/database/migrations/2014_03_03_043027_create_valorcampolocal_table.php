<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateValorCampoLocalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ValorCampoLocal', function(Blueprint $table) {
			$table->incremets('COM_ValorCampoLocal_IdValorCampoLocal');
			$table->int('COM_ValorCampoLocal_Valor');
			$table->int('COM_CampoLocal_IdCampoLocal');
			$table->int('COM_OrdenCompra_IdOrdenCompra');
			$table->int('COM_SolicitudCotizacion_IdSolicitudCotizacion');
			$table->int('COM_Cotizacion_IdCotizacion');
			$table->string('COM_ValorCampoLocalcol', 45);
			$table->int('COM_Usuario_idUsuarioCreo');
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
		Schema::drop('ValorCampoLocal');
	}

}
