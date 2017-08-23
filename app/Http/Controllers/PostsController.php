<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller {
	//
	function index() {
		$specialties = \App\Specialty::all();

		return response()->json( $specialties );
	}
}
