<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dependent extends BaseModel {
	//

	public static function validate( $data ) {
		$params = People::$validateParams;

		return self::_validate( $data, $params );
	}


	public function listDependents( $patientId ) {
		return DB::select( "
		
		SELECT pd.relationship_id, pd.dependent_patient_id,pd.id, pe.name, re.name relationship 
		
		FROM patient_dependents pd
		INNER JOIN patients pa ON pa.id=pd.dependent_patient_id
		INNER JOIN people pe ON pe.id=pa.person_id
		LEFT JOIN relatives re ON re.id=pd.relationship_id
		WHERE pd.patient_id=? and pd.active=1
		
		", [ $patientId ] );
	}

	public function create( $patientId, $data ) {
		$patient = new Patient();

		$patient->name      = $data["name"];
		$patient->birthdate = $data["birthdate"];
		$patient->cpf       = $data["cpf"];
		$patient->phone     = @$data["phone"];

		$patientCreatedId = $patient->createPatient();

		$Resource = new Resource( "patient_dependents" );

		$createData  = [
			"patient_id"           => $patientId,
			"relationship_id"      => $data["relationship_id"],
			"dependent_patient_id" => $patientCreatedId,
		];
		$dependentId = $Resource->create( $createData );

		$createData["dependent_id"] = $dependentId;

		return $createData;
	}
}
