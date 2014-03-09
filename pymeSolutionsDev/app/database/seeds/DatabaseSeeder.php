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
		$this->call('CiudadsTableSeeder');
		$this->call('UnidadmedidasTableSeeder');
		$this->call('CategoriaTableSeeder');
		$this->call('AtributosTableSeeder');
		$this->call('ProductosTableSeeder');
		$this->call('HorariosTableSeeder');
	}

}