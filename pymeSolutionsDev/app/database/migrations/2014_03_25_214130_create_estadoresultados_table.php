<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadoResultadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('EstadoResultados', function(Blueprint $table) {
			$table->increments('id');
			$table->int('CON_PeriodoContable_ID');
			$table->double('CON_EstadoResultados_Ingresos');
			$table->double('CON_EstadosResultados_CostoVentas');
			$table->double('CON_EstadoResultados_UtilidadBruta');
			$table->double('CON_EstadoResultados_GastosdeVentas');
			$table->double('CON_EstadoResultados_GastosAdministrativos');
			$table->double('CON_EstadoResultados_UtilidadOperacion');
			$table->double('CON_EstadoResultados_GastoFinanciero');
			$table->double('CON_EstadoResultados_UtilidadAntesImpuesto');
			$table->double('CON_EstadoResultados_Impuesto');
			$table->double('CON_EstadoResultados_UtilidadPerdidaFinal');
			$table->datetime('CON_EstadoResultados_FechaCreacion');
			$table->datetime('CON_EstadoResultados_FechaModificacion');
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
		Schema::drop('EstadoResultados');
	}

}
