<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;

class SearchController extends Controller {
	//
	function index( $keyword ) {
		$ip     = \request()->ip();
		$result = Search::findKeyword( $keyword, $ip );

		return response()->json( $result );
	}
}
