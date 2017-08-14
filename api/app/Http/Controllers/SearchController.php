<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;

class SearchController extends Controller {
	//
	function index( $keyword ) {
		$result = Search::findKeyword( $keyword );

		return response()->json( $result );
	}
}
