<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InsuranceController extends Controller {
	//
	function index() {
		$insurances = \App\Insurance::all();

		return response()->json($insurances);
	}
}
