<?php

namespace App\Http\Controllers;

use App\PatientProfileWizard;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class PatientWizardController extends Controller {
	//
	function index() {
		$user_id = JWTAuth::user()["id"];

		$wizardSteps = PatientProfileWizard::where( 'user_id', $user_id )->first();


		return response()->json($wizardSteps);
	}
}
