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
		$this->call('PersonasTableSeeder');
		$this->call('ValorcampolocalcrmsTableSeeder');
		$this->call('CampolocalsTableSeeder');
		$this->call('CampolocallistaTableSeeder');
	}

}