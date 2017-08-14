<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Search extends Model {
	static private $keyword;

	static public function findKeyword( $keyword ) {
		$professionals = DB::table( 'professionals' )
		                   ->select( DB::raw( 'id, name, "2"result_type' ) )
		                   ->where( [
			                   [ 'name', 'like', '%' . $keyword . '%' ],
			                   [ 'active', 1 ]
		                   ] );

		$procedures = DB::table( 'procedures' )
		                ->select( DB::raw( 'id, name, "4"result_type' ) )
		                ->where( [
			                [ 'name', 'like', '%' . $keyword . '%' ],
			                [ 'active', 1 ]
		                ] );

		$vacinnes = DB::table( 'vacinnes' )
		              ->select( DB::raw( 'id, name, "5"result_type' ) )
		              ->where( [
			              [ 'name', 'like', '%' . $keyword . '%' ],
			              [ 'active', 1 ]
		              ] );

		$specialties = DB::table( 'specialty' )
		                 ->select( DB::raw( 'id, name, "1"result_type' ) )
		                 ->where( [
			                 [ 'name', 'like', '%' . $keyword . '%' ],
			                 [ 'active', 1 ]
		                 ] )
		                 ->unionAll( $procedures )
		                 ->unionAll( $professionals )
		                 ->unionAll( $vacinnes )
		                 ->get();

		self::saveLog( $keyword );

		return $specialties;
	}

	static private function saveLog( $keyword ) {

	}
}
