<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('LibrodiariosTableSeeder');

		$this->call('SubcuentaTableSeeder');
		$this->call('DetalleasientosTableSeeder');
		$this->call('MotivotransaccionsTableSeeder');
		$this->call('CuentamotivosTableSeeder');

	}

}