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
		
		//Seed the countries
		$this->call('CountriesSeeder');
		$this->command->info('Seeded the countries!'); 
	}

}
