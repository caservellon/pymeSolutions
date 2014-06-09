<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBalanceGeneralsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('BalanceGenerals', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('CON_PeriodoContable_ID');
			$table->float('CON_BalanceGeneral_TotalActivosC');
			$table->float('CON_BalanceGeneral_TotalPasivosC');
			$table->float('CON_BalanceGeneral_TotalActivosNC');
			$table->float('CON_BalanceGeneral_TotalPasivosNC');
			$table->float('CON_BalanceGeneral_CapitalFinal');
			$table->date('CON_BalanceGeneral');
			$table->Date('CON_BalanceGeneral_FechaModificacion');
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
		Schema::drop('BalanceGenerals');
	}

}
