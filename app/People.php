<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends BaseModel {
	public $name, $birthDate, $cpf, $phone;

	public static $validateParams = [
		'name'            => 'required|max:155',
		'cpf'             => 'required|max:20',
		'phone'           => 'max:20',
		'relationship_id' => 'numeric',
	];

	//
	public function createPerson() {
		$Resource = new Resource( "people" );

		$res = $Resource->create( [
			"name"      => $this->name,
			"birthdate" => $this->birthDate,
			"cpf"       => $this->cpf,
			"phone"     => $this->phone,
		] );

		return $res;
	}
}
