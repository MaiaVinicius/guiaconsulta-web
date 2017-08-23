<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialtiesController extends Controller {
	//
	function index() {
		$specialties = \App\Specialty::all()
		                             ->where( 'active', 1 );

		return response()->json( $specialties );
	}
}
