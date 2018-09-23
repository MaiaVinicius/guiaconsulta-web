<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends People {
	//
	public function createPatient() {

		$personId = $this->createPerson();

		$Resource = new Resource( "patients" );

		return $Resource->create( [
			"person_id" => $personId,
		] );
	}
}
