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
		$this->call('ProveedorsTableSeeder');
		$this->call('ProductosTableSeeder');
		$this->call('HorariosTableSeeder');
		$this->call('FormapagosTableSeeder');


		$this->call('CotizacionsTableSeeder');

		$this->call('LibrodiariosTableSeeder');
		$this->call('SubcuentaTableSeeder');
		$this->call('DetalleasientosTableSeeder');
		$this->call('MotivotransaccionsTableSeeder');
		$this->call('CuentamotivosTableSeeder');
		$this->call('PersonasTableSeeder');
		$this->call('ValorcampolocalcrmsTableSeeder');
		$this->call('CampolocalsTableSeeder');
		$this->call('CampolocallistaTableSeeder');

	}

}