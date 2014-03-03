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
		$this->call('AperturacajasTableSeeder');
		$this->call('VentaTableSeeder');
		$this->call('DetalledeventaTableSeeder');
		$this->call('FormapagosTableSeeder');
		$this->call('EstadobonosTableSeeder');
		$this->call('BonodecomprasTableSeeder');
		$this->call('DevolucionsTableSeeder');
		$this->call('DetalledevolucionsTableSeeder');
		$this->call('CajasTableSeeder');
		$this->call('CierrecajasTableSeeder');
		$this->call('PeriodocierredecajasTableSeeder');

	}

}