<?php

use Illuminate\Database\Seeder;

class ProfessionalsSeed extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		App\Job::create( [
			'name'      => str_random( 10 ),
			'gender_id' => 1,
		] );
	}
}