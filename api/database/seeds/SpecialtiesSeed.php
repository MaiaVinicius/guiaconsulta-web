<?php

use Illuminate\Database\Seeder;

class SpecialtiesSeed extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		App\Company::create( [
			'name'      => str_random( 10 ),
		] );
	}
}